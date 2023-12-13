<?php
include_once 'models/clases/licenciaturas.php';

class LicenciaturaModel extends Model{
    public function __construct()
    {
        parent::__construct();
    }

    public function getAllLicenciaturas(){
        $items =[];
        try {
            $query = $this->db->connect()->query("SELECT * FROM licenciaturas WHERE estado=1");
            while ($row = $query->fetch()) {
                $item = new Licenciaturas();

                $item->id_lic = $row['id_lic'];
                $item->nom_lic = $row['nom_lic'];
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
            $query = $this->db->connect()->query("SELECT * FROM licenciaturas");
            $filas=$query->rowCount();
            return $filas;
        } catch (PDOException $th) {
           return 0;
        }
    }
}
?>