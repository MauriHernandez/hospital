<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Agregar Paciente</title>
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
        color: #333;
        text-align: center;
    }

    .form-label {
        font-weight: bold;
        color: #555;
    }

    .form-control {
        margin-bottom: 15px;
    }

    .btn-success {
        background-color: #007bff;
        border-color: #007bff;
        color: #fff;
        display: block;
        margin: auto;
    }

    .btn-success:hover {
        background-color: #0056b3;
        border-color: #0056b3;
    }
    </style>
</head>

<body>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8 form-container">
                <?php if (isset($validation)): ?>
                <div class="alert alert-danger">
                    <?= $validation->listErrors() ?>
                </div>
                <?php endif; ?>

            <form action="<?= base_url('index.php/doctor/apoyo'); ?>" method="POST">
                <?= csrf_field() ?>
                <h2>Receta de Apoyo</h2>
                <div class="mb-3">
                    <label for="paciente" class="form-label">Nombre del Paciente</label>
                    <select name="paciente" class="form-control">
                        <?php foreach($pacients as $pacient):?>
                        <option value="<?=$pacient->id?>">
                            <?=$pacient->nombre?> <?=$pacient->apellidoP?> <?=$pacient->apellidoM?></option>
                        <?php endforeach?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="descripcion" class="form-label">Descripción</label>
                    <input type="text" class="form-control" name="descripcion" id="descripcion">
                </div>

                <div class="mb-3">
                    <label for="apoyo" class="form-label">Apoyo</label>
                    <select name="apoyo" class="form-control">
                        <?php foreach($apoyos as $apoyo):?>
                        <option value="<?=$apoyo->id?>">
                            <?=$apoyo->nombre?></option>
                        <?php endforeach?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="fecha" class="form-label">Fecha:</label>
                    <input type="date" class="form-control" name="fecha" id="fecha">
                </div>
 <!--BOTÓN PARA CERRAR SESIÓN-->
                <div class="mb-3">
                    <input type="hidden" name="submit_pdf" value="1">
                    <button type="submit" class="btn btn-primary" name="submit_pdf">
                        Guardar
                    </button>

            </form>
        </div>
    </div>
    </form>
</div>
<div class="col-2"></div>
</div>
</div>
                        </body>
                        </html>