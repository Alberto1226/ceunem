<?php
include_once 'models/clases/formulario.php';
include_once 'models/clases/smtp.php';
include_once 'models/clases/mapas.php';

class ContactoModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getInputs()
    {
        $items = [];
        try {
            $query = $this->db->connect()->query("SELECT*FROM formulario");

            while ($row = $query->fetch()) {
                $item = new Formulario();

                $item->nCompleto = $row['nCompleto'];
                $item->nombre = $row['nombre'];
                $item->apellidos = $row['apellidos'];
                $item->email = $row['email'];
                $item->tel = $row['tel'];
                $item->face = $row['face'];
                $item->mensaje = $row['mensaje'];
                $item->asunto = $row['asunto'];
                $item->live = $row['live'];

                array_push($items, $item);
            }
            return $items;
        } catch (PDOException $th) {
            return [];
        }
    }

    function getSmtp()
    {
        try {
            $query = $this->db->connect()->query("SELECT*FROM smtp");
            while ($row = $query->fetch()) {
                $item = new Smtp();
                $item->dirServer = $row['dirServer'];
                $item->email = $row['email'];
                $item->pass = $row['pass'];
                $item->portServer = $row['portServer'];
                $item->conect = $row['conect'];
                array_push($items, $item);
            }
            return $items;
        } catch (PDOException $th) {
            return [];
        }
    }

    public function getMapa()
    {
        $item = new Mapas();
        try {
            $query = $this->db->connect()->query(
                "SELECT * FROM mapa WHERE id_usu = 1"
            );
            
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
}
