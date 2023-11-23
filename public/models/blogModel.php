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

}
?>