<?php
include_once 'models/clases/smtp.php';
class ServidorModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function rowCon($id)
    {
        try {
            $query = $this->db->connect()->prepare("SELECT * FROM smtp WHERE id_usu = :id_usu");
            $query->execute(['id_usu' => $id]);
            $filas = $query->rowCount();
            return $filas;
        } catch (PDOException $th) {
            return 0;
        }
    }

    public function insert($datos)
    {
        try {
            $query = $this->db->connect()->prepare(
                "INSERT INTO smtp (dirServer, email, pass, portServer, conect, nombre, id_usu)
                VALUES (:dirServer, :email, :pass, :portServer, :conect, :nombre, :id_usu)"
            );

            $query->execute([
                'dirServer' => $datos['dirServer'],
                'email' => $datos['email'],
                'pass' => $datos['pass'],
                'portServer' => $datos['portServer'],
                'conect' => $datos['conect'],
                'nombre' => $datos['nombre'],
                'id_usu' => $datos['id_usu'],
            ]);
            return true;
        } catch (PDOException $th) {
            echo $th;
        }
    }

    public function getSmtp($id)
    {
        $item = new Smtp();
        try {
            $query = $this->db->connect()->prepare(
                "SELECT * FROM smtp WHERE id_usu = :id_usu"
            );
            $query->execute(['id_usu' => $id]);
            while ($row = $query->fetch()) {
                $item->id_smtp = $row['id_smtp'];
                $item->dirServer = $row['dirServer'];
                $item->email = $row['email'];
                $item->pass = $row['pass'];
                $item->portServer = $row['portServer'];
                $item->conect = $row['conect'];
                $item->nombre = $row['nombre'];
                $item->id_usu = $row['id_usu'];
            }
            return $item;
        } catch (PDOException $e) {
            return [];
        }
    }

    public function update($datos)
    {
        try {
            $query = $this->db->connect()->prepare(
                "UPDATE smtp
                SET dirServer =:dirServer, email = :email, pass = :pass, 
                portServer =:portServer, conect =:conect, nombre = :nombre 
                WHERE id_usu =:id_usu AND id_smtp = :id_smtp"
            );

            $query->execute([
                'id_smtp' => $datos['id_smtp'],
                'dirServer' => $datos['dirServer'],
                'email' => $datos['email'],
                'pass' => $datos['pass'],
                'portServer' => $datos['portServer'],
                'conect' => $datos['conect'],
                'nombre' => $datos['nombre'],
                'id_usu' => $datos['id_usu'],
            ]);
            return true;
        } catch (PDOException $th) {
            echo $th;
        }
    }
}
