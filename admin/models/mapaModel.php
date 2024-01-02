<?php
include_once 'models/clases/mapas.php';
class MapaModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function insert($datos)
    {
        try {
            $query = $this->db->connect()->prepare(
                'INSERT INTO mapa (mapa, id_usu)
                VALUES (:mapa, :id_usu)'
            );
            $query->execute([
                'mapa' => $datos['mapa'],
                'id_usu' => $datos['id_usu']
            ]);
            return true;
        } catch (PDOException $th) {
            return false;
        }
    }

    public function getMapa($id)
    {
        $item = new Mapas();
        try {
            $query = $this->db->connect()->prepare(
                "SELECT * FROM mapa WHERE id_usu = :id_usu"
            );
            $query->execute(['id_usu' => $id]);

            $row = $query->fetch();
            if ($row) {
                $item->id_mapa = $row['id_mapa'];
                $item->mapa = $row['mapa'];
                $item->id_usu = $row['id_usu'];
                return $item;
            } else {
                return false;
            }
        } catch (PDOException $th) {
            return [];
        }
    }

    public function update($datos)
    {
        $query = $this->db->connect()->prepare("UPDATE mapa
            SET mapa = :mapa
            WHERE id_mapa= :id_mapa AND id_usu = :id_usu");

        try {
            $query->execute([
                'mapa' => $datos['mapa'],
                'id_usu' => $datos['id_usu'],
                'id_mapa' => $datos['id_mapa']
            ]);
            return true;
        } catch (PDOException $th) {
            return false;
        }
    }
}
