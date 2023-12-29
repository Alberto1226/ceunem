<?php
include_once 'models/clases/continuas.php';
include_once 'models/clases/encabezados.php';

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
            $query = $this->db->connect()->query("SELECT * FROM continua");
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
