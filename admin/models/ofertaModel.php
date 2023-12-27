<?php
include_once 'models/clases/ofertas.php';
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
        
        $query = $this->db->connect()->prepare("SELECT * FROM oferta WHERE id_usu = 1");

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
            return [];
        }
    }
}
