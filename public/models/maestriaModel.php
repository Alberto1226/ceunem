<?php
include_once 'models/clases/maestrias.php';
include_once 'models/clases/encabezados.php';

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
}
