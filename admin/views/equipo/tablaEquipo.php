<?php

foreach ($this->tablas as $row) {
    $tabla = new Profesionista();
    $tabla = $row;
?>
    <tr>
        <td class="align-middle" width="200px"><?php echo $tabla->nombre; ?></td>
        <td class="align-middle" width="200px"><?php echo $tabla->puesto; ?></td>
        <td class="align-middle"><img src="<?php echo $tabla->img_url; ?>" width="80px"></td>
        <td class="align-middle" width="300px">
            Facebook: <?php echo $tabla->rFace; ?></br>
            Twitter: <?php echo $tabla->rTw; ?></br>
            Instagram: <?php echo $tabla->rIns; ?>
        </td>
        <td class="align-middle"><?php
                                    if ($tabla->estado == 1) {
                                        echo "Activo";
                                    } else {
                                        echo "Inactivo";
                                    }
                                    ?></td>
        <td class="align-middle">
            <div class="col-auto" style="display: inline-block;">
                <a class="btn btn-outline-warning" data-toggle="modal" onclick="editarEquipo(<?= $tabla->id_eq; ?>)"><i class="fa fa-pencil-alt"></i></a>
                <a class="btn btn-outline-danger" data-toggle="modal" onclick="eliminarEquipo(<?= $tabla->id_eq; ?>)"><i class="fa fa-trash"></i></a>
                <?php
                if ($tabla->estado == 1) {
                ?>
                    <a class="btn btn-outline-dark" data-toggle="modal" onclick="estadoEq(<?= $tabla->id_eq; ?>)"><i class="fa fa-arrow-down"></i></a>
                <?php
                } else {
                ?>
                    <a class="btn btn-outline-success" data-toggle="modal" onclick="estadoEq(<?= $tabla->id_eq; ?>)"><i class="fa fa-arrow-up"></i></a>
                <?php
                }
                ?>
            </div>
        </td>
    </tr>
<?php } ?>