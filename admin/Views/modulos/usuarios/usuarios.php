<?php
$usuarios = UsuarioController::listarUsuarios();


?>
<div class="container">

    <div class="row">
        <div class="col-12 text-center">
            <h1>Usuarios</h1>
        </div>

        <div class="col-12">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary text-right" data-bs-toggle="modal" data-bs-target="#modalRegistrarUsuario">
                Registrar
            </button>

            <!-- Modal -->
            <div class="modal fade" id="modalRegistrarUsuario" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalRegistrarUsuarioLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <form method="post" id="frmRegistrarUsuario">
                        <input type="hidden" name="registrarUsuario" value="ok">

                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="modalRegistrarUsuarioLabel">Registrar Usuario</h1>
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
                                    <label for="correo">correo</label>
                                    <input id="correo" class="form-control" type="email" name="correo" required>
                                </div>

                                <div class="form-group">
                                    <label for="rol">Rol</label>
                                    <select id="rol" class="form-control" name="rol" required>
                                        <option value="" disabled selected>-- Seleccionar --</option>
                                        <option value="developer">developer</option>
                                        <option value="admin">Admin</option>
                                        <option value="coordinador">Coordinador</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="estado">Estado</label>
                                    <select id="estado" class="form-control" name="estado" required>
                                        <option value="1" selected>Activo</option>
                                        <option value="0">Inactivo</option>
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

            UsuarioController::registrar();
            ?>
        </div>

        <div class="col-12">


            <table class="table table-sm table-hover table-stripe table-bordered w-full" id="tblUsuarios">
                <thead class="thead-light">
                    <tr>
                        <th>#</th>
                        <th>CÉDULA</th>
                        <th>NOMBRE</th>
                        <th>CORREO</th>
                        <th>ROL</th>
                        <th>ESTADO</th>
                        <th>ACCIONES</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (count($usuarios) > 0) : ?>
                        <?php foreach ($usuarios as $key => $usuario) : ?>
                            <tr>
                                <td><?= $usuario['id'] ?></td>
                                <td><?= $usuario['cedula'] ?></td>
                                <td><?= $usuario['nombre'] ?></td>
                                <td><?= $usuario['correo'] ?></td>
                                <td><?= $usuario['rol'] ?></td>
                                <td><?= $usuario['estado'] == 1 ? '<span class="badge text-bg-success">Activo</span>' : '<span class="badge text-bg-danger">Inactivo</span>' ?></td>
                                <td>
                                    <a href="index.php?ruta=usuarios-edit&id=<?= $usuario['id'] ?>" class="btn btn-sm btn-primary">
                                        Editar
                                    </a>
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
    let table = new DataTable('#tblUsuarios', {
        language: {
            url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json',
        },
    });
</script>