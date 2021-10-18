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
        <h5>Edición marca de vehículo</h5>
    </div>
    <div class="card-body">
        <form action="<?= base_url('/marcas/update/'.$marca['id']); ?>" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="marca">Marca</label>
                <input type="text" value="<?= $marca['nombre']; ?>" name="marca" id="marca" class="form-control">
            </div>
            <button type="submit" class="btn btn-success btn-sm">Editar</button>
            <a href="<?= base_url('/marcas') ?>" class="btn btn-info btn-sm">Cancelar</a>
        </form>
    </div>
        </div>
<?= $footer; ?>   