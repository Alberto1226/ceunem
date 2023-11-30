<?php
include_once 'models/misiones.php';

class MisionModel extends Model{
    public function __construct()
    {
        parent::__construct();
    }

    public function insert($datos){
        try {
            $query = $this->db->connect()->prepare(
                'INSERT INTO mision (frase, autor, mision, img_header, img_body, estado)
                VALUES(:frase, :autor, :mision, :img_header, :img_body, :estado)');
            $query->execute([
                'frase' => $datos['frase'], 
                'autor' => $datos['autor'], 
                'mision' => $datos['mision'], 
                'img_header' => $datos['img_header'], 
                'img_body' => $datos['img_body'], 
                'estado' => 1
            ]);
            return true;
        } catch (PDOException $th) {
            return false;
        }
    }

}
?>