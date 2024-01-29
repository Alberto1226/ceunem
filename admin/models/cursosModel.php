<?php
include_once 'models/clases/cursos.php';
include_once 'models/clases/encabezados.php';

class CursosModel extends Model{
    public function __construct()
    {
        parent::__construct();
    }

    public function getAllCursos(){
        $items =[];
        try {
            $query = $this->db->connect()->query("SELECT * FROM cursos");
            while ($row = $query->fetch()) {
                $item = new Cursos();

                $item->id_curso = $row['id_curso'];
                $item->nom_curso = $row['nom_curso'];
                $item->descripcion = $row['descripcion'];
                $item->img_url = $row['img_url'];
                $item->pdf_url = $row['pdf_url'];
                $item->estado = $row['estado'];

                array_push($items, $item);
            }
            return $items;
        } catch (PDOException $th) {
            return [];
        }
    }
    //listo
    public function insert($datos){
        try {
            $query = $this->db->connect()->prepare(
                'INSERT INTO cursos (nom_curso, descripcion, img_url, pdf_url, estado)
                VALUES(:nom_curso, :descripcion, :img_url, :pdf_url, :estado)');
            $query->execute([
                'nom_curso' =>$datos['nom_curso'], 
                'descripcion' =>$datos['descripcion'], 
                'img_url' =>$datos['img_url'], 
                'pdf_url' =>$datos['pdf_url'],
                'estado' => $datos['estado']
            ]);
            return true;
        } catch (PDOException $th) {
           return false;
        }
    }

    public function update($item){
        $query= $this->db->connect()->prepare("UPDATE cursos 
        SET nom_curso = :nom_curso, descripcion = :descripcion, 
        img_url = :img_url, pdf_url = :pdf_url 
        WHERE id_curso = :id_curso");
        try {
            $query->execute([
                'id_curso' => $item['id_curso'],
                'nom_curso' => $item['nom_curso'],
                'descripcion' => $item['descripcion'],
                'img_url' => $item['img_url'],
                'pdf_url' => $item['pdf_url']
            ]);
            return true;
        } catch (PDOException $th) {
            return false;
        }
    }

    public function delete($id){
        $query = $this->db->connect()->prepare(
            "DELETE FROM cursos WHERE id_curso = :id");
        try {
            $query->execute(['id' => $id]);
            return true;
        } catch (PDOException $th) {
            return false;
        }
    }

    public function estado($item){
        $query = $this->db->connect()->prepare("UPDATE cursos
        SET estado = :estado
        WHERE id_curso = :id_curso");
        try {
            $query->execute([
                'id_curso' => $item['id_curso'],
                'estado' => $item['estado']
            ]);
            return true;
        } catch (PDOException $th) {
            return false;
        }
    }

    public function insertEncabezado($datos)
    {
        try {
            $query = $this->db->connect()->prepare(
                'INSERT INTO encabezado (encabezado, descripcion, id_usu)
                VALUES (:encabezado, :descripcion, :id_usu)'
            );
            $query->execute([
                'encabezado' => $datos['encabezado'],
                'descripcion' => $datos['descripcion'],
                'id_usu' => $datos['id_usu'],
            ]);
            return true;
        } catch (PDOException $th) {
            return false;
        }
    }

    public function getByEncabezado($encabezado)
    {
        $item = new Encabezados();
        try {
            $query = $this->db->connect()->prepare(
                "SELECT * FROM encabezado WHERE encabezado = :encabezado"
            );
            $query->execute(['encabezado' => $encabezado]);

            $row = $query->fetch();
            if ($row) {
                $item->id_en = $row['id_en'];
                $item->encabezado = $row['encabezado'];
                $item->descripcion = $row['descripcion'];
                $item->id_usu = $row['id_usu'];
                return $item;
            } else {
                return false;
            }
        } catch (PDOException $th) {
            return [];
        }
    }

    public function updateEncabezado($datos)
    {
        $query = $this->db->connect()->prepare("UPDATE encabezado
            SET descripcion = :descripcion
            WHERE id_en= :id_en AND id_usu = :id_usu AND encabezado = :encabezado");

        try {
            $query->execute([
                'encabezado' => $datos['encabezado'],
                'descripcion' => $datos['descripcion'],
                'id_usu' => $datos['id_usu'],
                'id_en' => $datos['id_en']
            ]);
            return true;
        } catch (PDOException $th) {
            return false;
        }
    }
}
?>