<?php
$id = isset($_GET["id"]) ? intval($_GET["id"]) : 0;
$infoUsuario = UsuarioController::info($id);
// var_dump($infoUsuario);
?>
<?php
if (!count($infoUsuario) > 0) :
    echo "<h2>El usuario con id  $id  no esta registrado en el sistema</h2>";
    die();
endif;

?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-6">

            <h2 class="text-center">Actualizar usuario # <?= $id ?></h2>

            <form method="post" id="frmUpdateUsuario">
                <input type="hidden" name="updateUsuario" value="ok">
                <input type="hidden" name="idUsuario" value="<?= $id ?>">


                <div class="form-group">
                    <label for="cedula">Cédula</label>
                    <input id="cedula" class="form-control" type="number" name="cedula" required value="<?= $infoUsuario['cedula'] ?>">
                </div>

                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input id="nombre" class="form-control" type="text" name="nombre" required value="<?= $infoUsuario['nombre'] ?>">
                </div>



                <div class="form-group">
                    <label for="correo">correo</label>
                    <input id="correo" class="form-control" type="email" name="correo" required value="<?= $infoUsuario['correo'] ?>">
                </div>

                <div class="form-group">
                    <label for="rol">Rol</label>
                    <select id="rol" class="form-control" name="rol" required value="">
                        <option value="developer" <?= $infoUsuario['rol'] == 'developer' ? 'selected' : '' ?>>developer</option>
                        <option value="admin" <?= $infoUsuario['rol'] == 'admin' ? 'selected' : '' ?>>Admin</option>
                        <option value="coordinador" <?= $infoUsuario['rol'] == 'coordinador' ? 'selected' : '' ?>>Coordinador</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="estado">Estado</label>
                    <select id="estado" class="form-control" name="estado" required value="<?= $infoUsuario['estado'] ?>">
                        <option value="1">Activo</option>
                        <option value="0">Inactivo</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary my-4">
                    Actualizar
                </button>

            </form>
            <?php UsuarioController::update(); ?>
        </div>
    </div>

</div>