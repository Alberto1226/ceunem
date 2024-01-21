<?php
include_once 'models/clases/whats.php';
include_once 'models/clases/articulo.php';
include_once 'models/clases/profesionista.php';
include_once 'models/clases/formulario.php';
include_once 'models/clases/imagen.php';
include_once 'models/clases/programa.php';
include_once 'models/clases/encabezados.php';
include_once 'models/clases/ofertas.php';
include_once 'models/clases/testimonio.php';
include_once 'models/clases/colores.php';

class HomeModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getWhats()
    {
        $item = new Whats();

        try {
            $query = $this->db->connect()->query("SELECT * FROM telefono WHERE id_usu = 1");

            while ($row = $query->fetch()) {
                $item->id_tel = $row['id_tel'];
                $item->numero = $row['numero'];
                $item->mensaje = $row['mensaje'];
                $item->id_usu = $row['id_usu'];
            }
            return $item;
        } catch (PDOException $th) {
            return [];
        }
    }

    public function getAllArticulos()
    {
        $items = [];
        try {
            $query = $this->db->connect()->query("SELECT*FROM blog WHERE estado=1");

            while ($row = $query->fetch()) {
                $item = new Articulo();

                $item->id_blog = $row['id_blog'];
                $item->categoria = $row['categoria'];
                $item->titulo = $row['titulo'];
                $item->descripcion = $row['descripcion'];
                $item->img_url = $row['img_url'];
                $item->link_url = $row['link_url'];

                array_push($items, $item);
            }
            return $items;
        } catch (PDOException $th) {
            return [];
        }
    }

    public function getProfesionisitas()
    {
        $items = [];
        try {
            $query = $this->db->connect()->query("SELECT * FROM equipo WHERE estado=1 AND id_usu=1");
            while ($row = $query->fetch()) {
                $item = new Profesionista();

                $item->nombre = $row['nombre'];
                $item->puesto = $row['puesto'];
                $item->img_url = $row['img_url'];
                $item->rFace = $row['rFace'];
                $item->rTw = $row['rTw'];
                $item->rIns = $row['rIns'];

                array_push($items, $item);
            }
            return $items;
        } catch (PDOException $th) {
            return [];
        }
    }

    public function getInputs()
    {
        $items = [];
        try {
            $query = $this->db->connect()->query("SELECT*FROM formulario WHERE id_usu=1");

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

    public function getSliders()
    {
        $items = [];
        try {
            $query = $this->db->connect()->query(
                "SELECT * FROM sliders WHERE id_usu=1 AND seccion='inicio' ORDER BY posicion ASC"
            );
            
            while ($row = $query->fetch()) {
                $item = new Imagen();

                $item->id_slider = $row['id_slider'];
                $item->img = $row['img'];
                $item->tit = $row['tit'];
                $item->descripcion = $row['descripcion'];
                $item->btn_name = $row['btn_name'];
                $item->link = $row['link'];
                $item->tUrl = $row['tUrl'];
                $item->posicion = $row['posicion'];
                $item->id_usu = $row['id_usu'];

                array_push($items, $item);
            }
            return $items;
        } catch (PDOException $e) {
            return [];
        }
    }

    public function getPrograma()
    {
        $item = new Programa();

        try {
            $query = $this->db->connect()->query("SELECT * FROM calidad WHERE id_usu = 1");

            while ($row = $query->fetch()) {

                $item->id_prog = $row['id_prog'];
                $item->nom_menu = $row['nom_menu'];
                $item->tit = $row['tit'];
                $item->descripcion = $row['descripcion'];
                $item->img_url = $row['img_url'];
                $item->btn_name = $row['btn_name'];
                $item->link = $row['link'];
                $item->tUrl = $row['tUrl'];
                $item->id_usu = $row['id_usu'];
            }
            return $item;
        } catch (PDOException $th) {
            return [];
        }
    }

    public function getByEncabezado($encabezado)
    {
        $item = new Encabezados();
        try {
            $query = $this->db->connect()->prepare(
                "SELECT * FROM encabezado WHERE encabezado = :encabezado AND id_usu = 1"
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

    public function getOfertas()
    {
        $items = [];
        try {
            $query = $this->db->connect()->query("SELECT * FROM oferta WHERE id_usu=1 LIMIT 3");

            while ($row = $query->fetch()) {
                $item = new Ofertas();
                $item->id_ofe = $row['id_ofe'];
                $item->tit = $row['tit'];
                $item->descripcion = $row['descripcion'];
                $item->img_url = $row['img_url'];
                $item->btn_name = $row['btn_name'];
                $item->link = $row['link'];
                $item->estado = $row['estado'];
                $item->id_usu = $row['id_usu'];

                array_push($items, $item);
            }
            return $items;
        } catch (PDOException $th) {
            return [];
        }
    }

    public function getTestimonios()
    {
        $items = [];
        try {
            $query = $this->db->connect()->query("SELECT * FROM testimonios WHERE id_usu=1");

            while ($row = $query->fetch()) {
                $item = new Testimonio();
                $item->id_tes = $row['id_tes'];
                $item->nombre = $row['nombre'];
                $item->carrera = $row['carrera'];
                $item->testimonio = $row['testimonio'];
                $item->img_url = $row['img_url'];
                $item->estado = $row['estado'];
                $item->id_usu = $row['id_usu'];

                array_push($items, $item);
            }
            return $items;
        } catch (PDOException $th) {
            return [];
        }
    }

    public function getColor()
    {
        $item = new Colores();

        try {
            $query = $this->db->connect()->query("SELECT * FROM colores WHERE id_usu = 1");

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
        } catch (PDOException $th) {
            return [];
        }
    }
}
