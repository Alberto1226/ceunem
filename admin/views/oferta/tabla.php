<?php
include_once 'models/clases/ofertas.php';
foreach ($this->tablas as $row) {
    $tabla = new Ofertas();
    $tabla = $row;
?>
<tr>
    <td><?= $tabla->tit; ?></td>
    <td><?= $tabla->descripcion; ?></td>
    <td>
        <img src="<?php echo $tabla->img_url; ?>">
    </td>
    <td><?= $tabla->btn_name; ?></td>
    <td><?= $tabla->link; ?></td>
    <td>
    <td class="align-middle">
            <div class="col-auto" style="display: inline-block;">
                <a class="btn btn-outline-warning" data-toggle="modal" onclick="editarOferta(<?= $tabla->id_ofe; ?>)"><i class="fa fa-pencil-alt"></i></a>
                <a class="btn btn-outline-danger" data-toggle="modal" onclick="eliminarOferta(<?= $tabla->id_ofe; ?>)"><i class="fa fa-trash"></i></a>
            </div>
        </td>
    </td>
</tr>
<?php } ?>