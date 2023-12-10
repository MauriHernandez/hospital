<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Apoyo</title>
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
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
        }

        .btn-success {
            background-color: #007bff;
            border-color: #007bff;
            color: #fff;
            display: block;
            margin: auto;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn-success:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="container">
    <h2 align="center">Editar Apoyo</h2>
        <div class="row justify-content-center">
            <div class="col-8 form-container">
                <?php if (isset($validation)): ?>
                    <div class="alert alert-danger">
                        <?= $validation->listErrors() ?>
                    </div>
                <?php endif; ?>
                <form action="<?= base_url('index.php/admin/apoyo/editar/update'); ?>" method="POST">
                    <?= csrf_field() ?>
                    

                    <input type="hidden" name="id" value="<?= $apoyo->id ?>">
                    
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre<span class="text-danger">*</label>
                        <input type="text" class="form-control" name="nombre" id="nombre" value="<?= $apoyo->nombre ?>">
                    </div>

                    <div class="mb-3">
                        <label for="fechaLimite" class="form-label">Fecha Límite<span class="text-danger">*</label>
                        <input type="date" class="form-control" name="fechaLimite" id="fechaLimite" value="<?= $apoyo->fechaLimite ?>">
                    </div>

                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripción<span class="text-danger">*</label>
                        <input type="text" class="form-control" name="descripcion" id="descripcion" value="<?= $apoyo->descripcion ?>">
                    </div>

                    <div class="mb-3">
                        <input type="submit" class="btn btn-success">
                    </div>
                </form>
            </div>
            <div class="col-2"></div>
        </div>
    </div>
</body>

</html>
