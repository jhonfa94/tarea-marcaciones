<?php
$fecha = isset($_GET['fecha']) ? $_GET['fecha'] : date("Y-m-d");
$datos = DashboardController::datosCards($fecha);
$marcaciones = $datos['marcaciones'];

// var_dump($datos);

?>
<div class="container-fluid">


    <div class="row justify-content-center mt-3">
        <!-- <form method="get" action="index.php?ruta=dashboard" class="row justify-content-center "> -->
        <div class="col-sm-1">
            <label for="inputFecha" class=""><b>Fecha</b></label>
        </div>
        <div class="col-sm-2 text-center">
            <input id="inputFecha" class="form-control form-control-sm" type="date" max="<?= date('Y-m-d') ?>" name="fecha" value="<?= $fecha ?>">
        </div>
        <div class="col-sm-2">
            <button type="button" class="btn btn-sm btn-info btn-block" id="btnConsultar">Consultar</button>
            <!-- <a href="index.php?ruta=dashboard" class="btn btn-sm btn-info btn-block">Consultar</a> -->
        </div>
        <!-- </form> -->

    </div>

    <div class="row  justify-content-center mt-3">
        <div class="col-sm-2">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    Total de Empleados
                </div>
                <div class="card-body text-center">
                    <h3><?= $datos['totalEmpleados'] ?></h3>
                </div>
            </div>

        </div>

        <div class="col-sm-2">
            <div class="card">
                <div class="card-header bg-warning">
                    Total de Marcaciones
                </div>
                <div class="card-body text-center">
                    <h3><?= $datos['totalMarcaciones'] ?></h3>
                </div>
            </div>
        </div>

        <div class="col-sm-2">
            <div class="card">
                <div class="card-header bg-info">
                    Marcación Manual Entrada
                </div>
                <div class="card-body text-center">
                    <h3><?= $datos['totalMarcacionManualEntrada'] ?></h3>
                </div>
            </div>
        </div>

        <div class="col-sm-2">
            <div class="card">
                <div class="card-header bg-info">
                    Marcación Manual Salida
                </div>
                <div class="card-body text-center">
                    <h3><?= $datos['totalMarcacionManualSalida'] ?></h3>
                </div>
            </div>
        </div>

        <div class="col-sm-2">
            <div class="card">
                <div class="card-header bg-success text-white">
                    Marcación Entrada QR
                </div>
                <div class="card-body text-center">
                    <h3><?= $datos['totalMarcacionQrEntrada'] ?></h3>
                </div>
            </div>
        </div>


        <div class="col-sm-2">
            <div class="card">
                <div class="card-header bg-success text-white">
                    Marcación Salida QR
                </div>
                <div class="card-body text-center">
                    <h3><?= $datos['totalMarcacionQrSalida'] ?></h3>
                </div>
            </div>
        </div>



    </div><!-- row -->

    <div class="row justify-content-center mt-3">
        <div class="col-12 col-sm-10 ">
            <h1 class="text-center">Listado de Marcaciones <?= $fecha ?></h1>

            <table class="table table-sm table-bordered table-stripe table-hover w-full " id="tblMarcacionesDashboard">
                <thead class="thead-light">
                    <tr>
                        <th>EMPLEADO</th>
                        <th>LUGAR</th>
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
                                <td><?= $marcacion['empleado'] ?></td>
                                <td><?= $marcacion['lugar'] ?></td>
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

</div><!-- continer fluid -->



<script defer>
    const inputFecha = document.querySelector('#inputFecha');
    const btnConsultar = document.querySelector('#btnConsultar');
    btnConsultar.addEventListener('click', (e) => {
        e.preventDefault();
        let fechaConsulta = inputFecha.value
        let urlConsulta = `index.php?ruta=dashboard&fecha=${fechaConsulta}`

        window.location = urlConsulta

    })


    let table = new DataTable('#tblMarcacionesDashboard', {
        language: {
            url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json',
        },

        order: [
            [3, 'asc']
        ]


    });
</script>