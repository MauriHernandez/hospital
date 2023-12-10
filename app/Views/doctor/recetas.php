<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Agregar Receta</title>
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

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            color: #fff;
            display: block;
            margin: auto;
        }

        .btn-primary:hover {
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

                <form action="<?= base_url('index.php/doctor/recetas'); ?>" method="POST">
                    <?= csrf_field() ?>
                    <h2>Receta</h2>

                    <div class="mb-3">
                        <label for="paciente" class="form-label">Paciente</label>
                        <select name="paciente" class="form-control">
                            <?php foreach ($pacients as $pacient): ?>
                                <option value="<?= $pacient->id ?>">
                                    <?= $pacient->nombre ?> <?= $pacient->apellidoP ?> <?= $pacient->apellidoM ?>
                                </option>
                            <?php endforeach ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripción</label>
                        <input type="text" class="form-control" name="descripcion" id="descripcion">
                    </div>

                    <div class="mb-3">
                        <label for="altura" class="form-label">Altura</label>
                        <input type="number" class="form-control" name="altura" id="altura">
                    </div>

                    <div class="mb-3">
                        <label for="peso" class="form-label">Peso</label>
                        <input type="number" class="form-control" name="peso" id="peso">
                    </div>

                    <div class="mb-3">
                        <label for="temperatura" class="form-label">Temperatura</label>
                        <input type="number" class="form-control" name="temperatura" id="temperatura">
                    </div>

                    <div class="mb-3">
                        <label for="alergias" class="form-label">Alergias</label>
                        <input type="text" class="form-control" name="alergias" id="alergias">
                    </div>

                    <div class="mb-3">
                        <label for="fecha" class="form-label">Fecha:</label>
                        <input type="date" class="form-control" name="fecha" id="fecha">
                    </div>

                    <button type="submit" class="btn btn-primary" name="submit_pdf">Guardar</button>
                </form>
            </div>
        </div>
    </div>

</body>

</html>
