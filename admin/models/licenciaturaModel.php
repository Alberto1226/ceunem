<?php
include_once 'models/clases/licenciaturas.php';
include_once 'models/clases/lic_datos.php';
include_once 'models/clases/encabezados.php';

class LicenciaturaModel extends Model{
    public function __construct()
    {
        parent::__construct();
    }

    public function getAllLicenciaturas(){
        $items =[];
        try {
            $query = $this->db->connect()->query("SELECT * FROM licenciaturas");
            while ($row = $query->fetch()) {
                $item = new Licenciaturas();

                $item->id_lic = $row['id_lic'];
                $item->nom_lic = $row['nom_lic'];
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

    public function getAllCards(){
        $items =[];
        try {
            $query = $this->db->connect()->query("SELECT * FROM lic_datos");
            while ($row = $query->fetch()) {
                $item = new lic_datos();

                $item->id_lic_datos = $row['id_lic_datos'];
                $item->id_lic = $row['id_lic'];
                $item->titulo = $row['titulo'];
                $item->descripcion = $row['descripcion'];
                $item->img_url = $row['img_url'];

                array_push($items, $item);
            }
            return $items;
        } catch (PDOException $th) {
            return [];
        }
    }

    public function insert($datos){
        try {
            $query = $this->db->connect()->prepare(
                'INSERT INTO licenciaturas (nom_lic, descripcion, desc_detallada, revoe, img_url, pdf_url, estado)
                VALUES(:nom_lic, :descripcion, :desc_detallada, :revoe, :img_url, :pdf_url, :estado)');
            $query->execute([
                'nom_lic' =>$datos['nom_lic'], 
                'descripcion' =>$datos['descripcion'],
                'desc_detallada' =>$datos['desc_detallada'], 
                'revoe' =>$datos['revoe'],
                'img_url' =>$datos['img_url'], 
                'pdf_url' =>$datos['pdf_url'],
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
                'INSERT INTO lic_datos (id_lic, titulo, descripcion, img_url)
                VALUES(:id_lic, :titulo, :descripcion, :img_url)');
            $query->execute([
                'id_lic' =>$datos['id_lic'], 
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
        $query= $this->db->connect()->prepare("UPDATE licenciaturas 
        SET nom_lic = :nom_lic, descripcion = :descripcion, desc_detallada = :desc_detallada, revoe = :revoe,
        img_url = :img_url, pdf_url = :pdf_url 
        WHERE id_lic = :id_lic");
        try {
            $query->execute([
                'id_lic' => $item['id_lic'],
                'nom_lic' => $item['nom_lic'],
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

    public function updateCard($item){
        $query= $this->db->connect()->prepare("UPDATE lic_datos 
        SET id_lic = :id_lic, titulo = :titulo, descripcion = :descripcion,
        img_url = :img_url 
        WHERE id_lic_datos = :id_lic_datos");
        try {
            $query->execute([
                'id_lic_datos' => $item['id_lic_datos'],
                'id_lic' => $item['id_lic'],
                'titulo' => $item['titulo'],
                'descripcion' => $item['descripcion'],
                'img_url' => $item['img_url']
            ]);
            return true;
        } catch (PDOException $th) {
            return false;
        }
    }

    public function delete($id){
        $query = $this->db->connect()->prepare(
            "DELETE FROM licenciaturas WHERE id_lic = :id");
        try {
            $query->execute(['id' => $id]);
            return true;
        } catch (PDOException $th) {
            return false;
        }
    }

    public function deleteCard($id){
        $query = $this->db->connect()->prepare(
            "DELETE FROM lic_datos WHERE id_lic_datos = :id");
        try {
            $query->execute(['id' => $id]);
            return true;
        } catch (PDOException $th) {
            return false;
        }
    }

    public function estado($item){
        $query = $this->db->connect()->prepare("UPDATE licenciaturas
        SET estado = :estado
        WHERE id_lic = :id_lic");
        try {
            $query->execute([
                'id_lic' => $item['id_lic'],
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
?>