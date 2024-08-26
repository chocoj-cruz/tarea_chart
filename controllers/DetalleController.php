<?php

namespace Controllers;

use Exception;
use Model\Clientes;
use MVC\Router;

class DetalleController
{

    public static function estadisticas(Router $router)
    {
        $router->render('clientes/estadisticas');
    }

    public static function detalleComprasAPI()
    {
        try {

            $sql = 'SELECT CLIENTE_NOMBRE AS CLIENTE, SUM(DETALLE_CANTIDAD) AS CANTIDAD FROM DETALLE_COMPRAS
            INNER JOIN CLIENTES ON DETALLE_CLIENTE = CLIENTE_ID WHERE DETALLE_SITUACION = 1
            GROUP BY CLIENTE_NOMBRE';

            $datos = Clientes::fetchArray($sql);

            echo json_encode($datos);
        } catch (Exception $e) {
            echo json_encode([
                'detalle' => $e->getMessage(),
                'mensaje' => 'Ocurrió un error',
                'codigo' => 0
            ]);
        }
    }
}
