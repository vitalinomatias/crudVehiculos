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
        <h5>Agregar Vehículos</h5>
    </div>
    <div class="card-body">
        <form action="<?= base_url('/vehiculos/store') ?>" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="marca">Marca </label>
                <select name="marca" id="marca" class="form-control">
                    <?php
                        foreach ($marcas as $key => $marca) {
                    ?>
                        <option value="<?= $marca['id']; ?>"><?= $marca['nombre']; ?></option>
                    <?php
                        }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="modelo">Modelo </label>
                <select name="modelo" id="modelo" class="form-control">
                    <?php
                        foreach ($modelos as $key => $modelo) {
                    ?>
                        <option value="<?= $modelo['id']; ?>"><?= $modelo['nombre']; ?></option>
                    <?php
                        }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="tipo">Tipo</label>
                <select name="tipo" id="tipo" class="form-control">
                <?php
                        foreach ($tipos as $key => $tipo) {
                    ?>
                        <option value="<?= $tipo['id']; ?>"><?= $tipo['nombre']; ?></option>
                    <?php
                        }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="color">Color</label>
                <select name="color" id="color" class="form-control">
                <?php
                        foreach ($colores as $key => $color) {
                    ?>
                        <option value="<?= $color['id']; ?>"><?= $color['nombre']; ?></option>
                    <?php
                        }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="precio_venta">Precio de Venta </label>
                <input type="text" value="<?= old('venta')?>" name="venta" id="venta" class="form-control">
            </div>
            <div class="form-group">
                <label for="precio_compra">Precio de Compra </label>
                <input type="text" value="<?= old('compra')?>" name="compra" id="compra" class="form-control">
            </div>
            <div class="form-group">
                <label for="cantida">Cantidad</label>
                <input type="text" value="<?= old('cantidad')?>" name="cantidad" id="cantidad" class="form-control">
            </div>
            <button type="submit" class="btn btn-success btn-sm">Guardar</button>
            <a href="<?= base_url('/vehiculos') ?>" class="btn btn-info btn-sm">Cancelar</a>
        </form>
    </div>
</div>

<?= $footer; ?>   