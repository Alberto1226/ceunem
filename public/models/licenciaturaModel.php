<?php
include_once 'models/clases/licenciaturas.php';
include_once 'models/clases/encabezados.php';
include_once 'models/clases/imagen.php';

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

    public function getByEncabezado($encabezado){
        $item = new Encabezados();
        try {
            $query = $this->db->connect()->prepare(
                "SELECT * FROM encabezado WHERE encabezado = :encabezado AND id_usu = 1"
            );
            $query->execute(['encabezado' => $encabezado]);

            $row = $query->fetch();
            if ($row) {
                $item->id_en = $row['id_en'];
                $item->encabezado = $row['encabezado'];
                $item->descripcion = $row['descripcion'];
                $item->id_usu = $row['id_usu'];
                return $item;
            } else {
                return false;
            }
        } catch (PDOException $th) {
            return [];
        }
    }

    public function getBanner()
    {
        $items = [];
        try {
            $query = $this->db->connect()->query(
                "SELECT * FROM sliders WHERE id_usu=1 AND seccion='oferta-educativa' ORDER BY posicion ASC"
            );
            
            while ($row = $query->fetch()) {
                $item = new Imagen();
                $item->id_slider = $row['id_slider'];
                $item->img = $row['img'];
                $item->tit = $row['tit'];
                $item->descripcion = $row['descripcion'];
                $item->btn_name = $row['btn_name'];
                $item->link = $row['link'];
                $item->tUrl = $row['tUrl'];
                $item->posicion = $row['posicion'];
                $item->id_usu = $row['id_usu'];
                array_push($items, $item);
            }
            return $items;
        } catch (PDOException $e) {
            return [];
        }
    }
}
?>