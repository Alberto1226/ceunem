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
            $query = $this->db->connect()->query("SELECT * FROM maestrias");
            while ($row = $query->fetch()) {
                $item = new Maestrias();

                $item->id_mas = $row['id_mas'];
                $item->nom_mas = $row['nom_mas'];
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

    public function insert($datos)
    {
        try {
            $query = $this->db->connect()->prepare(
                'INSERT INTO maestrias (nom_mas, descripcion, img_url, pdf_url, estado)
                VALUES(:nom_mas, :descripcion, :img_url, :pdf_url, :estado)'
            );
            $query->execute([
                'nom_mas' => $datos['nom_mas'],
                'descripcion' => $datos['descripcion'],
                'img_url' => $datos['img_url'],
                'pdf_url' => $datos['pdf_url'],
                'estado' => $datos['estado']
            ]);
            return true;
        } catch (PDOException $th) {
            return false;
        }
    }

    public function update($item){
        $query= $this->db->connect()->prepare("UPDATE maestrias 
        SET nom_mas = :nom_mas, descripcion = :descripcion, 
        img_url = :img_url, pdf_url = :pdf_url 
        WHERE id_mas = :id_mas");
        try {
            $query->execute([
                'id_mas' => $item['id_mas'],
                'nom_mas' => $item['nom_mas'],
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
            "DELETE FROM maestrias WHERE id_mas = :id");
        try {
            $query->execute(['id' => $id]);
            return true;
        } catch (PDOException $th) {
            return false;
        }
    }

    public function estado($item){
        $query = $this->db->connect()->prepare("UPDATE maestrias
        SET estado = :estado
        WHERE id_mas = :id_mas");
        try {
            $query->execute([
                'id_mas' => $item['id_mas'],
                'estado' => $item['estado']
            ]);
            return true;
        } catch (PDOException $th) {
            return false;
        }
    }
}
