<?php
include_once 'models/clases/testimonio.php';

foreach ($this->tablas as $row) {
    $tabla = new Testimonio();
    $tabla = $row;
?>
    <tr>
        <td class="align-middle" width="150px"><?= $tabla->nombre; ?></td>
        <td class="align-middle" width="100px"><?= $tabla->carrera; ?></td>
        <td class="align-middle" width="350px"><?= $tabla->testimonio; ?></td>
        <td class="align-middle" width="150px">
            <img src="<?php echo $tabla->img_url; ?>" width="100%">
        </td>
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
                <a class="btn btn-outline-warning" data-toggle="modal" onclick="editarTest(<?= $tabla->id_tes; ?>)"><i class="fa fa-pencil-alt"></i></a>
                <a class="btn btn-outline-danger" data-toggle="modal" onclick="eliminarTest(<?= $tabla->id_tes; ?>)"><i class="fa fa-trash"></i></a>
                <?php
                if ($tabla->estado == 1) {
                ?>
                    <a class="btn btn-outline-dark" data-toggle="modal" onclick="estadoTest(<?= $tabla->id_tes; ?>)"><i class="fa fa-arrow-down"></i></a>
                <?php
                } else {
                ?>
                    <a class="btn btn-outline-success" data-toggle="modal" onclick="estadoTest(<?= $tabla->id_tes; ?>)"><i class="fa fa-arrow-up"></i></a>
                <?php
                }
                ?>
            </div>
        </td>
    </tr>
<?php } ?>