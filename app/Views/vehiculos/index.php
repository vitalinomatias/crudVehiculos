<?= $header; ?>   

<div class="card">
    <div class="card-header">
        <h5>Listado de Vehículos</h5>
        <a href="<?=base_url('/vehiculos/create') ?>" class="btn btn-success btn-sm">Agregar Vehiculos</a>
    </div>
    <div class="card-body">
        <form action="<?= base_url('/vehiculos') ?>" method="GET">
            <div>
                <label class="col-md-9">Busqueda</label>
            </div>
            <div class="form-group row">
                <div class="col-md-9">
                    <input type="text" name="busqueda" id="busqueda" class="form-control">
                </div>
                <div class="col-md-3">
                    <input type="submit" value="Buscar" class="btn  btn-primary btn-sm">
                </div>
            </div>
        </form>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Tipo</th>
                    <th>Color</th>
                    <th>Precio de Compra</th>
                    <th>Precio de Venta</th>
                    <th>Existencias</th>
                    <th colspan="2">&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach ($vehiculos as $key => $vehiculo) {
                ?>
                    <tr>
                        <td><?= $vehiculo['id'] ?></td>
                        <td><?= $vehiculo['marca'] ?></td>
                        <td><?= $vehiculo['modelo'] ?></td>
                        <td><?= $vehiculo['tipo'] ?></td>
                        <td><?= $vehiculo['color'] ?></td>
                        <td><?= $vehiculo['compra'] ?></td>
                        <td><?= $vehiculo['venta'] ?></td>
                        <td><?= $vehiculo['existencias'] ?></td>
                        <td width = "100px">
                            <a 
                                href="<?=base_url('/vehiculos/edit/'.$vehiculo['id']); ?>" 
                                class="btn btn-primary btn-sm">
                                Editar
                            </a>
                        </td>
                        <td width = "100px">
                            <a 
                                href="<?=base_url('/vehiculos/destroy/'.$vehiculo['id']); ?>" 
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
