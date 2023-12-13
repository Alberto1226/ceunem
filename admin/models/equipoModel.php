<?php
include_once 'models/clases/profesionista.php';

class EquipoModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getAllEquipo()
    {
        $items = [];
        try {
            $query = $this->db->connect()->query("SELECT*FROM equipo");

            while ($row = $query->fetch()) {
                $item = new Profesionista();

                $item->id_eq = $row['id_eq'];
                $item->nombre = $row['nombre'];
                $item->puesto = $row['puesto'];
                $item->img_url = $row['img_url'];
                $item->rFace = $row['rFace'];
                $item->rTw = $row['rTw'];
                $item->rIns = $row['rIns'];
                $item->estado = $row['estado'];
                $item->id_usu = $row['id_usu'];

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
                'INSERT INTO equipo (nombre, puesto, img_url, rFace, rTw, rIns, estado, id_usu)
                VALUES (:nombre, :puesto, :img_url, :rFace, :rTw, :rIns, :estado, :id_usu)'
            );
            $query->execute([
                'nombre' => $datos['nombre'],
                'puesto' => $datos['puesto'],
                'img_url' => $datos['img_url'],
                'rFace' => $datos['rFace'],
                'rTw' => $datos['rTw'],
                'rIns' => $datos['rIns'],
                'estado' => $datos['estado'],
                'id_usu' => $datos['id_usu']
            ]);
            return true;
        } catch (PDOException $th) {
            return false;
        }
    }

    public function getById($id)
    {
        $item = new Profesionista();
        $query = $this->db->connect()->prepare("SELECT * FROM equipo
        WHERE id_eq = :id_eq");

        try {
            $query->execute(['id_eq' => $id]);

            while ($row = $query->fetch()) {
                $item->id_eq = $row['id_eq'];
                $item->nombre = $row['nombre'];
                $item->puesto = $row['puesto'];
                $item->img_url = $row['img_url'];
                $item->rFace = $row['rFace'];
                $item->rTw = $row['rTw'];
                $item->rIns = $row['rIns'];
                $item->estado = $row['estado'];
                $item->id_usu = $row['id_usu'];
            }
            return $item;
        } catch (\Throwable $th) {
            return null;
        }
    }

    public function update($item)
    {
        $query = $this->db->connect()->prepare("UPDATE equipo
        SET nombre = :nombre, puesto = :puesto, img_url = :img_url, rFace = :rFace, rTW = :rTw, rIns= :rIns
        WHERE id_eq = :id_eq AND id_usu = :id_usu");

        try {
            $query->execute([
                'id_eq' => $item['id_eq'],
                'nombre' => $item['nombre'],
                'puesto' => $item['puesto'],
                'img_url' => $item['img_url'],
                'rFace' => $item['rFace'],
                'rTw' => $item['rTw'],
                'rIns' => $item['rIns'],
                'id_usu' => $item['id_usu']
            ]);
            return true;
        } catch (PDOException $th) {
            return false;
        }
    }

    public function delete($item)
    {
        $query = $this->db->connect()->prepare(
            "DELETE FROM equipo WHERE id_eq = :id_eq AND id_usu = :id_usu"
        );
        try {
            $query->execute([
                'id_eq' => $item['id_eq'],
                'id_usu' => $item['id_usu']
            ]);
            return true;
        } catch (PDOException $th) {
            return false;
        }
    }

    public function estado($item)
    {
        $query = $this->db->connect()->prepare("UPDATE equipo
            SET estado = :estado
            WHERE id_eq = :id_eq AND id_usu = :id_usu");

        try {
            $query->execute([
                'id_eq' => $item['id_eq'],
                'id_usu' => $item['id_usu'],
                'estado' => $item['estado']
            ]);
            return true;
        } catch (PDOException $th) {
            return false;
        }
    }
}
