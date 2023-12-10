<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Menú</title>
    <style>
        body {
            background-color: #f8f9fa;
        }
        .navbar {
            background-color: #fff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .navbar-brand {
            font-weight: bold;
            color: #007bff;
        }
        .navbar-nav .nav-link {
            color: #495057;
            margin-right: 15px;
        }
        .navbar-nav .nav-item.active {
            background-color: #007bff;
        }
        .dropdown-menu {
            border: none;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        .dropdown-menu a {
            color: #495057;
        }
        .dropdown-menu a:hover {
            background-color: #007bff;
            color: #fff;
        }
        .form-control {
            background-color: #e9ecef;
        }
        .btn-outline-success {
            border-color: #28a745;
            color: #28a745;
        }
        .btn-outline-success:hover {
            background-color: #28a745;
            color: #fff;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?=base_url('index.php/admin/inicio')?>">Inicio</a>

        <div class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?=base_url('index.php/doctor/recetas')?>">
                Crear Receta Médica
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?=base_url('index.php/doctor/mostrarR')?>">
               Visualizar Recetas
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?=base_url('index.php/doctor/apoyo')?>">
                Crear Receta de Apoyos
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?=base_url('index.php/doctor/mostrarA')?>">
                Visualizar Apoyos
                    </a>
                </li>   
           
                <li class="nav-item">
                    <a class="nav-link" href="<?= site_url('doctor/cerrar_sesion') ?>">
                Cerrar Sesión
                    </a>
                </li>   
                       
        </div>

        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link"><?= session()->get('nombreUsuario') ?></a>
            </li>
        </ul>
    </div>
</nav>

<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
