<?php

use models\UserModel;

require_once 'autocarga.php';
require_once 'config/parametros.php';
require_once 'views/layout/header.php';
require_once 'views/layout/nav.php';



$accion = "";
$claseControlador = "";

$controladorvalido = true;
$accionvalida = true;

if (!isset($_GET['controlador']) && !isset($_GET['accion']))
{
    $claseControlador = "controllers\\" . CONTROLADOR_DEFECTO . "Controller";
    $accion = ACCION_DEFECTO;
    $controlador = new $claseControlador;
    $controlador->$accion();//variable que contiene la accion contatenado con () para llamar a la funcion
}
elseif (isset($_GET['controlador']))
{
    $nombreControlador = $_GET['controlador'];
    $claseControlador = "controllers\\" . $nombreControlador . "Controller";
    
    if (isset($_GET['accion']))
    {
        $accion = $_GET['accion'];
        $controlador = new $claseControlador;
        $controlador->$accion();
    }
    else
    {
        $accionvalida = false;
    }
}
else
{
    $controladorvalido = false;
}

//comprueba si la accion y el controlador no son validos, si alguno de los dos no son validos, vuelve al controlador y accion por defecto
if (!$accionvalida || !$controladorvalido)
{
    $claseControlador = "controllers\\" . CONTROLADOR_DEFECTO . "Controller";
    $accion = ACCION_DEFECTO;
    $controlador = new $claseControlador;
    $controlador->$accion();
}

require_once 'views/layout/footer.php';


