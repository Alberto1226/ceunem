<?php
include_once 'models/maestrias.php';

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
            $query = $this->db->connect()->query("SELECT * FROM maestrias WHERE estado=1");
            while ($row = $query->fetch()) {
                $item = new Maestrias();

                $item->id_mas = $row['id_mas'];
                $item->nom_mas = $row['nom_mas'];
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
            $query = $this->db->connect()->query("SELECT * FROM maestrias");
            $filas=$query->rowCount();
            return $filas;
        } catch (PDOException $th) {
           return 0;
        }
    }
}
