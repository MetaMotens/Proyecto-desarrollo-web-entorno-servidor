<?php
namespace controllers;

use models\AccountModel;
use helpers\Utilidades;

class AccountController
{

    public function __construct()
    {}
    
    public function mostrar()
    {
        Utilidades::esUser();
        require_once 'views/layout/account/mostrar.php';
    }
    
    public function vistaCrearCuenta()
    {
        Utilidades::esUser();
        require_once 'views/layout/account/crearcuenta.php';
    }
    
    public function crearCuenta()
    {
        Utilidades::esUser();
        if (isset($_POST['btncuenta']))
        {
            $titular = $_POST['titular'];
            $direccion = $_POST['direccion'];
            $dni = $_POST['dni'];
            $saldo = $_POST['saldo'];
            $id = $_SESSION["usuario"]->getIdusuario();
            
            $accountModel = new AccountModel();
            if($accountModel->insertarCuenta($titular, $direccion, $dni, $saldo, $id))
            {
                header("location: " . URL_BASE . "/account/mostrar");
            }
            else
            {
                echo "error";
            }
        }
        
    }
}

