<?php
include_once 'models/clases/maestrias.php';
include_once 'models/clases/mas_datos.php';
include_once 'models/clases/encabezados.php';

class MaestriaModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getAllMaestrias()
    {
        $items = [];
        try {
            $query = $this->db->connect()->query("SELECT * FROM maestrias");
            while ($row = $query->fetch()) {
                $item = new Maestrias();

                $item->id_mas = $row['id_mas'];
                $item->nom_mas = $row['nom_mas'];
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

    public function getAllCards()
    {
        $items = [];
        try {
            $query = $this->db->connect()->query("SELECT * FROM mas_datos");
            while ($row = $query->fetch()) {
                $item = new mas_datos();

                $item->id_mas_datos = $row['id_mas_datos'];
                $item->id_mas = $row['id_mas'];
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

    public function insert($datos)
    {
        try {
            $query = $this->db->connect()->prepare(
                'INSERT INTO maestrias (nom_mas, descripcion, desc_detallada, revoe, img_url, pdf_url, estado)
                VALUES(:nom_mas, :descripcion, :desc_detallada, :revoe, :img_url, :pdf_url, :estado)'
            );
            $query->execute([
                'nom_mas' => $datos['nom_mas'],
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

    public function insertCard($datos)
    {
        try {
            $query = $this->db->connect()->prepare(
                'INSERT INTO mas_datos (id_mas, titulo, descripcion, img_url)
                VALUES(:id_mas, :titulo, :descripcion, :img_url)'
            );
            $query->execute([
                'id_mas' => $datos['id_mas'],
                'titulo' => $datos['titulo'],
                'descripcion' => $datos['descripcion'],
                'img_url' => $datos['img_url']
            ]);
            return true;
        } catch (PDOException $th) {
            return false;
        }
    }

    public function update($item)
    {
        $query = $this->db->connect()->prepare("UPDATE maestrias 
        SET nom_mas = :nom_mas, descripcion = :descripcion, desc_detallada = :desc_detallada, revoe = :revoe, 
        img_url = :img_url, pdf_url = :pdf_url 
        WHERE id_mas = :id_mas");
        try {
            $query->execute([
                'id_mas' => $item['id_mas'],
                'nom_mas' => $item['nom_mas'],
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

    public function updateCard($item)
    {
        $query = $this->db->connect()->prepare("UPDATE mas_datos 
        SET id_mas = :id_mas, titulo = :titulo, descripcion = :descripcion,
        img_url = :img_url 
        WHERE id_mas_datos = :id_mas_datos");
        try {
            $query->execute([
                'id_mas_datos' => $item['id_mas_datos'],
                'id_mas' => $item['id_mas'],
                'titulo' => $item['titulo'],
                'descripcion' => $item['descripcion'],
                'img_url' => $item['img_url']
            ]);
            return true;
        } catch (PDOException $th) {
            return false;
        }
    }

    public function delete($id)
    {
        $query = $this->db->connect()->prepare(
            "DELETE FROM maestrias WHERE id_mas = :id"
        );
        try {
            $query->execute(['id' => $id]);
            return true;
        } catch (PDOException $th) {
            return false;
        }
    }

    public function deleteCard($id)
    {
        $query = $this->db->connect()->prepare(
            "DELETE FROM mas_datos WHERE id_mas_datos = :id"
        );
        try {
            $query->execute(['id' => $id]);
            return true;
        } catch (PDOException $th) {
            return false;
        }
    }

    public function estado($item)
    {
        $query = $this->db->connect()->prepare("UPDATE maestrias
        SET estado = :estado
        WHERE id_mas = :id_mas");
        try {
            $query->execute([
                'id_mas' => $item['id_mas'],
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
