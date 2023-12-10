


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            background-color: #f4f8f9;
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .container {
            margin-top: 50px;
            overflow-x: auto;
        }

        table {
            width: 100%;
            margin-bottom: 1rem;
            color: #212529;
            background-color: #fff;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #dee2e6;
        }

        th {
            background-color: #007bff;
            color: #fff;
        }

        .btn-editar,
        .btn-eliminar {
            display: inline-block;
            padding: 6px 12px;
            font-size: 14px;
            font-weight: 400;
            text-align: center;
            white-space: nowrap;
            vertical-align: middle;
            cursor: pointer;
            user-select: none;
            border: 1px solid transparent;
            border-radius: 4px;
            transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out,
                border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }

        .btn-editar {
            color: #fff;
            background-color: #28a745;
            border-color: #28a745;
        }

        .btn-eliminar {
            color: #fff;
            background-color: #dc3545;
            border-color: #dc3545;
        }

        .btn-editar:hover,
        .btn-eliminar:hover,
        .btn-editar:focus,
        .btn-eliminar:focus {
            color: #fff;
        }

        h2 {
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>Medicamentos existentes</h2>
                <table >
                <thead >

                        <th>Nombre</th>
                        <th>Compuestos</th>
                        <th>Tipo</th>
                        <th>Dosis</th>
                        <th>Fecha de Caducidad</th>
                        <th>Lote</th>
                        <th></th>
                        <th></th>
                    </thead>
                    <tbody>

                    <?php foreach ($medicamentos as $medicamento): ?>
                        <tr>
                           
                            <td><?= $medicamento->nombre ?></td>
                            <td><?= $medicamento->ingredientes ?></td>
                            <td><?= $medicamento->tipo ?></td>
                            <td> <?= $medicamento->dosis ?> mg </td>
                            <td> <?= $medicamento->fechaCaducidad ?></td>
                            <td> <?= $medicamento->lote ?></td>
                        <td><a class="btn-editar" href="<?= base_url('/admin/medicamento/editar/' . $medicamento->id); ?>">Editar</a></td>
                        <td><a class="btn-eliminar" href="<?= base_url('/admin/medicamento/eliminar/' . $medicamento->id); ?>">Eliminar</a></td>
  </tr>
<?php
                
            endforeach;
       
?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>


