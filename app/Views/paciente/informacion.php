

            <table class="table">
                <thead class="thead-dark">
                    <th style="text-align: center">ID</th>
                    <th style="text-align: center">Nombre del paciente</th>
                    <th style="text-align: center">Tipo de Sangre</th>
                    <th style="text-align: center">Número de Asociacion</th>
                    <th style="text-align: center">Número de Tarjeta</th>
                    <th style="text-align: center">Correo electrónico</th>
                    

                </thead>

                <tbody>
              
                            <tr>
                               <!-- Cambia esto en tu vista -->
<?php foreach ($infoPaciente as $infoPaciente): ?>
    <tr>
        <?php if ($infoPaciente->id == $usuarioPaciente->id): ?>
            <td>
                <?= $infoPaciente->id ?>
            </td>
            <td>
                <?= $infoPaciente->primerNombre . ' ' . $infoPaciente->apellidoP . ' ' . $infoPaciente->apellidoM ?>
            </td>
            <td>
                <?= $infoPaciente->celular ?>
            </td>
            <td>
                <?= $usuarioPaciente->email ?>
            </td>
            <td>
                <?= $usuarioPaciente->contraseña ?>
            </td>
        <?php endif; ?>
    </tr>
<?php endforeach; ?>
