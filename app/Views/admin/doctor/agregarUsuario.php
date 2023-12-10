<div class="container-fluid">
    <div class="row">
        <!-- Menú lateral -->
        <div class="col-md-3">
            <!-- Aquí va tu código del menú lateral -->
            <!-- ... -->
        </div>

        <div class="col-md-9">
            <div class="container mt-5">
                <div class="row justify-content-center">
                    <?php if (isset($validation)) : ?>
                        
                            <?= $validation->listErrors() ?>
                        </div>
                    <?php endif ?>
                </div>

                <div class="col-md-8">
                    <div id="login-container" class="row justify-content-center">
                        <form action="<?= base_url('/admin/doctor/agregar/insert'); ?>" method="POST">
                            <?= csrf_field() ?>
                            <h1 class="text-center mb-4">Agregar Médico</h1>

                            <input type="hidden" name="nombre" value=<?= $nombre ?>>
                    <input type="hidden" name="apellidoP" value=<?= $apellidoP ?>>
                    <input type="hidden" name="apellidoM" value=<?= $apellidoM ?>>
                    <input type="hidden" name="genero" value=<?= $genero ?>>
                    <input type="hidden" name="celular" value=<?= $celular ?>>
                    <input type="hidden" name="turno" value=<?= $turno ?>>
                    <input type="hidden" name="especialidad" value=<?= $especialidad ?>>
                    <input type="hidden" name="departamento" value=<?= $departamento?>>
                    <input type="hidden" name="estado" value=<?= $estado?>>
                    <input type="hidden" name="municipio" value=<?= $municipio?>>
                    <input type="hidden" name="colonia" value=<?= $colonia?>>
                    <input type="hidden" name="calle" value=<?= $calle?>>
                    <input type="hidden" name="numeroExterior" value=<?= $numeroExterior?>>
                    <input type="hidden" name="numeroInterior" value=<?= $numeroInterior?>>
                    <input type="hidden" name="codigoPostal" value=<?= $codigoPostal?>>

                            <div class="mb-3">
                                <label for="email" class="form-label">Correo electrónico <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="email" id="email" placeholder="Formato: correo@ejemplo.com" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" max_length="100">
                            </div>

                            <div class="mb-3">
                                <label for="contraseña" class="form-label">Contraseña <span class="text-danger">*</span></label>
                                <input type="password" class="form-control" name="contraseña" id="contraseña" placeholder="Formato: password2" required max_length="150" min_length="1">
                            </div>

                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-success">
                                    <i class="fas fa-plus"></i> Agregar
                                </button>
                            </div>

                            <div class="d-flex justify-content-between mt-3">
                                <button type="button" class="btn btn-primary" onclick="window.history.back()">
                                    <i class="fas fa-arrow-left"></i> Regresar
                                </button>
                                <button type="button" class="btn btn-danger" onclick="window.location.href='/admin/doctor/mostrar/'">
                                    <i class="fas fa-times"></i> Cancelar
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
