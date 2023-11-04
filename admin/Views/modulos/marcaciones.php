<?php
$marcaciones = MarcacionController::listar();

?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-sm-10 ">
            <h1 class="text-center">Listado de Marcaciones</h1>

            <table class="table table-sm table-bordered table-stripe table-hover w-full " id="tblMarcaciones">
                <thead class="thead-light">
                    <tr>
                        <th>#</th>
                        <th>EMPLEADO</th>
                        <th>TIPO ENTRADA</th>
                        <th>FECHA ENTRADA</th>
                        <th>TIPO SALIDA</th>
                        <th>FECHA SALIDA</th>
                        <th>HORAS</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (count($marcaciones) > 0) : ?>

                        <?php foreach ($marcaciones as $key => $marcacion) : ?>
                            <tr>
                                <td><?= $marcacion['id'] ?></td>
                                <td><?= $marcacion['empleado'] ?></td>
                                <td><?= $marcacion['tipo_entrada'] ?></td>
                                <td><?= $marcacion['entrada'] ?></td>
                                <td><?= $marcacion['tipo_salida'] ?></td>
                                <td><?= $marcacion['salida'] ?></td>
                                <td class="text-center"><?= $marcacion['horas'] ?></td>
                            </tr>

                        <?php endforeach ?>
                    <?php else :  ?>

                    <?php endif ?>
                </tbody>
            </table>

        </div>
    </div>

</div>

<script defer>
    let table = new DataTable('#tblMarcaciones', {
        language: {
            url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json',
        },
    });
</script>