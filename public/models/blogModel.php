 <?php
include_once 'models/clases/articulo.php';
include_once 'models/clases/encabezados.php';
include_once 'models/clases/imagen.php';

class BlogModel extends Model{
    public function __construct()
    {
        parent::__construct();
    }

    public function getAllArticulos(){
        $items = [];
        try {
            $query = $this->db->connect()->query("SELECT*FROM blog WHERE estado=1");

            while ($row = $query->fetch()) {
                $item = new Articulo();

                $item->id_blog = $row['id_blog'];
                $item->categoria = $row['categoria'];
                $item->titulo = $row['titulo'];
                $item->descripcion = $row['descripcion'];
                $item->blogCompleto = $row['blogCompleto'];
                $item->img_url = $row['img_url'];
                $item->link_url = $row['link_url'];

                array_push($items, $item);
            }
            return $items;
        } catch (PDOException $th) {
            return [];
        }
    }

    public function countBlog(){
        try {
            $query = $this->db->connect()->query("SELECT * FROM blog WHERE estado=1");
            $filas=$query->rowCount();
            return $filas;
        } catch (PDOException $th) {
           return 0;
        }
    }

    public function getByEncabezado($encabezado){
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


    public function getBanner()
    {
        $items = [];
        try {
            $query = $this->db->connect()->query(
                "SELECT * FROM sliders WHERE id_usu=1 AND seccion='blog' ORDER BY posicion ASC"
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

}
?>