<?php
$marcaciones = MarcacionController::listar();

?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-sm-8 col-md-6">
            <h1 class="text-center">Listado de Marcaciones</h1>

            <table class="table table-sm table-bordered table-stripe table-hover w-full ">
                <thead class="thead-light">
                    <tr>
                        <th>#</th>
                        <th>EMPLEADO</th>
                        <th>ENTRADA</th>
                        <th>SALIDA</th>
                        <th>HORAS</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (count($marcaciones) > 0) : ?>

                        <?php foreach ($marcaciones as $key => $marcacion) : ?>
                            <tr>
                                <td><?= $marcacion['id'] ?></td>
                                <td><?= $marcacion['empleado'] ?></td>
                                <td><?= $marcacion['entrada'] ?></td>
                                <td><?= $marcacion['salida'] ?></td>
                                <td><?= $marcacion['horas'] ?></td>
                            </tr>

                        <?php endforeach ?>
                    <?php else :  ?>

                    <?php endif ?>
                </tbody>
            </table>

        </div>
    </div>

</div>