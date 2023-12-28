<?php
include_once 'models/clases/ofertas.php';
include_once 'models/clases/encabezados.php';
class OfertaModel extends Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function insert($datos)
    {
        try {
            $query = $this->db->connect()->prepare(
                'INSERT INTO oferta (tit, descripcion, img_url, btn_name, link, estado, id_usu)
                VALUES (:tit, :descripcion, :img_url, :btn_name, :link, :estado, :id_usu)'
            );

            $query->execute([
                'tit' => $datos['tit'],
                'descripcion' => $datos['descripcion'],
                'img_url' => $datos['img_url'],
                'btn_name' => $datos['btn_name'],
                'link' => $datos['link'],
                'estado' => $datos['estado'],
                'id_usu' => $datos['id_usu'],
            ]);
            return true;
        } catch (PDOException $th) {
            echo $th;
        }
    }

    public function getOfertas()
    {
        $items = [];
        try {

            $query = $this->db->connect()->query("SELECT * FROM oferta WHERE id_usu = 1");

            while ($row = $query->fetch()) {
                $item = new Ofertas();

                $item->id_ofe = $row['id_ofe'];
                $item->tit = $row['tit'];
                $item->descripcion = $row['descripcion'];
                $item->img_url = $row['img_url'];
                $item->btn_name = $row['btn_name'];
                $item->link = $row['link'];
                $item->estado = $row['estado'];
                $item->id_usu = $row['id_usu'];

                array_push($items, $item);
            }
            return $items;
        } catch (PDOException $th) {
            echo $th;
        }
    }

    public function getById($id)
    {
        $item = new Ofertas();
        try {
            $query = $this->db->connect()->prepare(
                "SELECT * FROM oferta WHERE id_ofe = :id_ofe"
            );
            $query->execute(['id_ofe' => $id]);

            while ($row = $query->fetch()) {
                $item->id_ofe = $row['id_ofe'];
                $item->tit = $row['tit'];
                $item->descripcion = $row['descripcion'];
                $item->img_url = $row['img_url'];
                $item->btn_name = $row['btn_name'];
                $item->link = $row['link'];
                $item->estado = $row['estado'];
                $item->id_usu = $row['id_usu'];
            }
            return $item;
        } catch (PDOException $th) {
            return [];
        }
    }

    public function update($datos)
    {
        try {
            $query = $this->db->connect()->prepare(
                'UPDATE oferta
                SET tit = :tit, descripcion = :descripcion,
                 img_url = :img_url, btn_name = :btn_name,   
                 link = :link, estado = :estado
                WHERE id_ofe = :id_ofe AND id_usu = :id_usu'
            );

            $query->execute([
                'id_ofe' => $datos['id_ofe'],
                'tit' => $datos['tit'],
                'descripcion' => $datos['descripcion'],
                'img_url' => $datos['img_url'],
                'btn_name' => $datos['btn_name'],
                'link' => $datos['link'],
                'estado' => $datos['estado'],
                'id_usu' => $datos['id_usu']
            ]);
            return true;
        } catch (PDOException $e) {
            echo $e;
        }
    }

    public function delete($item)
    {
        $query = $this->db->connect()->prepare(
            "DELETE FROM oferta WHERE id_ofe = :id_ofe AND id_usu = :id_usu"
        );
        try {
            $query->execute([
                'id_ofe' => $item['id_ofe'],
                'id_usu' => $item['id_usu']
            ]);
            return true;
        } catch (PDOException $th) {
            return false;
        }
    }

    public function estado($item)
    {
        $query = $this->db->connect()->prepare("UPDATE oferta
            SET estado = :estado
            WHERE id_ofe = :id_ofe AND id_usu = :id_usu");

        try {
            $query->execute([
                'id_ofe' => $item['id_ofe'],
                'id_usu' => $item['id_usu'],
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
