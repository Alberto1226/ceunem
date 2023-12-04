<?php
include_once 'models/mision.php';

class NosotrosModel extends Model{
    public function __construct()
    {
        parent::__construct();
    }

    public function getMision(){
        $items = [];
        try {
            $query = $this->db->connect()->query("SELECT*FROM mision WHERE estado=1");
            while($row = $query->fetch()){
                $item = new Mision();

                $item->id_mis = $row['id_mis'];
                $item->frase = $row['frase'];
                $item->autor = $row['autor'];
                $item->mision = $row['mision'];
                $item->img_body = $row['img_body'];

                array_push($items, $item);
            }
            return $items;
        } catch (PDOException $th) {
            return [];
        }
    }
}
?>