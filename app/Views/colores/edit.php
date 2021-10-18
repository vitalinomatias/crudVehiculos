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
        <h5>Edición color de vehículo</h5>
    </div>
    <div class="card-body">
        <form action="<?= base_url('/colores/update/'.$color['id']); ?>" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="color">Color *</label>
                <input type="text" value="<?= $color['nombre']; ?>" name="color" id="color" class="form-control">
            </div>
            <button type="submit" class="btn btn-success btn-sm">Editar</button>
            <a href="<?= base_url('/colores') ?>" class="btn btn-info btn-sm">Cancelar</a>
        </form>
    </div>
        </div>
<?= $footer; ?>   