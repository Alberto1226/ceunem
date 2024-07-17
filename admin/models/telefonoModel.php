<?php
include_once 'models/clases/whats.php';
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

    public function insert($datos)
    {
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

    public function getWhatsaap($id)
    {
        $item = new Whats();
        try {
            $query = $this->db->connect()->prepare(
                "SELECT * FROM telefono WHERE id_usu = :id_usu"
            );
            $query->execute(['id_usu' => $id]);
            while ($row = $query->fetch()) {
                $item->id_tel = $row['id_tel'];
                $item->numero = $row['numero'];
                $item->mensaje = $row['mensaje'];
                $item->id_usu = $row['id_usu'];
                $item->link_facebook = $row['link_facebook']; // Agregar el nuevo campo
                $item->link_instagram = $row['link_instagram']; // Agregar el nuevo campo
                $item->domicilio1 = $row['domicilio1']; // Agregar el nuevo campo
                $item->domicilio2 = $row['domicilio2']; // Agregar el nuevo campo
                $item->leyenda = $row['leyenda']; // Agregar el nuevo campo
            }
            return $item;
        } catch (PDOException $th) {
            return [];
        }
    }


    public function update($datos)
    {
        try {
            $query = $this->db->connect()->prepare(
                "UPDATE telefono
                 SET numero = :numero,
                mensaje = :mensaje,
                link_facebook = :link_facebook,
                link_instagram = :link_instagram,
                domicilio1 = :domicilio1,
                domicilio2 = :domicilio2,
                leyenda = :leyenda
            WHERE id_usu = :id_usu AND id_tel = :id_tel"
            );

            $query->execute([
                'id_tel' => $datos['id_tel'],
                'numero' => $datos['numero'],
                'mensaje' => $datos['mensaje'],
                'link_facebook' => $datos['link_facebook'],
                'link_instagram' => $datos['link_instagram'],
                'domicilio1' => $datos['domicilio1'],
                'domicilio2' => $datos['domicilio2'],
                'leyenda' => $datos['leyenda'],
                'id_usu' => $datos['id_usu']
            ]);
            return true;
        } catch (PDOException $th) {
            return false;
        }
    }
}
