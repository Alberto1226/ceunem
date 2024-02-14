<?php
include_once 'models/clases/continuas.php';
include_once 'models/clases/encabezados.php';

class ContinuaModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getAllContinuas()
    {
        $items = [];
        try {
            $query = $this->db->connect()->query("SELECT * FROM continua");
            while ($row = $query->fetch()) {
                $item = new Continuas();

                $item->id_ec = $row['id_ec'];
                $item->nom_ec = $row['nom_ec'];
                $item->descripcion = $row['descripcion'];
                $item->desc_detallada = $row['desc_detallada'];
                $item->revoe = $row['revoe'];
                $item->img_url = $row['img_url'];
                $item->pdf_url = $row['pdf_url'];
                $item->estado = $row['estado'];

                array_push($items, $item);
            }
            return $items;
        } catch (PDOException $th) {
            return [];
        }
    }

    public function insert($datos)
    {
        try {
            $query = $this->db->connect()->prepare(
                'INSERT INTO continua (nom_ec, descripcion, desc_detallada, revoe, img_url, pdf_url, estado)
                VALUES(:nom_ec, :descripcion, :desc_detallada, :revoe, :img_url, :pdf_url, :estado)'
            );
            $query->execute([
                'nom_ec' => $datos['nom_ec'],
                'descripcion' => $datos['descripcion'],
                'desc_detallada' => $datos['desc_detallada'],
                'revoe' => $datos['revoe'],
                'img_url' => $datos['img_url'],
                'pdf_url' => $datos['pdf_url'],
                'estado' => $datos['estado']
            ]);
            return true;
        } catch (PDOException $th) {
            return false;
        }
    }

    public function insertCard($datos){
        try {
            $query = $this->db->connect()->prepare(
                'INSERT INTO ec_datos (id_ec, titulo, descripcion, img_url)
                VALUES(:id_ec, :titulo, :descripcion, :img_url)');
            $query->execute([
                'id_ec' =>$datos['id_ec'], 
                'titulo' =>$datos['titulo'],
                'descripcion' =>$datos['descripcion'], 
                'img_url' =>$datos['img_url']
            ]);
            return true;
        } catch (PDOException $th) {
           return false;
        }
    }

    public function update($item){
        $query= $this->db->connect()->prepare("UPDATE continua 
        SET nom_ec = :nom_ec, descripcion = :descripcion, desc_detallada = :desc_detallada, revoe = :revoe, 
        img_url = :img_url, pdf_url = :pdf_url 
        WHERE id_ec = :id_ec");
        try {
            $query->execute([
                'id_ec' => $item['id_ec'],
                'nom_ec' => $item['nom_ec'],
                'descripcion' => $item['descripcion'],
                'desc_detallada' => $item['desc_detallada'],
                'revoe' => $item['revoe'],
                'img_url' => $item['img_url'],
                'pdf_url' => $item['pdf_url']
            ]);
            return true;
        } catch (PDOException $th) {
            return false;
        }
    }

    public function delete($id){
        $query = $this->db->connect()->prepare(
            "DELETE FROM continua WHERE id_ec = :id");
        try {
            $query->execute(['id' => $id]);
            return true;
        } catch (PDOException $th) {
            return false;
        }
    }

    public function estado($item){
        $query = $this->db->connect()->prepare("UPDATE continua
        SET estado = :estado
        WHERE id_ec = :id_ec");
        try {
            $query->execute([
                'id_ec' => $item['id_ec'],
                'estado' => $item['estado']
            ]);
            return true;
        } catch (PDOException $th) {
            return false;
        }
    }

    public function insertEncabezado($datos)
    {
        try {
            $query = $this->db->connect()->prepare(
                'INSERT INTO encabezado (encabezado, descripcion, id_usu)
                VALUES (:encabezado, :descripcion, :id_usu)'
            );
            $query->execute([
                'encabezado' => $datos['encabezado'],
                'descripcion' => $datos['descripcion'],
                'id_usu' => $datos['id_usu'],
            ]);
            return true;
        } catch (PDOException $th) {
            return false;
        }
    }

    public function getByEncabezado($encabezado)
    {
        $item = new Encabezados();
        try {
            $query = $this->db->connect()->prepare(
                "SELECT * FROM encabezado WHERE encabezado = :encabezado"
            );
            $query->execute(['encabezado' => $encabezado]);

            $row = $query->fetch();
            if ($row) {
                $item->id_en = $row['id_en'];
                $item->encabezado = $row['encabezado'];
                $item->descripcion = $row['descripcion'];
                $item->id_usu = $row['id_usu'];
                return $item;
            } else {
                return false;
            }
        } catch (PDOException $th) {
            return [];
        }
    }

    public function updateEncabezado($datos)
    {
        $query = $this->db->connect()->prepare("UPDATE encabezado
            SET descripcion = :descripcion
            WHERE id_en= :id_en AND id_usu = :id_usu AND encabezado = :encabezado");

        try {
            $query->execute([
                'encabezado' => $datos['encabezado'],
                'descripcion' => $datos['descripcion'],
                'id_usu' => $datos['id_usu'],
                'id_en' => $datos['id_en']
            ]);
            return true;
        } catch (PDOException $th) {
            return false;
        }
    }
}
