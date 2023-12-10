<?php
if (isset($validation)) {
    print $validation->listErrors();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesión - Aplicación de Salud</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
    body {
        background-color: #f4f8f9;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .container {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100vh;
    }

    #login-container {
        background-color: #ffffff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h1 {
        color: #af2d2d;
        font-size: 2em;
        margin-bottom: 20px;
    }

    .form-group label {
        color: #000;
        text-align: left;
        /* Alinea las etiquetas a la izquierda */
        display: block;
        /* Hace que cada etiqueta se muestre en una nueva línea */
        margin-bottom: 5px;
        /* Espaciado inferior para separar las etiquetas y los campos */
    }

    .btn-login {
        background-color: #af2d2d;
        color: #fff;
        transition: background-color 0.3s ease;
    }

    .btn-login:hover {
        background-color: #ff3340;
    }
    </style>
</head>

<body>

    <div class="container">
        <div class="col-md-4">
            <div id="login-container" class="text-center">
                <form action="<?php base_url('/administrador'); ?>" method="POST">

                    <h1>INICIO DE SESIÓN</h1>

                    <?= csrf_field() ?>
                    <div class="form-group">
                        <label for="email">Correo electrónico</label>
                        <input type="text" class="form-control" name="email" id="email" required
                            pattern="[a-z0-9]{@-_.}+" max_length="100">
                    </div>
                    <div class="form-group">
                        <label for="contraseña">Contraseña</label>
                        <input type="password" class="form-control" id="contraseña" name="contraseña" required
                            max_length="150" min_length="1">
                    </div>

                    <div class="form-group">
                        <label for="tipo">Usuario</label>
                        <select name="tipo" id="tipo" class="form-control" required>
                            <option value="doctor">Doctor</option>
                            <option value="paciente">Paciente</option>
                            <option value="administrador">Administrador</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-login col-md-12">Iniciar Sesión</button>
                </form>
            </div>
        </div>
    </div>

</body>

</html>