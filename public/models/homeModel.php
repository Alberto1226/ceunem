<?php
include_once 'models/clases/video.php';
include_once 'models/clases/whats.php';

class HomeModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getVideo()
    {
        $items = [];

        try {
            $query = $this->db->connect()->query(
                "SELECT * FROM inicio WHERE estado = 1" 
            );

            while ($row = $query->fetch()) {
                $item = new Video ();
                $item->id_ini = $row['id_ini'];
                $item->vid_url = $row['vid_url'];
                $item->estado = $row['estado'];
                $item->id_usu = $row['id_usu'];

                array_push($items, $item);
            }
            return $items;
        } catch (PDOException $th) {
            return [];
        }
    }

    public function getWhats(){
        $item = new Whats();

        try {
            $query = $this->db->connect()->query("SELECT * FROM telefono WHERE id_usu = 1");

            while($row = $query->fetch()){
                $item->id_tel = $row['id_tel'];
                $item->numero = $row['numero'];
                $item->mensaje = $row['mensaje'];
                $item->id_usu = $row['id_usu'];
            }
            return $item;
        } catch (PDOException $th) {
            return [];
        }
    }

}
