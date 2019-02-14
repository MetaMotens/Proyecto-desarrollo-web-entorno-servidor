<?php
namespace models;


use entities\AccountEntity;
use entities\CardEntity;
use PDOException;

class ValidationModel extends BaseModel
{

    public function __construct()
    {
        parent::__construct();
    }
    
    public function conseguirCuentas()
    {
        $cuentas = array();
        $cuentasDB = $this->conseguirFilas("cuentas", "validado", "novalidado");
        foreach ($cuentasDB as $cuenta)
        {

                $c =  new AccountEntity($cuenta['num_cuenta'], $cuenta['titular_cuenta'], $cuenta['direccion'], $cuenta['dni'], $cuenta['saldo'], $cuenta['validado']);
                $cuentas[] = $c;
            
        }
        
        return $cuentas;
    }
    
    public function conseguirTarjetas()
    {
        $tarjetas = array();
        $tarjetasDB = $this->conseguirFilas("tarjetas", "validado", "novalidado");
        foreach ($tarjetasDB as $tarjeta)
        {

                $t =  new CardEntity($tarjeta['numero_tarjeta'], $tarjeta['fecha_inicio'], $tarjeta['fecha_fin'], $tarjeta['validado']);
                $tarjetas[] = $t;

        }
        return $tarjetas;
        
    }
    
    public function validarTarjeta($num_tarjeta, $cerrarConexion = true)
    {
        $updateOK = false;
        
        try
        {
            $sql = "update tarjetas set validado = 'validado' where numero_tarjeta = :num_tarjeta";
            $stmt =  $this->conexion->prepare($sql);
            $stmt->bindParam(":num_tarjeta", $num_tarjeta);
            $stmt->execute();
            
            if ($stmt->rowCount()>0)
            {
                $updateOK = true;
            }
        }
        catch (PDOException $e)
        {
            echo "error update: " . $e->getMessage();
        }
        finally
        {
            $stmt->closeCursor();
            if($cerrarConexion)
            {
                $this->conexion= null;
            }
            return $updateOK;
        }
        
    }
    
    public function validarCuenta($num_cuenta, $cerrarConexion = true)
    {
        $updateOK = false;
        
        try
        {
            $sql = "update cuentas set validado = 'validado' where num_cuenta = :num_cuenta";
            $stmt =  $this->conexion->prepare($sql);
            $stmt->bindParam(":num_cuenta", $num_cuenta);
            $stmt->execute();
            
            if ($stmt->rowCount()>0)
            {
                $updateOK = true;
            }
        }
        catch (PDOException $e)
        {
            echo "error update: " . $e->getMessage();
        }
        finally
        {
            $stmt->closeCursor();
            if($cerrarConexion)
            {
                $this->conexion= null;
            }
            return $updateOK;
        }
        
    }
}

