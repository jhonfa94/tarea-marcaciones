<style>
    .login {
        min-height: 100vh;
    }

    .bg-image {
        background-image: url('https://images.unsplash.com/photo-1589792923962-537704632910?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1770&q=80');
        background-size: cover;
        background-position: center;
    }

    .login-heading {
        font-weight: 300;
    }

    .btn-login {
        font-size: 0.9rem;
        letter-spacing: 0.05rem;
        padding: 0.75rem 1rem;
    }
</style>

<div class="row g-0">
    <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image"></div>
    <div class="col-md-8 col-lg-6">
        <div class="login d-flex align-items-center py-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-9 col-lg-8 mx-auto">
                        <h3 class="login-heading mb-4">Iniciar Sesión</h3>

                        <!-- Sign In Form -->
                        <form method="post" id="frmLogin">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="cedula" id="cedula" placeholder="cedula">
                                <label for="cedula">Usuario</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                                <label for="password">Password</label>
                            </div>
                            <div class="d-grid">
                                <button class="btn btn-lg btn-primary btn-login text-uppercase fw-bold mb-2" type="submit">Entrar</button>
                                <!-- <div class="text-center">
                                    <a class="small" href="#">Registrate aqui!</a>
                                </div> -->
                            </div>
                            <input type="hidden" name="iniciarSesion">

                        </form>
                        <?php
                        UsuarioController::login();
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>