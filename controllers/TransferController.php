<?php
namespace controllers;


use helpers\Utilidades;
use models\TransferModel;
use models\BaseModel;

class TransferController
{

    public function __construct()
    {}
    
    public function mostrar()
    {
        Utilidades::esUser();
        require_once 'views/layout/transfer/mostrar.php';
    }
    
    public function vistaCrearTransferencia()
    {
        Utilidades::esUser();
        require_once 'views/layout/transfer/creartransferencia.php';
    }
    
    public function crearTransferencia()
    {
        Utilidades::esUser();
        if (isset($_POST['btntransferencia']))
        {
            $beneficiario = $_POST['beneficiario'];
            $num_cuenta_beneficiario = $_POST['num_cuenta'];
            $cantidad = $_POST['cantidad'];
            $concepto = $_POST['concepto'];
            
            $basemodel = new BaseModel();
            $fila = $basemodel->conseguirFila("cuentas", "idusuario", $_SESSION["usuario"]->getIdusuario());
            $num_cuenta = $fila['num_cuenta'];
            
            $transfermodel = new TransferModel();
            if($transfermodel->insertarTransferencia($beneficiario, $num_cuenta_beneficiario, $cantidad, $concepto, $num_cuenta))
            {
                header("location: " . URL_BASE . "/transfer/mostrar");
            }
            else
            {
                echo "error insercion";
            }
        }
    }
}

