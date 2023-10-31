<div class="row justify-content-center">
    <div class="col-md-6 mt-5">
        <h2 class="text-center">REGISTRAR MARCACIÓN</h2>
        <form method="post">
            <input type="hidden" name="registrarMarcacion" value="ok">

            <div class="form-group">
                <!-- <label for="cedula">Text</label> -->
                <input id="cedula" class="form-control" type="number" name="cedula" min="0" required autofocus placeholder="Cédula">
            </div>

            <div class="mt-3 d-grid gap-2">
                <button class="btn btn-primary" type="submit">REGISTRAR</button>
            </div>

        </form>
        <?php
        RegistroController::marcacion();
        ?>
    </div>
</div>