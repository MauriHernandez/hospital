






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
                <h1 align="center"xml_error_string>Editar Doctor</h1>
                <div id="login-container" class="row justify-content-center">
                    <div class="col-md-6">

                        <form action="<?= base_url('/admin/doctor/editar/update'); ?>" method="POST">
                            <?= csrf_field() ?>
                            <!-- Columna izquierda - Información personal -->
                            <div class="form-container">
                                <h6>Información personal</h6>

                                <input type="hidden" name="id" value="<?= $info->id ?>">

                                <div class="mb-3">
                                    <label for="nombre" class="form-label">Nombre <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="nombre" id="nombre"
                                        placeholder="Formato:Juan" required pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+"
                                        max_length="15" value="<?= $info->nombre ?>">
                                </div>

                                <div class="mb-3">
                                    <label for="apellidoP" class="form-label">Apellido paterno <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="apellidoP" id="apellidoP"
                                        placeholder="Formato:Pérez" required pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+"
                                        max_length="15" value="<?= $info->apellidoP ?>">
                                </div>

                                <div class="mb-3">
                                    <label for="apellidoM" class="form-label">Apellido materno <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="apellidoM" id="apellidoM"
                                        placeholder="Ejemplo:Pérez" required pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+"
                                        max_length="15" value="<?= $info->apellidoM ?>">
                                </div>

                                <div class="mb-3">
                                    <label for="genero" class="form-label">Sexo <span class="text-danger">*</span></label>
                                    <select name="genero" id="genero" class="form-control" required
                                        value="<?= $info->genero ?>">
                                        <option value="Masculino">Masculino</option>
                                        <option value="Femenino">Femenino</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="celular" class="form-label">Número celular <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="celular" id="celular"
                                        placeholder="Formato:XXX-XXX-XXXX" pattern="[0-9]{-}" max_length="12" required
                                        value="<?= $info->celular ?>">
                                </div>

                                <div class="mb-3">
                                    <label for="especialidad" class="form-label">Especialidad <span
                                            class="text-danger">*</span></label>
                                    <select name="especialidad" id="especialidad" class="form-control" required>
                                        <option value="<?= $doctor->especialidad ?>" selected>
                                            <?= $doctor->especialidad ?>
                                        </option>
                                        <option value="General">Médico general</option>
                                        <option value="Ginecología">Ginecología</option>
                                        <option value="Rehabilitación">Rehabilitación</option>
                                        <option value="Oftalmología">Oftalmología</option>
                                        <option value="Psiquiatría">Psiquiatría</option>
                                        <option value="Nutrición">Nutrición</option>
                                        <option value="Dentista">Dentista</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="turno" class="form-label">Turno <span class="text-danger">*</span></label>
                                    <select name="turno" id="turno" class="form-control" required>
                                        <option value="<?= $doctor->turno ?>"><?= $doctor->turno ?></option>
                                        <option value="Matutino">Matutino</option>
                                        <option value="Vespertino">Vespertino</option>
                                        <option value="Nocturno">Nocturno</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="departamento" class="form-label">Departamento <span
                                            class="text-danger">*</span></label>
                                    <select name="departamento" id="departamento" class="form-control" required>
                                        <option value="<?= $doctor->departamento ?>"><?= $doctor->departamento ?>
                                        </option>
                                        <option value="General">General</option>
                                        <option value="Pediatría">Pediatría</option>
                                    </select>
                                </div>
                            </div>

                     
                    </div>
                    <div class="col-md-6">

                        <!-- Columna derecha - Domicilio -->
                        <div class="form-container">
                            <h6>Domicilio</h6>
                            <input type="hidden" name="direccionID" value="<?= $direccion[0]->id ?>">

                            <div class="mab-3">
                                <label for="estado" class="form-label">Estado <span class="text-danger">*</span></label>
                                <select name="estado" id="estado" class="form-control" required>
                                    <option value="<?= $direccion[0]->estado ?>"><?= $direccion[0]->estado ?></option>
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
                                    <option value="Zacatecas">Zacatecas</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="municipio" class="form-label">Municipio <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="municipio" id="municipio"
                                    placeholder="Formato:Teziutlán" required pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+"
                                    max_length="50" min_length="2" value="<?= $direccion[0]->municipio ?>">
                            </div>

                            <div class="mb-3">
                                <label for="colonia" class="form-label">Colonia <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="colonia" id="colonia" required
                                    pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" max_length="50" min_length="2"
                                    value="<?= $direccion[0]->colonia ?>">
                            </div>

                            <div class="mb-3">
                                <label for="calle" class="form-label">Calle <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="calle" id="calle" required
                                    pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" max_length="50" min_length="2"
                                    value="<?= $direccion[0]->calle ?>">
                            </div>

                            <div class="mb-3">
                                <label for="numeroExterior" class="form-label">Número exterior <span
                                        class="text-danger">*</span></label>
                                <input type="number" class="form-control" name="numeroExterior" id="numeroExterior"
                                    required pattern="[0-9]+" max_length="11" min_length="1"
                                    value="<?= $direccion[0]->numeroExterior ?>">
                            </div>

                            <div class="mb-3">
                                <label for="numeroInterior" class="form-label">Número interior</label>
                                <input type="text" class="form-control" name="numeroInterior" id="numeroInterior"
                                    pattern="[0-9]+" max_length="11" value="<?= $direccion[0]->numeroInterior ?>">
                            </div>

                            <div class="mb-3">
                                <label for="codigoPostal" class="form-label">Código Postal <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="codigoPostal" id="codigoPostal"
                                    placeholder="Formato:73950" required pattern="[0-9]+" max_length="5"
                                    value="<?= $direccion[0]->codigoPostal ?>">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-arrow-right"></i> Actualizar
                    </button>
                </div>
            </form>

            <div class="mb-3">
                <button type="button" class="btn btn-danger" onclick="window.location.href='/admin/doctor/mostrar/'">
                    <i class="fas fa-times"></i> Cancelar
                </button>
            </div>
        </div>
    </div>
</div>
</form>
</body>

</html>
