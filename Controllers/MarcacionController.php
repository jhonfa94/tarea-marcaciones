<?php
include __DIR__ . "/../Models/Marcacion.php";

class MarcacionController
{

    public static function listar()
    {
        return Marcacion::listar();
    }
}
