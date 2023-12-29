<?php
include_once 'models/clases/testimonio.php';
include_once 'models/clases/encabezados.php';

class TestimoniosModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function insert($datos)
    {
        try {
            $query = $this->db->connect()->prepare(
                'INSERT INTO testimonios (nombre, carrera, testimonio, img_url, estado, id_usu)
                VALUES (:nombre, :carrera, :testimonio, :img_url, :estado, :id_usu)'
            );

            $query->execute([
                'nombre' => $datos['nombre'],
                'carrera' => $datos['carrera'],
                'testimonio' => $datos['testimonio'],
                'img_url' => $datos['img_url'],
                'estado' => $datos['estado'],
                'id_usu' => $datos['id_usu'],
            ]);
            return true;
        } catch (PDOException $th) {
            echo $th;
        }
    }

    public function getTest()
    {
        $items = [];
        try {
            $query = $this->db->connect()->query("SELECT * FROM testimonios WHERE id_usu = 1");

            while ($row = $query->fetch()) {
                $item = new Testimonio();

                $item->id_tes = $row['id_tes'];
                $item->nombre = $row['nombre'];
                $item->carrera = $row['carrera'];
                $item->testimonio = $row['testimonio'];
                $item->img_url = $row['img_url'];
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
        $item = new Testimonio();
        try {
            $query = $this->db->connect()->prepare(
                "SELECT * FROM testimonios WHERE id_tes = :id_tes"
            );
            $query->execute(['id_tes' => $id]);

            while ($row = $query->fetch()) {
                $item->id_tes = $row['id_tes'];
                $item->nombre = $row['nombre'];
                $item->carrera = $row['carrera'];
                $item->testimonio = $row['testimonio'];
                $item->img_url = $row['img_url'];
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
                'UPDATE testimonios
                SET nombre = :nombre, carrera = :carrera, testimonio = :testimonio,
                img_url = :img_url, estado = :estado
                WHERE id_tes = :id_tes AND id_usu = :id_usu'
            );

            $query->execute([
                'id_tes' => $datos['id_tes'],
                'nombre' => $datos['nombre'],
                'carrera' => $datos['carrera'],
                'testimonio' => $datos['testimonio'],
                'img_url' => $datos['img_url'],
                'estado' => $datos['estado'],
                'id_usu' => $datos['id_usu'],
            ]);
            return true;
        } catch (PDOException $e) {
            echo $e;
        }
    }
    
    public function delete($item){
        $query = $this->db->connect()->prepare(
            "DELETE FROM testimonios WHERE id_tes = :id_tes AND id_usu = :id_usu"
        );
        try {
            $query->execute([
                'id_tes' => $item['id_tes'],
                'id_usu' => $item['id_usu']
            ]);
            return true;
        } catch (PDOException $th) {
            return false;
        }
    }

    public function estado($item)
    {
        $query = $this->db->connect()->prepare("UPDATE testimonios
            SET estado = :estado
            WHERE id_tes = :id_tes AND id_usu = :id_usu");

        try {
            $query->execute([
                'id_tes' => $item['id_tes'],
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
