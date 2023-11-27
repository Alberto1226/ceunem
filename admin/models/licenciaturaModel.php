<?php
include_once 'models/licenciaturas.php';

class LicenciaturaModel extends Model{
    public function __construct()
    {
        parent::__construct();
    }

    public function getAllLicenciaturas(){
        $items =[];
        try {
            $query = $this->db->connect()->query("SELECT * FROM licenciaturas");
            while ($row = $query->fetch()) {
                $item = new Licenciaturas();

                $item->id_lic = $row['id_lic'];
                $item->nom_lic = $row['nom_lic'];
                $item->descripcion = $row['descripcion'];
                $item->img_url = $row['img_url'];
                $item->pdf_url = $row['pdf_url'];
                $item->estado = $row['estado'];

                array_push($items, $item);
            }
            return $items;
        } catch (PDOException $th) {
            return [];
        }
    }

    public function insert($datos){
        try {
            $query = $this->db->connect()->prepare(
                'INSERT INTO licenciaturas (nom_lic, descripcion, img_url, pdf_url, estado)
                VALUES(:nom_lic, :descripcion, :img_url, :pdf_url, :estado)');
            $query->execute([
                'nom_lic' =>$datos['nom_lic'], 
                'descripcion' =>$datos['descripcion'], 
                'img_url' =>$datos['img_url'], 
                'pdf_url' =>$datos['pdf_url'],
                'estado' => $datos['estado']
            ]);
            return true;
        } catch (PDOException $th) {
           return false;
        }
    }

    public function update($item){
        $query= $this->db->connect()->prepare("UPDATE licenciaturas 
        SET nom_lic = :nom_lic, descripcion = :descripcion, 
        img_url = :img_url, pdf_url = :pdf_url 
        WHERE id_lic = :id_lic");
        try {
            $query->execute([
                'id_lic' => $item['id_lic'],
                'nom_lic' => $item['nom_lic'],
                'descripcion' => $item['descripcion'],
                'img_url' => $item['img_url'],
                'pdf_url' => $item['pdf_url']
            ]);
            return true;
        } catch (PDOException $th) {
            return false;
        }
    }

    public function delete($id){
        $query = $this->db->connect()->prepare(
            "DELETE FROM licenciaturas WHERE id_lic = :id");
        try {
            $query->execute(['id' => $id]);
            return true;
        } catch (PDOException $th) {
            return false;
        }
    }

    public function estado($item){
        $query = $this->db->connect()->prepare("UPDATE licenciaturas
        SET estado = :estado
        WHERE id_lic = :id_lic");
        try {
            $query->execute([
                'id_lic' => $item['id_lic'],
                'estado' => $item['estado']
            ]);
            return true;
        } catch (PDOException $th) {
            return false;
        }
    }
}
?>