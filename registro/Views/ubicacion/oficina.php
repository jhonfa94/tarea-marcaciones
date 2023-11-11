<style>
    body {
        background-image: url('./views/assets/img/oficina2.jpg');
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
    }
</style>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 mt-5 card">

            <h2 class="text-center mt-2">REGISTRO DE MARCACIÓN OFICINA</h2>
            <form method="get" class="my-4">
                <input type="hidden" name="marcacion" value="MANUAL">
                <input type="hidden" name="ubicacion" value="2">
                <input type="hidden" name="ruta" value="oficina">
                <div class="form-group">
                    <!-- <label for="cedula">Text</label> -->
                    <input id="cedula" class="form-control" type="number" name="cedula" min="0" required autofocus placeholder="Cédula">
                </div>

                <div class="mt-3 d-grid gap-2 ">
                    <button class="btn btn-primary" type="submit">REGISTRAR</button>
                </div>

            </form>
            <?php
            RegistroController::marcacion();
            ?>
        </div>
    </div>
</div>