<?php
include_once 'models/clases/video.php';

class HomeModel extends Model{
    public function __construct()
    {
        parent::__construct();
    }

    public function getVideo(){
        $items = [];
        try {
            $query = $this->db->connect()->query("SELECT vid_url FROM inicio WHERE estado=1");

            while ($row = $query->fetch()) {
                $item = new Video();

                $item->vid_url = $row['vid_url'];

                array_push($items, $item);
            }
            return $items;
        } catch (PDOException $th) {
            return [];
        }
    }


}
?>