<?php

include __DIR__ . "/../Models/Dashboard.php";


class DashboardController
{
    public static function datosCards($fecha)
    {

        $totalEmpleatos = Dashboard::totalEmpleados()['totalEmp'];
        $marcaciones = Dashboard::marcacionesFecha($fecha);
        $totalMarcacionManualEntrada = Dashboard::totalMarcacionManualEntrada($fecha)['total'];
        $totalMarcacionManualSalida = Dashboard::totalMarcacionManualSalida($fecha)['total'];
        $totalMarcacionQrEntrada = Dashboard::totalMarcacionQrEntrada($fecha)['total'];
        $totalMarcacionQrSalida = Dashboard::totalMarcacionQrSalida($fecha)['total'];

        $marcaciones = Dashboard::listadoMaracacionesFecha($fecha);



        $data = [
            'totalEmpleados' => $totalEmpleatos,
            'totalMarcaciones' => count($marcaciones),
            'totalMarcacionManualEntrada' => $totalMarcacionManualEntrada,
            'totalMarcacionManualSalida' => $totalMarcacionManualSalida,
            'totalMarcacionQrEntrada' => $totalMarcacionQrEntrada,
            'totalMarcacionQrSalida' => $totalMarcacionQrSalida,
            'marcaciones' => $marcaciones,
        ];

        return $data;
    }

}
