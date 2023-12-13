<?php
include_once 'models/clases/formulario.php';

class ContactoModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function insert($datos)
    {
        try {
            $query = $this->db->connect()->prepare(
                'INSERT INTO formulario (nCompleto, nombre, apellidos, email, tel, face, mensaje, asunto, live, id_usu)
                VALUES (:nCompleto, :nombre, :apellidos, :email, :tel, :face, :mensaje, :asunto, :live, :id_usu)'
            );
                
            $query->execute([
                'nCompleto' => $datos['nCompleto'],
                'nombre' => $datos['nombre'],
                'apellidos' => $datos['apellidos'],
                'email' => $datos['email'],
                'tel' => $datos['tel'],
                'face' => $datos['face'],
                'mensaje' => $datos['mensaje'],
                'asunto' => $datos['asunto'],
                'live' => $datos['live'],
                'id_usu' => $datos['id_usu'],
            ]);
            return true;
        } catch (PDOException $th) {
            return false;
        }
    }

    public function getForm($id){
        $item = new Formulario();
        try {
            $query = $this->db->connect()->prepare(
                "SELECT * FROM formulario WHERE id_usu = :id_usu"
            );
            $query->execute(['id_usu' => $id]);
            while ($row = $query->fetch()) {
                $item->id_form = $row['id_form'];
                $item->nCompleto = $row['nCompleto'];
                $item->nombre = $row['nombre'];
                $item->apellidos = $row['apellidos'];
                $item->email = $row['email'];
                $item->tel = $row['tel'];
                $item->face = $row['face'];
                $item->mensaje = $row['mensaje'];
                $item->asunto = $row['asunto'];
                $item->live = $row['live'];
                $item->id_usu = $row['id_usu'];
            }
            return $item;
        } catch (PDOException $e) {
            return [];
        }
    }

    public function rowContacto($id){
        try {
            $query = $this->db->connect()->prepare("SELECT * FROM formulario WHERE id_usu = :id_usu");
            $query->execute(['id_usu' => $id]);
            $filas = $query->rowCount();
            return $filas;

        } catch (PDOException $th) {
            return 0;
        }
    }

    public function update($item){
        $query = $this->db->connect()->prepare("UPDATE formulario
        SET nCompleto = :nCompleto, nombre = :nombre, apellidos = :apellidos, email = :email, tel = :tel, face = :face, mensaje = :mensaje, asunto = :asunto, live =:live
        WHERE id_usu = :id_usu AND id_form = :id_form");

        try {
            $query->execute([
                'id_form' => $item['id_form'],
                'nCompleto' => $item['nCompleto'],
                'nombre' => $item['nombre'],
                'apellidos' => $item['apellidos'],
                'email' => $item['email'],
                'tel' => $item['tel'],
                'face' => $item['face'],
                'mensaje' => $item['mensaje'],
                'asunto' => $item['asunto'],
                'live' => $item['live'],
                'id_usu' => $item['id_usu'],
            ]);
            return true;
        } catch (PDOException $th) {
            echo $th;
        }
    }
}
