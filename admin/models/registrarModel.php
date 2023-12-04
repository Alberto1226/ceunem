<?php

class RegistrarModel extends Model{
    public function __construct()
    {
        parent::__construct();
    }

    public function insert($datos){
        try {
            $query = $this->db->connect()->prepare(
                'INSERT INTO usuarios (nombre, email, pass, estado)
                VALUES(:nombre, :email, :pass, :estado)');
            $query->execute([
                'nombre' => $datos['nombre'], 
                'email' => $datos['email'], 
                'pass' => $datos['pass'], 
                'estado' => 1
            ]);
            return true;
        } catch (PDOException $th) {
            return false;
        }
    }
}

?>