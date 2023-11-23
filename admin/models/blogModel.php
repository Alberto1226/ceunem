<?php
include_once 'models/articulo.php';

class BlogModel extends Model{
    public function __construct()
    {
        parent::__construct();
    }

    public function getAllArticulos(){
        $items = [];
        try {
            $query = $this->db->connect()->query("SELECT*FROM blog");

            while ($row = $query->fetch()) {
                $item = new Articulo();

                $item->id_blog = $row['id_blog'];
                $item->categoria = $row['categoria'];
                $item->titulo = $row['titulo'];
                $item->descripcion = $row['descripcion'];
                $item->img_url = $row['img_url'];
                $item->link_url = $row['link_url'];

                array_push($items, $item);
            }
            return $items;
        } catch (PDOException $th) {
            return [];
        }
    }

    public function insert($datos){
        try {
            $query =$this->db->connect()->prepare(
                'INSERT INTO blog (categoria, titulo, descripcion, img_url, link_url)
                VALUES (:categoria, :titulo, :descripcion, :img_url, :link_url)');
            $query->execute([
                'categoria' =>$datos['categoria'],
                'titulo' =>$datos['titulo'],
                'descripcion' =>$datos['descripcion'],
                'img_url' =>$datos['img_url'],
                'link_url' =>$datos['link_url'],
            ]);
            return true;
        } catch (PDOException $th) {
            return false;
        }
    }

    public function getBlogId($idBlog){
        $item = new Articulo();
        $query=$this->db->connect()->prepare("SELECT * FROM blog
            WHERE id_blog = :id_blog");
        try {
            $query->execute(['id_blog' => $idBlog]);
            while ($row = $query->fetch()) {
                $item->id_blog = $row['id_blog'];
                $item->categoria = $row['categoria'];
                $item->titulo = $row['titulo'];
                $item->descripcion = $row['descripcion'];
                $item->img_url = $row['img_url'];
                $item->link_url = $row['link_url'];
            }
            return $item;
        } catch (PDOException $th) {
            return null;
        }
    }
}
?>