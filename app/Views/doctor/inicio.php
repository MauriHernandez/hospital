<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Información de Doctor</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<style>
    body {
        background-color: #f4f8f9;
        margin: 0;
        padding: 0;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .card {
        border: 3px solid #333;
        border-radius: 15px;
        margin-bottom: 20px;
    }

    .card img {
        border-radius: 15px 15px 0 0;
        max-height: 200px;
        object-fit: cover;
        width: 100%;
    }

    .card-body {
        padding: 20px;
    }

    .eti {
        font-weight: bold;
    }

    .strong {
        font-weight: bold;
        font-size: 1.5em;
        margin-bottom: 10px;
    }

    .container {
        margin-top: 20px;
    }
</style>

<body>
<?php
helper('session');
$session = session();

// Verifica la sesión y el rol antes de mostrar la información del doctor
if ($session->get('logged_in') !== TRUE || $session->get('perfil') !== '2') {
    return redirect()->to('usuarios/login')->with('error', 'Access denied. Please log in as a doctor.');
}



foreach ($doctors as $doctor):
    // Solo muestra la información del doctor que ha iniciado sesión
    if ($doctor->id == $session->get('id')) :
        // ... Tu código actual para mostrar la información del doctor
  ?>
        <div class="container">
            <div class="row">
                <h1 class="strong">Información Personal</h1>
                <div align="right">
                    <a href="<?= base_url('index.php/doctor/editarI/' . $doctor->id); ?>" class="btn btn-primary">Editar</a>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                   
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <span class="eti">Nombre:</span>
                                    <?= $doctor->nombre ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <span class="eti">Apellido Paterno:</span>
                                    <?= $doctor->apellidoP ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <span class="eti">Apellido Materno:</span>
                                    <?= $doctor->apellidoM ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <span class="eti">Fecha de Nacimiento:</span>
                                    <?= $doctor->fechaNacimiento ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <span class="eti">Género:</span>
                                    <?= $doctor->genero?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <span class="eti">CURP:</span>
                                    <?= $doctor->curp ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <span class="eti">Celular:</span>
                                    <?= $doctor->celular ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <span class="eti">Calle:</span>
                                    <?= $doctor->calle ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <span class="eti">No. Exterior:</span>
                                    <?= $doctor->numeroExterior ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <span class="eti">No. Interior:</span>
                                    <?= $doctor->numeroInterior ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <span class="eti">Código Postal:</span>
                                    <?= $doctor->codigoPostal ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <span class="eti">Localidad:</span>
                                    <?= $doctor->localidad ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <span class="eti">Municipio:</span>
                                    <?= $doctor->municipio ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <span class="eti">Estado:</span>
                                    <?= $doctor->estado ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <span class="eti">Carrera:</span>
                                    <?= $doctor->carrera ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <span class="eti">Especialidad:</span>
                                    <?= $doctor->especialidad ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <span class="eti">Cédula Profesional:</span>
                                    <?= $doctor->cedulaProfesional ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <span class="eti">Departamento:</span>
                                    <?= $doctor->departamento ?>
                                </div>
                            </div>
                        </div>



                    </div>
                    
                </div>
            </div>
        </div>
        <?php
    endif;
endforeach;
?>

    <!-- Agrega el enlace a Bootstrap JS y jQuery si es necesario -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>