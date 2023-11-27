<?php
include_once 'models/continuas.php';

class ContinuaModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getAllContinuas()
    {
        $items = [];
        try {
            $query = $this->db->connect()->query("SELECT * FROM continua WHERE estado=1");
            while ($row = $query->fetch()) {
                $item = new Continuas();

                $item->id_ec = $row['id_ec'];
                $item->nom_ec = $row['nom_ec'];
                $item->descripcion = $row['descripcion'];
                $item->img_url = $row['img_url'];
                $item->pdf_url = $row['pdf_url'];

                array_push($items, $item);
            }
            return $items;
        } catch (PDOException $th) {
            return [];
        }
    }

    public function countRowsContinuas(){
        try {
            $query = $this->db->connect()->query("SELECT * FROM continuas");
            $filas=$query->rowCount();
            return $filas;
        } catch (PDOException $th) {
           return 0;
        }
    }
}
