






<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Información</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
        integrity="sha384-eLAPt5p2cqF5LTHKR2AxR9g3PO6cXdK6fj6c6rUJCC8CqGKOmKl3otcvlB6aXvpp" crossorigin="anonymous">
        <style>
    /* Estilos generales del cuerpo de la página */
    body {
        background-color: #f4f8f9;
        margin: 0;
        padding: 0;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    /* Estilos del contenedor principal */
    .container {
        margin-top: 50px;
    }

    /* Estilos para la alerta de errores */
    .alert {
        margin-bottom: 20px;
    }

    /* Estilos del formulario dentro del contenedor */
    .form-container {
        background-color: #fff;
        padding: 30px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
    }

    /* Estilos para el encabezado del formulario */
    .form-container h1,
    .form-container h6 {
        color: #333;
        text-align: center;
    }

    /* Estilos para etiquetas de formulario */
    .form-label {
        font-weight: bold;
        color: #555;
    }

    /* Estilos para los campos de formulario */
    .form-control {
        margin-bottom: 15px;
    }

    /* Estilos para el botón de enviar el formulario */
    .btn-success {
        background-color: #007bff;
        border-color: #007bff;
        color: #fff;
        display: block;
        margin: auto;
    }

    /* Estilos cuando el mouse está sobre el botón */
    .btn-success:hover {
        background-color: #0056b3;
        border-color: #0056b3;
    }

    .btn-danger {
        background-color: #dc3545;
        border-color: #dc3545;
        color: #fff;
    }

    /* Estilos cuando el mouse está sobre el botón Cancelar */
    .btn-danger:hover {
        background-color: #bd2130;
        border-color: #bd2130;
    }

    /* Estilo para los iconos en los botones */
    .btn i {
        margin-right: 5px;
    }

    /* Estilos para los botones en la misma línea */
    .mb-3 {
        text-align: center;
    }

    /* Estilos para los botones en la misma línea */
    .mb-3 button {
        display: inline-block;
        margin-right: 10px;
    }

    /* Estilos para la separación entre columnas */
    .column-divider {
        border-right: 1px solid #ccc;
    }

    /* Ajuste para el botón Cancelar */
    .mb-3 .btn-danger {
        margin-left: 0;
        /* Alinea el botón Cancelar correctamente */
    }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <?php
            if (isset($validation)) {
                print $validation->listErrors();
            }
            ?>
            <div class="col-md-8">
                <h1 align="center"xml_error_string>Editar Medicamento
                </h1>
                <div id="login-container" class="row justify-content-center">
                    <div class="col-md-6">

                        <form action="<?= base_url('/admin/medicamento/editar/update'); ?>" method="POST">
                            <?= csrf_field() ?>
                            <!-- Columna izquierda - Información personal -->
                            <div class="form-container">

<input type="hidden" name="id" value="<?= $medicamento->id ?>">


<div class="mab-3">
    <label for="nombre" class="form-label">Nombre <span class="text-danger">*</label>
    <input type="text" class="form-control" name="nombre" id="nombre"
        value="<?= $medicamento->nombre ?>"  required
        pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" max_length="50" >
</div>

<div class="mab-3">
    <label for="ingredientes" class="form-label" >Ingredientes<span class="text-danger">*</label>
    <input type="text" class="form-control" name="ingredientes" id="ingredientes"
       required pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+"
        max_length="80" value="<?= $medicamento->ingredientes ?>"
       >
</div>

<div class="mab-3">
    <label for="tipo"class="form-label" >Tipo <span class="text-danger">*</label>
    <select name="tipo" id="tipo" class="form-control" required
    >
        <option value="<?= $medicamento->tipo ?>" selected>
            <?= $medicamento->tipo ?>
        </option>
        <option value="Tableta">Tableta</option>
        <option value="Cápsula">Cápsula</option>
        <option value="Solución">Solución</option>
        <option value="Jarabe">Jarabe</option>
        <option value="Suspensión">Suspensión</option>
    </select>
</div>

<div class="mab-3">
    <label for="dosis"class="form-label" >Dosis<span class="text-danger">*</label>
    <select name="dosis" id="dosis" class="form-control" required >
        <option value="<?= $medicamento->dosis ?>" selected>
            <?= $medicamento->dosis ?> mg
        </option>
        <option value="5">5 mg</option>
        <option value="10">10mg</option>
        <option value="15">15 mg</option>
        <option value="25">25 mg</option>
        <option value="50">50 mg</option>
        <option value="100">100 mg</option>
        <option value="250">250 mg</option>
        <option value="300">300 mg</option>
    </select>
</div>

<div class="mab-3">
    <label for="fechaCaducidad" class="form-label">Fecha de caducidad<span class="text-danger">*</label>
    <input type="date" class="form-control" name="fechaCaducidad" id="fechaCaducidad" required
        value="<?= $medicamento->fechaCaducidad ?>" >
</div>

<div class="mab-3">
    <label for="lote" class="form-label" >Lote <span class="text-danger">*</label>
    <input type="text" class="form-control" name="lote" id="lote"
        placeholder="Formato:123456" required pattern="[A-Z0-9\s]+" max_length="10"
        value="<?= $medicamento->lote ?>">
</div>

<br>


<div class="mb-3">
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-arrow-right"></i> Actualizar
                    </button>
                </div>
            </form>

            <div class="mb-3">
                <button type="button" class="btn btn-danger" onclick="window.location.href='/admin/medicamento/mostrar/'">
                    <i class="fas fa-times"></i> Cancelar
                </button>


                
                </div>

    </div>
</div>
</form>
</body>

</html>





