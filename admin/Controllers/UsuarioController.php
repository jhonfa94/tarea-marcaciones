<?php
include __DIR__ . "/../Models/Usuario.php";

class UsuarioController
{
    public static function info($id)
    {
        return Usuario::info($id, $id);
    }

    public static function login()
    {

        if (isset($_POST['iniciarSesion'])) {
            // var_dump($_POST);
            $cedula = intval($_POST['cedula']);
            $dispositivo =             $_SERVER['HTTP_USER_AGENT'];
            $infoUsuario = Usuario::info($cedula);
            // Si el usuario no existe
            if (!count($infoUsuario) > 0) {
                echo "
                    <div class='alert alert-danger' role='alert'>
                        El Usuario o la contraseña no es correcta
                    </div>
                ";
                Usuario::registrarSesion($cedula, 'error', $dispositivo);
                die();
            }

            // SI EL USUARIO NO ESTA ACTIVO EN EL SISTEMA
            if ($infoUsuario['estado']  == 0) {
                echo "
                    <div class='alert alert-warning' role='alert'>
                        El Usuario no esta activo en el sistema
                    </div>
                ";
                Usuario::registrarSesion($cedula, 'error', $dispositivo);
                die();
            }


            // validamos password
            if (!password_verify($_POST["password"], $infoUsuario['password'])) {
                echo "
                <div class='alert alert-danger' role='alert'>
                    El Usuario o la contraseña no es correcta
                </div>
                ";
                Usuario::registrarSesion($cedula, 'error', $dispositivo);
                die();
            }

            Usuario::registrarSesion($cedula, 'ok', $dispositivo);

            // REGISTRAMOS SESIONES EN EL SISTEMA
            $_SESSION['iniciarSession'] = 'ok';
            $_SESSION['cedula'] = $infoUsuario['cedula'];
            $_SESSION['nombre'] = $infoUsuario['nombre'];
            $_SESSION['correo'] = $infoUsuario['correo'];
            $_SESSION['rol'] = $infoUsuario['rol'];

            // echo "<pre>";
            // var_dump($infoUsuario);
            // echo "<pre>";

            HelperController::clearDataFormJs();

            // header("Location: index.php?ruta=empleados");
            echo "
                <script>                 
                    window.location.replace('/marcaciones/admin/index.php?ruta=empleados');                 
                </script>
            
            ";
        }
    }

    public static function listarUsuarios()
    {
        return Usuario::lista();
    }

    public static function registrar()
    {
        if (isset($_POST['registrarUsuario'])) {
            $cedula = intval($_POST['cedula']);
            // validamos si el usuario existe por la cedula
            $validarUsuario = Usuario::info($cedula);
            // var_dump($_POST);

            if (count($validarUsuario) > 0) {

                echo "
                    <div class='alert alert-danger' role='alert'>
                        El usuario con cédula $cedula ya se encuentra registrado
                    </div>
                ";
                HelperController::clearDataFormJs();
            } else {
                $passwordHash = password_hash($_POST["cedula"], PASSWORD_DEFAULT);
                $data = [
                    'cedula' => $cedula,
                    'nombre' => $_POST['nombre'],
                    'correo' => $_POST['correo'],
                    'password' => $passwordHash,
                    'rol' => $_POST['rol'],
                    'estado' => $_POST['estado'],
                ];

                $registro = Usuario::registrar($data);

                if ($registro > 0) {
                    HelperController::clearDataFormJs();

                    echo "
                        <div class='alert alert-success' role='alert'>
                            El Uusario {$_POST['nombre']}  con cédula $cedula se registro exitosamente
                        </div>
                    ";

                    HelperController::reloadPage();
                }
            }
        }
    }

    public static function update()
    {
        if (isset($_POST["updateUsuario"])) {

            $idUsuario = intval($_POST["idUsuario"]);
            $cedula = intval($_POST["cedula"]);

            $data = [
                'id'  => $idUsuario,
                'cedula'  => $cedula,
                'nombre'  => $_POST['nombre'],
                'correo'  => $_POST['correo'],
                'rol'  => $_POST['rol'],
                'estado'  => $_POST['estado'],
            ];

            $updateEmpleado = Usuario::update($data);

            HelperController::clearDataFormJs();
            if ($updateEmpleado) {
                echo "
                    <div class='alert alert-success' role='alert'>
                        Usuario actualizado. 
                    </div>
                ";
                HelperController::redirectPage('index.php?ruta=usuarios');
            } else {
                echo "
                    <div class='alert alert-warning' role='alert'>
                        Para actualizar el registro del id $idUsuario, se requiere modificación de alguno de los campos del formulario
                    </div>
                ";
            }
        }
    }
}
