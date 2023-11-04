<?php
$id = isset($_GET["id"]) ? intval($_GET["id"]) : 0;
$infoEmpleado = EmpleadoController::info($id);
// var_dump($infoEmpleado);
?>
<?php
if (!count($infoEmpleado) > 0) :
    echo "<h2>El id  $id  no esta registrado en el sistema</h2>";
    die();
endif;

$lugares = MarcacionController::lugares();

?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-6">

            <h2 class="text-center">Actualizar empleado # <?= $id ?></h2>

            <form method="post" id="frmUpdateEmpleado">
                <input type="hidden" name="updateEmpleado" value="ok">
                <input type="hidden" name="idEmpleado" value="<?= $id ?>">


                <div class="form-group">
                    <label for="cedula">Cédula</label>
                    <input id="cedula" class="form-control" type="number" name="cedula" required value="<?= $infoEmpleado['cedula'] ?>">
                </div>

                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input id="nombre" class="form-control" type="text" name="nombre" required value="<?= $infoEmpleado['nombre'] ?>">
                </div>

                <div class="form-group">
                    <label for="apellido">Apellido</label>
                    <input id="apellido" class="form-control" type="text" name="apellido" required value="<?= $infoEmpleado['apellido'] ?>">
                </div>

                <div class="form-group">
                    <label for="fecha_nacimiento">Fecha Nacimiento</label>
                    <input id="fecha_nacimiento" class="form-control" type="date" max="<?= date('Y-m-d') ?>" name="fecha_nacimiento" required value="<?= $infoEmpleado['fecha_nacimiento'] ?>">
                </div>

                <div class="form-group">
                    <label for="correo">correo</label>
                    <input id="correo" class="form-control" type="email" name="correo" required value="<?= $infoEmpleado['correo'] ?>">
                </div>

                <div class="form-group">
                    <label for="estado">Estado</label>
                    <select id="estado" class="form-control" name="estado" required>
                        <option value="1" <?= $infoEmpleado['estado'] == 1 ? 'selected' : '' ?>>Activo</option>
                        <option value="0" <?= $infoEmpleado['estado'] == 0 ? 'selected' : '' ?>>Inactivo</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="estado">Estado</label>
                    <select id="estado" class="form-control" name="estado" required>
                        <option value="1" <?= $infoEmpleado['estado'] == 1 ? 'selected' : '' ?>>Activo</option>
                        <option value="0" <?= $infoEmpleado['estado'] == 0 ? 'selected' : '' ?>>Inactivo</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="lugar_marcacion">Lugar de marcación</label>
                    <select id="lugar_marcacion" class="form-control" name="lugar_marcacion" required>
                        <option value="" selected disabled>-- Seleccionar --</option>
                        <?php if (count($lugares) > 0) : ?>
                            <?php foreach ($lugares as $key => $lugar) : ?>
                                <option value="<?= $lugar['id'] ?>" <?= $infoEmpleado['lugar_marcacion'] == $lugar['id'] ? 'selected' : '' ?>><?= $lugar['lugar'] ?></option>
                            <?php endforeach ?>
                        <?php endif ?>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary my-4">
                    Actualizar
                </button>
            </form>
            <?php EmpleadoController::update();             ?>
        </div>
    </div>

</div>