<?php
include_once 'models/clases/video.php';

class InicioModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function countRow($id)
    {
        try {
            $query = $this->db->connect()->prepare("SELECT * FROM inicio WHERE id_usu = :id_usu");
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
                'INSERT INTO inicio (vid_url, estado, id_usu)
                VALUES (:vid_url, :estado, :id_usu)'
            );
            $query->execute([
                'vid_url' => $datos['vid_url'],
                'estado' => $datos['estado'],
                'id_usu' => $datos['id_usu'],
            ]);
            return true;
        } catch (PDOException $th) {
            echo $th;
        }
    }

    public function getIni($id)
    {
        $item = new video();

        try {
            $query = $this->db->connect()->prepare(
                "SELECT * FROM inicio WHERE id_usu = :id_usu"
            );

            $query->execute(['id_usu' => $id]);
            while ($row = $query->fetch()) {
                $item->id_ini = $row['id_ini'];
                $item->vid_url = $row['vid_url'];
                $item->estado = $row['estado'];
                $item->id_usu = $row['id_usu'];
            }

            return $item;
        } catch (PDOException $e) {
            return [];
        }
    }

    public function update($item)
    {
        $query = $this->db->connect()->prepare("UPDATE inicio
        SET vid_url = :vid_url
        WHERE id_ini = :id_ini AND id_usu = :id_usu");

        try {
            $query->execute([
                'id_ini' => $item['id_ini'],
                'vid_url' => $item['vid_url'],
                'id_usu' => $item['id_usu']
            ]);
            return true;
        } catch (PDOException $th) {
            return false;
        }
    }
}
