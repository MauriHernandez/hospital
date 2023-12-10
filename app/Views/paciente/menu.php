<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>Menú</title>
    <style>
        /* Tus estilos personalizados aquí */
        .sidebar {
            width: 200px; /* Ajusta el ancho del menú */
            height: 100%;
            position: fixed;
            z-index: 1;
            top: 0;
            left: 0;
            background-color: #AF2D2D;
            overflow-x: hidden;
            padding-top: 20px;
        }
        .sidebar a {
            padding: 6px 8px 6px 16px;
            text-decoration: none;
            font-size: 15px; /* Ajusta el tamaño de la fuente */
            color: #fff;
            display: block;
        }
        .sidebar a:not(.doctor):hover {
            color: #fff;
        }
        .sidebar .doctor {
            color: #fff;
        }
        .sidebar i {
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <a href="<?=base_url('index.php/paciente/inicio')?>"><i class="fas fa-home"></i> Inicio</a>
        <a href="<?=base_url('index.php/paciente/receta')?>" style="margin-left:20px;"><i class="fas fa-plus"></i> Recetas </a>
        <a href="<?=base_url('index.php/paciente/citas')?>" style="margin-left:20px;"><i class="fas fa-tasks"></i> Consultas</a>
        <a href="<?=base_url('index.php/cerrarSesion')?>"><i class="fas fa-sign-out-alt"></i> Cerrar Sesión</a>
    </div> 
    <div class="content">
        <!-- El contenido de tu página va aquí -->
    </div>
</body>
</html>
