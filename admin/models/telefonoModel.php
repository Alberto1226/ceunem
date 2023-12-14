<?php

class TelefonoModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function rowCon($id)
    {
        try {
            $query = $this->db->connect()->prepare("SELECT * FROM telefono WHERE id_usu = :id_usu");
            $query->execute(['id_usu' => $id]);
            $filas = $query->rowCount();
            return $filas;
        } catch (PDOException $th) {
            return 0;
        }
    }

    public function insert($datos){
        try {
            $query = $this->db->connect()->prepare(
                "INSERT INTO telefono (numero, mensaje, id_usu)
                VALUES (:numero, :mensaje, :id_usu)"
            );

            $query->execute([
                'numero' => $datos['numero'],
                'mensaje' => $datos['mensaje'],
                'id_usu' => $datos['id_usu']
            ]);
            return true;
        } catch (PDOException $th) {
            return false;
        }
    }
}
