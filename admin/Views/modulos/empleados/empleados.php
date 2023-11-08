<?php
$empleados = EmpleadoController::listarEmpleados();
$lugares = MarcacionController::lugares();

?>
<div class="container">

    <div class="row">
        <div class="col-12 text-center">
            <h1>Empleados</h1>
        </div>

        <div class="col-12">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary text-right" data-bs-toggle="modal" data-bs-target="#modalRegistroEmpleado">
                Registrar
            </button>

            <!-- Modal -->
            <div class="modal fade" id="modalRegistroEmpleado" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalRegistroEmpleadoLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <form method="post" id="frmRegistrarEmpleado">
                        <input type="hidden" name="registrarEmpleado" value="ok">

                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="modalRegistroEmpleadoLabel">Registrar Empleado</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="cedula">Cédula</label>
                                    <input id="cedula" class="form-control" type="number" name="cedula" required>
                                </div>

                                <div class="form-group">
                                    <label for="nombre">Nombre</label>
                                    <input id="nombre" class="form-control" type="text" name="nombre" required>
                                </div>

                                <div class="form-group">
                                    <label for="apellido">Apellido</label>
                                    <input id="apellido" class="form-control" type="text" name="apellido" required>
                                </div>

                                <div class="form-group">
                                    <label for="fecha_nacimiento">Fecha Nacimiento</label>
                                    <input id="fecha_nacimiento" class="form-control" type="date" max="<?= date('Y-m-d') ?>" name="fecha_nacimiento" required>
                                </div>

                                <div class="form-group">
                                    <label for="correo">correo</label>
                                    <input id="correo" class="form-control" type="email" name="correo" required>
                                </div>

                                <div class="form-group">
                                    <label for="estado">Estado</label>
                                    <select id="estado" class="form-control" name="estado" required>
                                        <option value="1" selected>Activo</option>
                                        <option value="0">Inactivo</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="lugar_marcacion">Lugar de marcación</label>
                                    <select id="lugar_marcacion" class="form-control" name="lugar_marcacion" required>
                                        <option value="" selected disabled>-- Seleccionar --</option>
                                        <?php if (count($lugares) > 0) : ?>
                                            <?php foreach ($lugares as $key => $lugar) : ?>
                                                <option value="<?= $lugar['id'] ?>"><?= $lugar['lugar'] ?></option>
                                            <?php endforeach ?>
                                        <?php endif ?>
                                    </select>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-success">Guardar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <?php

            EmpleadoController::registrar();
            ?>
        </div>

        <div class="col-12">


            <table class="table table-sm table-hover table-stripe table-bordered w-full" id="tblEmpleados">
                <thead class="thead-light">
                    <tr>
                        <th>#</th>
                        <th>CÉDULA</th>
                        <th>NOMBRE</th>
                        <th>APELLIDO</th>
                        <th>FECHA NACIMIENTO</th>
                        <th>CORREO</th>
                        <th>ESTADO</th>
                        <th>LUGAR DE MARCACIÓN</th>
                        <th>ACCIONES</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (count($empleados) > 0) : ?>
                        <?php foreach ($empleados as $key => $empleado) : ?>
                            <tr>
                                <td><?= $empleado['id'] ?></td>
                                <td><?= $empleado['cedula'] ?></td>
                                <td><?= $empleado['nombre'] ?></td>
                                <td><?= $empleado['apellido'] ?></td>
                                <td><?= $empleado['fecha_nacimiento'] ?></td>
                                <td><?= $empleado['correo'] ?></td>
                                <td><?= $empleado['estado'] == 1 ? '<span class="badge text-bg-success">Activo</span>' : '<span class="badge text-bg-danger">Inactivo</span>' ?></td>
                                <td><?= $empleado['lugar'] ?></td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">

                                        <a href="index.php?ruta=empleados-edit&id=<?= $empleado['id'] ?>" class="btn btn-sm btn-primary mr-1">
                                            Editar
                                        </a>
                                        <a href="index.php?ruta=empleados-eliminar&id=<?= $empleado['id'] ?>" class="btn btn-sm btn-danger ml-2">
                                            Eliminar
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    <?php else :  ?>
                        <tr>
                            <td colspan="7">Sin registros</td>
                        </tr>

                    <?php endif ?>
                </tbody>
            </table>

        </div>


    </div>
</div>

<script defer>
    let table = new DataTable('#tblEmpleados', {
        language: {
            url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json',
        },
    });
</script>