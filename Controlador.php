<?php

require_once 'autocarga.php';
require_once 'config/parametros.php';

$accion = "";
$claseControlador = "";

$controladorvalido = true;
$accionvalida = true;

if (!isset($_GET['controlador']) && !isset($_GET['accion']))
{
    $claseControlador = "\\controllers\\" . CONTROLADOR_DEFECTO . "Controller";
    $accion = ACCION_DEFECTO;
    $controlador = new $claseControlador;
    $controlador->$accion();//variable que contiene la accion contatenado con () para llamar a la funcion
}