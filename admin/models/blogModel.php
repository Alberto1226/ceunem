<?php
include_once 'models/clases/articulo.php';

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
                $item->estado = $row['estado'];

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
                'INSERT INTO blog (categoria, titulo, descripcion, img_url, link_url, estado)
                VALUES (:categoria, :titulo, :descripcion, :img_url, :link_url, :estado)');
            $query->execute([
                'categoria' =>$datos['categoria'],
                'titulo' =>$datos['titulo'],
                'descripcion' =>$datos['descripcion'],
                'img_url' =>$datos['img_url'],
                'link_url' =>$datos['link_url'],
                'estado' => 1
            ]);
            return true;
        } catch (PDOException $th) {
            return false;
        }
    }

    public function update($item){
        $query= $this->db->connect()->prepare("UPDATE blog
            SET categoria = :categoria, titulo = :titulo, descripcion = :descripcion, 
            img_url = :img_url, link_url = :link_url
            WHERE id_blog = :id_blog");
        try {
            $query->execute([
                'id_blog' => $item['id_blog'],
                'categoria' => $item['categoria'],
                'titulo' => $item['titulo'],
                'descripcion' => $item['descripcion'],
                'img_url' => $item['img_url'],
                'link_url' => $item['link_url']
            ]);
            return true;
        } catch (PDOException $th) {
            return false;
        }
    }
    
    public function delete($id){
        $query= $this->db->connect()->prepare(
            "DELETE FROM blog WHERE id_blog = :id");
        try {
            $query->execute(['id' => $id]);
            return true;
        } catch (PDOException $th) {
            return false;
        }
    }

    public function estado($item){
        $query= $this->db->connect()->prepare("UPDATE blog
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
}
?>