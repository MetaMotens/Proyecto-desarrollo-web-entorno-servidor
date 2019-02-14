<?php
namespace models;

use PDOException;
use entities\AccountEntity;

class AccountModel extends BaseModel
{
    
    public function __construct()
    {
        parent::__construct();
    }
    
    public function conseguirCuentas()
    {
        $cuentas = array();
        $cuentasDB = $this->conseguirFilas("cuentas", "idusuario", $_SESSION["usuario"]->getIdusuario());
        foreach ($cuentasDB as $cuenta)
        {
            $c =  new AccountEntity($cuenta['num_cuenta'], $cuenta['titular_cuenta'], $cuenta['direccion'], $cuenta['dni'], $cuenta['saldo'], $cuenta['validado']);
            $cuentas[] = $c;
        }
        
        return $cuentas;
    }
    
    public function conseguirCuentasValidadas()
    {
        $cuentas = array();
        $cuentasDB = $this->conseguirFilas("cuentas", "idusuario", $_SESSION["usuario"]->getIdusuario());
        foreach ($cuentasDB as $cuenta)
        {
            if (!strcmp($cuenta['validado'], "validado"))
            {
                $c =  new AccountEntity($cuenta['num_cuenta'], $cuenta['titular_cuenta'], $cuenta['direccion'], $cuenta['dni'], $cuenta['saldo'], $cuenta['validado']);
                $cuentas[] = $c;
            }
            
        }
        
        return $cuentas;
    }
    
    public function insertarCuenta($titular, $direccion, $dni, $saldo, $id, $cerrarConexion = true)
    {
        $insercionok = false;
        try
        {//PENDIENTE CAMBIAR EL NUMERO DE CUENTA QUE ES VARCHAR A AUTOINCREMENTAL
            $sql = "INSERT INTO `cuentas` (`titular_cuenta`, `direccion`, `dni`, `saldo`, `idusuario`) VALUES (:titular, :direccion, :dni, :saldo, :id);";
            $stmt = $this->conexion->prepare($sql);
            $stmt->bindParam(":titular", $titular);
            $stmt->bindParam(":direccion", $direccion);
            $stmt->bindParam(":dni", $dni);
            $stmt->bindParam(":saldo", $saldo);
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            
            if ($stmt->rowCount()>0)
            {
                $insercionok = true;
            }
        }
        catch (PDOException $e)
        {
            echo "error insercion: " . $e->getMessage();
        }
        finally
        {
            $stmt->closeCursor();
            if($cerrarConexion)
            {
                $this->conexion= null;
            }
            return $insercionok;
        }
    }
}

