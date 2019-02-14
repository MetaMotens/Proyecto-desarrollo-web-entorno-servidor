<?php
namespace controllers;

use helpers\Utilidades;
use models\BaseModel;
use models\CardModel;

class CardController
{

    public function __construct()
    {}
    
    public function mostrar()
    {
        Utilidades::esUser();
        require_once 'views/layout/Card/mostrar.php';
    }
    
    public function vistacreartarjeta()
    {
        Utilidades::esUser();
        require_once 'views/layout/Card/creartarjeta.php';
    }
    
    public function crearTarjeta()
    {
        Utilidades::esUser();
        if (isset($_POST['btntarjeta']))
        {
            
            $basemodel = new BaseModel();
            $fila = $basemodel->conseguirFila("cuentas", "idusuario", $_SESSION["usuario"]->getIdusuario());
            $num_cuenta = $fila['num_cuenta'];
            
            $cardmodel = new CardModel();
            if($cardmodel->insertarTarjeta($num_cuenta))
            {
                header("location: " . URL_BASE . "/card/mostrar");
            }
            else
            {
                echo "error insercion";
            }
        }
    }
}

