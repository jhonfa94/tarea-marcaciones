<?php
// CONFIGURACION DE VARIABLES GLOBALES
include "./config.php";
include "./Models/Conexion.php";

include "./Controllers/HelperController.php";
include "./Controllers/AppController.php";
include "./Controllers/RegistroController.php";

AppController::startApp();
