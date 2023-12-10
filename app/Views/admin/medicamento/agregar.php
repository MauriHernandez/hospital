
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- Agrega Font Awesome para iconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
        integrity="sha384-eLAPt5p2cqF5LTHKR2AxR9g3PO6cXdK6fj6c6rUJCC8CqGKOmKl3otcvlB6aXvpp" crossorigin="anonymous">

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

        .card {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        .card-body {
            padding: 30px;
        }

        .card-title {
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
            background-color: #28a745;
            border-color: #28a745;
            color: #fff;
        }

        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
            color: #fff;
        }
        .mb-3 {
        text-align: center;
    }

    /* Estilos para los botones en la misma línea */
    .mb-3 button {
        display: inline-block;
        margin-right: 10px;
        /* Ajusta el margen entre los botones según sea necesario */
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
           <h1 align="center">Agregar Medicamentos</h1>

            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        
                        <form action="<?= base_url('/admin/medicamento/agregar/insert'); ?>" method="POST">
                            <?= csrf_field() ?>

                            <div class="mab-3">
                                <label for="nombre" class="form-label">Nombre<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="nombre" id="nombre"
                                    placeholder="Ejemplo: Iburprofeno Compuesto" required pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+"
                                    max_length="50">
                            </div>

                            <div class="mab-3">
                        <label for="ingredientes" class="form-label">Ingredientes<span class="text-danger">*</label>
                        <input type="text" class="form-control" name="ingredientes" id="ingredientes"
                            placeholder="Formato: Iburprofeno con Paracetamol" required pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+"
                            max_length="80">
                    </div>
                    <div class="mab-3">
                        <label for="fechaCaducidad" class="form-label">Fecha Caducidad <span class="text-danger">*</label>
                        <input type="date" class="form-control" name="fechaCaducidad" id="fechaCaducidad"
                             required>
                    </div>
                    <div class="mab-3">
                                <label for="lote" class="form-label">Lote<span class="text-danger">*</span></label>
                                <input type="number" class="form-control" name="lote" id="lote"
                                    placeholder="Ejemplo: 123456" required pattern="[A-Z0-9\s]+" max_length="10">
                            </div>


                    <div class="mab-3">
                        <label for="tipo" class="form-label">Tipo<span class="text-danger">*</label>
                        <select name="tipo" id="formaFarmaceutica" class="form-control" required>
                            <option value="Tableta" selected>Tableta</option>
                            <option value="Cápsula">Cápsula</option>
                            <option value="Jarabe">Jarabe</option>
                            <option value="Suspensión">Suspensión</option>
                        </select>
                    </div>

                    <div class="mab-3">
                        <label for="dosis" class="form-label">Dosis<span class="text-danger">*</label>
                        <select name="dosis" id="dosis" class="form-control" required>
                            <option value="5" selected>5 mg</option>
                            <option value="10">10 mg</option>
                            <option value="15">15 mg</option>
                            <option value="25">25 mg</option>
                            <option value="50">50 mg</option>
                            <option value="100">100 mg</option>
                            <option value="250">250 mg</option>
                            <option value="300">500 mg</option>
                        </select>
                    </div>

                            <div class="mb-3">
                                <button type="submit" class="btn btn-success">
                                    <i class="fas fa-plus"></i> Agregar
                                </button>
                           

                            <button type="button" class="btn btn-danger"
                                onclick="window.location.href='/administrador/medicamentos/administrarMedicamentos/'">
                                <i class="fas fa-times"></i> Cancelar
                            </button>

                        </div>
                    </div>
                </div>
            </div> </form>
        </div>
    </div>
</body>

</html>

