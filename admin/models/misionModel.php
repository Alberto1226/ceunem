<?php
include_once 'models/misiones.php';

class MisionModel extends Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function insert($datos)
    {
        try {
            $query = $this->db->connect()->prepare(
                'INSERT INTO mision (frase, autor, mision, img_body, estado, id_usu)
                VALUES(:frase, :autor, :mision, :img_body, :estado, :id_usu)'
            );
            $query->execute([
                'frase' => $datos['frase'],
                'autor' => $datos['autor'],
                'mision' => $datos['mision'],
                'img_body' => $datos['img_body'],
                'estado' => $datos['estado'],
                'id_usu' => $datos['id_usu']
            ]);
            return true;
        } catch (PDOException $th) {
            return false;
        }
    }

    public function getM($id)
    {
        $item = new Misiones();

        try {
            $query = $this->db->connect()->prepare(
                "SELECT * FROM mision WHERE id_usu = :id_usu"
            );

            $query->execute(['id_usu' => $id]);

            while ($row = $query->fetch()) {
                $item->id_mis = $row['id_mis'];
                $item->frase = $row['frase'];
                $item->autor = $row['autor'];
                $item->mision = $row['mision'];
                $item->img_body = $row['img_body'];
                $item->estado = $row['estado'];
                $item->id_usu = $row['id_usu'];
            }
            return $item;
        } catch (PDOException $e) {
            return [];
        }
    }

    function update($item)
    {
        $query = $this->db->connect()->prepare("UPDATE mision
        SET frase = :frase, autor = :autor, mision = :mision, img_body =  :img_body
        WHERE id_mis = :id_mis AND id_usu = :id_usu");

        try {
            $query->execute([
                'id_mis' => $item['id_mis'],
                'frase' => $item['frase'],
                'autor' => $item['autor'],
                'mision' => $item['mision'],
                'img_body' => $item['img_body'],
                'id_usu' => $item['id_usu']
            ]);
            return true;
        } catch (PDOException $th) {
          echo $th;
        }
    }
}
