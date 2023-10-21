<?php
// CONFIGURACION DE VARIABLES GLOBALES
include "./config.php";
include "./Models/Conexion.php";

include "./Controllers/AppController.php";
include "./Controllers/HelperController.php";
include "./Controllers/UsuarioController.php";
include "./Controllers/EmpleadoController.php";


AppController::startApp(); 




?> 