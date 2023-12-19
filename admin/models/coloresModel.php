<?php
include_once 'models/clases/color.php';
class ColoresModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function insert($datos)
    {
        try {
            $query = $this->db->connect()->prepare(
                'INSERT INTO colores (let_hf, let_hover, btn_font, font, btn_hfont, 
                fondo_hf, btn_color, btn_hover, background, id_usu)
                VALUES (:let_hf, :let_hover, :btn_font, :font, :btn_hfont, 
                :fondo_hf, :btn_color, :btn_hover, :background, :id_usu)'
            );

            $query->execute([
                'let_hf' => $datos['let_hf'],
                'let_hover' => $datos['let_hover'],
                'btn_font' => $datos['btn_font'],
                'font' => $datos['font'],
                'btn_hfont' => $datos['btn_hfont'],
                'fondo_hf' => $datos['fondo_hf'],
                'btn_color' => $datos['btn_color'],
                'btn_hover' => $datos['btn_hover'],
                'background' => $datos['background'],
                'id_usu' => $datos['id_usu']
            ]);
            return true;
        } catch (PDOException $th) {
            echo $th;
        }
    }

    public function countRow($id)
    {
        try {
            $query = $this->db->connect()->prepare("SELECT * FROM colores WHERE id_usu = :id_usu");
            $query->execute(['id_usu' => $id]);
            $filas = $query->rowCount();
            return $filas;
        } catch (PDOException $th) {
            return 0;
        }
    }

    public function getColor($id)
    {
        $item = new Color();

        try {
            $query = $this->db->connect()->prepare(
                "SELECT * FROM colores WHERE id_usu = :id_usu"
            );

            $query->execute(['id_usu' => $id]);
            while ($row = $query->fetch()) {

                $item->id_color = $row['id_color'];
                $item->let_hf = $row['let_hf'];
                $item->let_hover = $row['let_hover'];
                $item->btn_font = $row['btn_font'];
                $item->font = $row['font'];
                $item->btn_hfont = $row['btn_hfont'];
                $item->fondo_hf = $row['fondo_hf'];
                $item->btn_color = $row['btn_color'];
                $item->btn_hover = $row['btn_hover'];
                $item->background = $row['background'];
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
                'UPDATE colores
                SET let_hf = :let_hf, let_hover = :let_hover, btn_font = :btn_font, font = :font, 
                btn_hfont = :btn_hfont, fondo_hf = :fondo_hf, btn_color = :btn_color, btn_hover = :btn_hover,
                background = :background
                WHERE id_color = :id_color AND id_usu = :id_usu'
            );

            $query->execute([
                'id_color' => $datos['id_color'],
                'let_hf' => $datos['let_hf'],
                'let_hover' => $datos['let_hover'],
                'btn_font' => $datos['btn_font'],
                'font' => $datos['font'],
                'btn_hfont' => $datos['btn_hfont'],
                'fondo_hf' => $datos['fondo_hf'],
                'btn_color' => $datos['btn_color'],
                'btn_hover' => $datos['btn_hover'],
                'background' => $datos['background'],
                'id_usu' => $datos['id_usu']
            ]);
            return true;
        }catch (PDOException $e) {
            echo $e;
         }
    }
}
