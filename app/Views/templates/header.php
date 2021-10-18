<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marcas Title</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

</head>
<body>
    
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Menu</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="<?=base_url('/marcas') ?>">Marcas <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?=base_url('/modelos') ?>">Modelos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?=base_url('/tipos') ?>">Tipos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?=base_url('/colores') ?>">Colores</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?=base_url('/vehiculos') ?>">Vehículos</a>
                </li>
            </ul>
        </div>
    </nav>
    
    <br>
    <div class="container">