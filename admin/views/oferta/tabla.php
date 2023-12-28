<?php
include_once 'models/clases/ofertas.php';
foreach ($this->tablas as $row) {
    $tabla = new Ofertas();
    $tabla = $row;
?>
    <tr>
        <td class="align-middle" width="150px"><?= $tabla->tit; ?></td>
        <td class="align-middle" width="350px"><?= $tabla->descripcion; ?></td>
        <td class="align-middle" width="150px">
            <img src="<?php echo $tabla->img_url; ?>" width="100%">
        </td>
        <td class="align-middle" width="100px"><?= $tabla->btn_name; ?></td>
        <td class="align-middle" width="100px"><?= $tabla->link; ?></td>
        <td class="align-middle" width="85px">
            <?php
            if ($tabla->estado == 1) {
                echo "Activo";
            } else {
                echo "Inactivo";
            }
            ?>
        </td>
        <td class="align-middle" width="150px">
            <div class="col-auto" style="display: inline-block;">
                <a class="btn btn-outline-warning" data-toggle="modal" onclick="editarOferta(<?= $tabla->id_ofe; ?>)"><i class="fa fa-pencil-alt"></i></a>
                <a class="btn btn-outline-danger" data-toggle="modal" onclick="eliminarOferta(<?= $tabla->id_ofe; ?>)"><i class="fa fa-trash"></i></a>
                <?php
                if ($tabla->estado == 1) {
                ?>
                    <a class="btn btn-outline-dark" data-toggle="modal" onclick="estadoOferta(<?= $tabla->id_ofe; ?>)"><i class="fa fa-arrow-down"></i></a>
                <?php
                } else {
                ?>
                    <a class="btn btn-outline-success" data-toggle="modal" onclick="estadoOferta(<?= $tabla->id_ofe; ?>)"><i class="fa fa-arrow-up"></i></a>
                <?php
                }
                ?>
            </div>
        </td>
    </tr>
<?php } ?>