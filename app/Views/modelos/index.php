<?= $header; ?>   
<div class="card">
    <div class="card-header">
        <h5>Listado de modelos</h5>
        <a href="<?=base_url('/modelos/create') ?>" class="btn btn-success btn-sm">Nuevo Modelo</a>
    </div>
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Modelo</th>
                    <th colspan="2">&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach ($modelos as $key => $modelo) {
                ?>
                    <tr>
                        <td><?= $modelo['id']; ?></td>
                        <td><?= $modelo['nombre']; ?></td>
                        <td width ="100px">
                            <a 
                                href="<?=base_url('/modelos/edit/'.$modelo['id']); ?>" 
                                class="btn btn-primary btn-sm">
                                Editar
                            </a>
                        </td>
                        <td width = "100px">
                            <a 
                                href="<?=base_url('/modelos/destroy/'.$modelo['id']); ?>" 
                                class="btn btn-danger btn-sm">
                                Eliminar
                            </a>
                        </td>
                    </tr>
                <?php    
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript">
    let mensaje = '<?= $mensaje?>';

    if (mensaje == 1){
        swal ('Agregado', 'Agregado con éxito', 'success');
    } else if (mensaje == 2) {
        swal ('Error', 'No se agrego', 'danger');
    } else if (mensaje == 3) {
        swal ('Actualizado', 'Se actualizo con éxito', 'success');
    } else if (mensaje == 4) {
        swal ('Error', 'No se actualizo', 'danger');
    } else if (mensaje == 5) {
        swal ('Eliminado', 'Se elimino con éxito', 'success');
    } else if (mensaje == 6) {
        swal ('Error', 'No se elimino', 'danger');
    }
</script>

<?= $footer; ?>   
