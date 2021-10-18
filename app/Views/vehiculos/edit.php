<?= $header; ?>   
<?php 
    if (session('mensaje')){
        echo '<div class="alert alert-danger" role="alert">';
        echo session('mensaje');
        echo '</div>';
    }
?>

<div class="card">
    <div class="card-header">
        <h5>Editar Vehículos</h5>
    </div>
    <div class="card-body">
        <form action="<?= base_url('/vehiculos/update/'.$vehiculo['id']); ?>" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="marca">Marca </label>
                <input type="text" value="<?= $vehiculo['marca']; ?>" name="marca" id="marca" class="form-control" disabled>
            </div>
            <div class="form-group">
                <label for="modelo">Modelo </label>
                <input type="text" value="<?= $vehiculo['modelo']; ?>" name="modelo" id="modelo" class="form-control" disabled>
            </div>
            <div class="form-group">
                <label for="tipo">Tipo</label>
                <input type="text" value="<?= $vehiculo['tipo']; ?>" name="tipo" id="tipo" class="form-control" disabled>
            </div>
            <div class="form-group">
                <label for="color">Color</label>
                <input type="text" value="<?= $vehiculo['color']; ?>" name="color" id="color" class="form-control" disabled>
            </div>
            <div class="form-group">
                <label for="precio_venta">Precio de Venta </label>
                <input type="text" value="<?= $vehiculo['venta'] ?>" name="venta" id="venta" class="form-control">
            </div>
            <div class="form-group">
                <label for="precio_compra">Precio de Compra </label>
                <input type="text" value="<?= $vehiculo['compra'] ?>" name="compra" id="compra" class="form-control">
            </div>
            <div class="form-group">
                <label for="cantida">Existencias</label>
                <input type="text" value="<?= $vehiculo['existencias'] ?>" name="cantidad" id="cantidad" class="form-control">
            </div>
            <button type="submit" class="btn btn-success btn-sm">Guardar</button>
            <a href="<?= base_url('/vehiculos') ?>" class="btn btn-info btn-sm">Cancelar</a>
        </form>
    </div>
</div>

<?= $footer; ?>   