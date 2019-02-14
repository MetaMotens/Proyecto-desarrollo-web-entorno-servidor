<?php
namespace controllers;

use helpers\Utilidades;
use models\ValidationModel;

class ValidationController
{

    public function __construct()
    {}
    
    public function mostrar()
    {
        Utilidades::esAdmin();
        require_once 'views/layout/validation/mostrar.php';
    }
    
    public function validarTarjeta()
    {
        Utilidades::esAdmin();
        if (isset($_GET['num_cuenta']))
        {
            $validationmodel = new ValidationModel();
            if ($validationmodel->validarTarjeta($_GET['num_cuenta']))
            {
                header("location: " . URL_BASE);
            }
            else
            {
                echo "error";
            }
        }
    }
    
    public function validarCuenta()
    {
        Utilidades::esAdmin();
        if (isset($_GET['num_cuenta']))
        {
            $validationmodel = new ValidationModel();
            if ($validationmodel->validarCuenta($_GET['num_cuenta']))
            {
                header("location: " . URL_BASE);
            }
            else
            {
                echo "error";
            }
        }
    }
}

