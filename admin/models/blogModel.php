<?php
include_once 'models/clases/articulo.php';
include_once 'models/clases/encabezados.php';

class BlogModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getAllArticulos()
    {
        $items = [];
        try {
            $query = $this->db->connect()->query("SELECT*FROM blog");

            while ($row = $query->fetch()) {
                $item = new Articulo();

                $item->id_blog = $row['id_blog'];
                $item->categoria = $row['categoria'];
                $item->titulo = $row['titulo'];
                $item->descripcion = $row['descripcion'];
                $item->blogCompleto = $row['blogCompleto'];
                $item->img_url = $row['img_url'];
                $item->link_url = $row['link_url'];
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
                'INSERT INTO blog (categoria, titulo, descripcion, blogCompleto, img_url, link_url, estado)
                VALUES (:categoria, :titulo, :descripcion, :blogCompleto, :img_url, :link_url, :estado)'
            );
            $query->execute([
                'categoria' => $datos['categoria'],
                'titulo' => $datos['titulo'],
                'descripcion' => $datos['descripcion'],
                'blogCompleto' => $datos['blogCompleto'],
                'img_url' => $datos['img_url'],
                'link_url' => $datos['link_url'],
                'estado' => 1
            ]);
            return true;
        } catch (PDOException $th) {
            return false;
        }
    }

    public function update($item)
    {
        $query = $this->db->connect()->prepare("UPDATE blog
            SET categoria = :categoria, titulo = :titulo, descripcion = :descripcion, blogCompleto = :blogCompleto,
            img_url = :img_url, link_url = :link_url
            WHERE id_blog = :id_blog");
        try {
            $query->execute([
                'id_blog' => $item['id_blog'],
                'categoria' => $item['categoria'],
                'titulo' => $item['titulo'],
                'descripcion' => $item['descripcion'],
                'blogCompleto' => $item['blogCompleto'],
                'img_url' => $item['img_url'],
                'link_url' => $item['link_url']
            ]);
            return true;
        } catch (PDOException $th) {
            return false;
        }
    }

    public function delete($id)
    {
        $query = $this->db->connect()->prepare(
            "DELETE FROM blog WHERE id_blog = :id"
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
        $query = $this->db->connect()->prepare("UPDATE blog
            SET estado = :estado
            WHERE id_blog = :id_blog");
        try {
            $query->execute([
                'id_blog' => $item['id_blog'],
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
