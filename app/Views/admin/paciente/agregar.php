
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
    /* Estilos para el contenedor de los botones en la misma línea y centrados */


    /* Estilos para el contenedor de los botones en la misma línea y centrados */
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
            <?php if (isset($validation)) : ?>

            <?= $validation->listErrors() ?>
        </div>
        <?php endif ?>
    </div>
    </div>
    <h1 align="center">Agregar Paciente</h1>
    <div class="row justify-content-center">

        <div class="col-md-6">
            <form action="<?= base_url('/admin/paciente/agregarUsuario'); ?>" method="POST">
                <?= csrf_field() ?>
                
                <div class="form-container">
                    <h6>Información personal</h6>

                    <input type="hidden" name="" value="">

                    <div class="mab-3">
                        <label for="nombre" class="form-label">Nombre <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Formato: Juan"
                            required pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" max_length="15">
                    </div>


                    <div class="mab-3">
                        <label for="apellidoP" class="form-label">Apellido paterno <span class="text-danger">*</label>
                        <input type="text" class="form-control" name="apellidoP" id="apellidoP"
                            placeholder="Formato: Pérez" required pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" max_length="15">
                    </div>

                    <div class="mab-3">
                        <label for="apellidoM" class="form-label">Apellido materno <span class="text-danger">*</label>
                        <input type="text" class="form-control" name="apellidoM" id="apellidoM"
                            placeholder="Ejemplo:Pérez" required pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" max_length="15">
                    </div>

                    <div class="mab-3">
                        <label for="genero" class="form-label">Sexo <span class="text-danger">*</label>
                        <select name="genero" id="genero" class="form-control" required>
                            <option value="Masculino">Masculino</option>
                            <option value="Femenino">Femenino</option>
                        </select>
                    </div>

                    <div class="mab-3">
                        <label for="celular" class="form-label">Número celular <span class="text-danger">*</label>
                        <input type="text" class="form-control" name="celular" id="celular"
                            placeholder="Formato: 2311234567" pattern="[0-9]{-}" max_lengh="12" required>

                    </div>


                    <div class="mab-3">
                        <label for="sangre" class="form-label">Tipo de sangre <span class="text-danger"></label>
                        <select name="sangre" id="sangre" class="form-control" required>
                            <option value="O+">O+</option>
                            <option value="O-">O-</option>
                            <option value="A+">A+</option>
                            <option value="A-">A-</option>
                            <option value="AB+">AB+</option>
                            <option value="AB-">AB-</option>
                        </select>
                    </div>

                    <div class="mab-3">
                        <label for="numeroAsociacion" class="form-label">Número de Asociación <span
                                class="text-danger">*</label>
                        <input type="text" class="form-control" name="numeroAsociacion" id="numeroAsociacion"
                            placeholder="Formato:XX-XXXXXXX" pattern="[0-9]{-}" max_lengh="10" required>

                    </div>
                    <div class="mab-3">
                        <label for="numeroTarjeta" class="form-label">Número de Tarjeta <span
                                class="text-danger">*</label>
                        <input type="text" class="form-control" name="numeroTarjeta" id="numeroTarjeta"
                            placeholder="Formato:XXX-XXX-XX" pattern="[0-9]{-}" max_lengh="10" required>
                            </div>
                </div>
            
        </div>

                <div class="col-md-6">
                    <div class="form-container">
                        <h6>Domicilio</h6>
                        <div class="mab-3">
                            <label for="estado" class="form-label">Estado <span class="text-danger">*</label>
                            <select name="estado" id="estado" class="form-control" required>
                                <option value="Aguascalientes" selected>Aguascalientes</option>
                                <option value="Baja California">Baja California</option>
                                <option value="Baja California Sur">Baja California Sur</option>
                                <option value="Campeche">Campeche</option>
                                <option value="Ciudad de México">Ciudad de México</option>
                                <option value="Coahuila">Coahuila</option>
                                <option value="Colima">Colima</option>
                                <option value="Chiapas">Chiapas</option>
                                <option value="Chihuahua">Chihuahua</option>
                                <option value="Durango">Durango</option>
                                <option value="Guanajuato">Guanajuato</option>
                                <option value="Hidalgo">Hidalgo</option>
                                <option value="Jalisco">Jalisco</option>
                                <option value="Estado de México">Estado de México</option>
                                <option value="Michoacán">Michoacán</option>
                                <option value="Morelos">Morelos</option>
                                <option value="Nayarit">Nayarit</option>
                                <option value="Nuevo León">Nuevo León</option>
                                <option value="Oaxaca">Oaxaca</option>
                                <option value="Puebla">Puebla</option>
                                <option value="Quéretaro">Quéretaro</option>
                                <option value="Quintana Roo">Quintana Roo</option>
                                <option value="San Luis Potosí">San Luis Potosí</option>
                                <option value="Sinaloa">Sinaloa</option>
                                <option value="Sonora">Chihuahua</option>
                                <option value="Tabasco">Durango</option>
                                <option value="Tamaulipas">Guanajuato</option>
                                <option value="Tlaxcala">Hidalgo</option>
                                <option value="Jalisco">Jalisco</option>
                                <option value="Veracruz">Estado de México</option>
                                <option value="Yucatán">Michoacán</option>
                                <option value="Zacatecas">Morelos</option>
                            </select>
                        </div>


                        <div class="mab-3">
                            <label for="municipio" class="form-label">Municipio <span class="text-danger">*</label>
                            <input type="text" class="form-control" name="municipio" id="municipio"
                                placeholder="Formato: Teziutlán" required pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+"
                                max_length="50" min_length="2">
                        </div>

                        <div class="mab-3">
                            <label for="colonia" class="form-label">Colonia <span class="text-danger">*</label>
                            <input type="text" class="form-control" name="colonia" id="colonia"
                                placeholder="Formato: Xoloco" required pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" max_length="50"
                                min_length="2">
                        </div>

                        <div class="mab-3">
                            <label for="calle" class="form-label">Calle <span class="text-danger">*</label>
                            <input type="text" class="form-control" name="calle" id="calle"
                                placeholder="Formato: Longinos Méndez" required pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+"
                                max_length="50" min_length="2">
                        </div>

                        <div class="mab-3">
                            <label for="numeroExterior" class="form-label">Número exterior <span
                                    class="text-danger">*</label>
                            <input type="number" class="form-control" name="numeroExterior" id="numeroExterior" required
                                pattern="[0-9]+" max_length="11" min_length="1">
                        </div>

                        <div class="mab-3">
                            <label for="numeroInterior" class="form-label">Número interior <span
                                    class="text-danger">*</label>
                            <input type="text" class="form-control" name="numeroInterior" id="numeroInterior"
                                pattern="[0-9]+" max_length="11">
                        </div>

                        <div class="mab-3">
                            <label for="codigoPostal" class="form-label">Código Postal <span class="text-danger">*</<
                                        /label>
                                    <input type="text" class="form-control" name="codigoPostal" id="codigoPostal"
                                        placeholder="Formato: 73950" required pattern="[0-9]+" max_length="5">
                        </div>

                        </div>
        </div>
    </div>

    <br>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-success">
                            <i class="fas fa-arrow-right"></i> Siguiente
                        </button>

                        <button type="button" class="btn btn-danger"
                            onclick="window.location.href='/admin/paciente/mostrar/'">
                            <i class="fas fa-times"></i> Cancelar
                        </button>
                    </div>
            </form>
</body>

</html>