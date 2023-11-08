<?php
$id = isset($_GET["id"]) ? intval($_GET["id"]) : 0;

if ($id == 0) {
    HelperController::redirectPage("index.php?ruta=empleados", 0);
}

$infoEmpleado = EmpleadoController::info($id);
// var_dump($infoEmpleado);

?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <h1 class="text-center">Eliminar Empleado: <?= $infoEmpleado['nombre'] ?> <?= $infoEmpleado['apellido'] ?></h1>
            <div class="alert alert-danger" role="alert">
                Por favor, ten en cuenta que al eliminar un empleado de la base de datos, toda su información,
                incluyendo historial laboral y datos personales, será permanentemente eliminada.
                Esta acción no se puede deshacer. Asegúrate de que estás autorizado para realizar esta operación y que es absolutamente necesario.
                Si tienes alguna duda, consulta con tu supervisor o el departamento de recursos humanos antes de proceder.
            </div>
        </div>

        <div class="col-sm-4 card">
            <form method="post">
                <input type="hidden" name="idEmpleado" value="<?= $id ?>">
                <input type="hidden" name="eliminarEmpleado" value="ok">

                <div class="form-check mt-3 font-weight-bold">
                    <input id="confirmarEliminacion" class="form-check-input" type="checkbox" name="confirmarEliminacion" value="true" required>
                    <label for="confirmarEliminacion" class="form-check-label">¿Confirma la eliminación del registro del empleado?</label>
                </div>

                <div class="text-center my-4">
                    <button type="submit" class="btn btn-danger ">
                        Eliminar
                    </button>

                    <br>
                    <br>

                    <a href="index.php?ruta=empleados" class="btn btn-warning">Cancelar</a>

                </div>
                <?php EmpleadoController::delete(); ?>
            </form>
        </div>
    </div>

</div>