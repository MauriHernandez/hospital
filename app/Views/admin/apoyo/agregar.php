<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Apoyo</title>

    <!-- Estilos en línea para la página -->
    <style>
        body {
            background-color: #f4f8f9;
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .container {
            margin-top: 50px;
        }

        .form-container {
            background-color: #fff;
            padding: 30px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        .form-container h2 {
            color: #007bff;
            text-align: center;
        }

        .form-label {
            font-weight: bold;
            color: #555;
        }

        .form-control {
            margin-bottom: 15px;
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
        }

        .btn-success {
            background-color: #007bff;
            border-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            display: inline-block;
            margin-right: 10px;
            border-radius: 5px;
            cursor: pointer;
            text-align: center;
        }

        .btn-success:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .alert-danger {
            background-color: #dc3545;
            color: #fff;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 15px;
        }

    </style>
</head>

<body>

    <!-- Contenedor principal -->
    <div class="container">
        <h2 align="center">Agregar Apoyo</h2>
        <!-- Fila con centrado de contenido -->
        <div class="row justify-content-center">
            <!-- Columna de ancho 8 para el formulario -->
            <div class="col-8 form-container">
                
                <!-- Verificación de errores de validación -->
                <?php if (isset($validation)): ?>
                    <div class="alert alert-danger">
                        <?= $validation->listErrors() ?>
                    </div>
                <?php endif; ?>

                <!-- Formulario de envío con método POST -->
                <form action="<?= base_url('index.php/admin/apoyo/agregar/insert') ?>" method="POST">
                    <?= csrf_field() ?>

                    <!-- Campos del formulario según la base de datos -->
                    <div class="mab-3">
                        <label for="nombre" class="form-label">Nombre<span class="text-danger">*</label>
                        <input type="text" class="form-control" name="nombre" id="nombre" required>
                    </div>
                 
                    <div class="mab-3">
                        <label for="fechaLimite" class="form-label">Fecha Límite<span class="text-danger">*</label>
                        <input type="date" class="form-control" name="fechaLimite" id="fechaLimite" required>
                    </div>
                 
                    <div class="mab-3">
                        <label for="descripcion" class="form-label">Descripción<span class="text-danger">*</label>
                        <input type="text" class="form-control" name="descripcion" id="descripcion" required>
                    </div>
                    
                    <!-- Botón de enviar el formulario -->
                    <div class="mb-3">
                        <input type="submit" class="btn btn-success" value="Agregar">
                    </div>
                </form>
            </div>
            <!-- Columna de ancho 2 para el espacio en el lateral derecho -->
            <div class="col-2"></div>
        </div>
    </div>

</body>

</html>
