<?php
namespace models;

use entities\TransferEntity;
use PDOException;

class TransferModel extends BaseModel
{

    public function __construct()
    {
        parent::__construct();
    }
    
    public function mostrar()
    {
        
    }
    
    public function conseguirTransferencias($cerrarConexion = true)
    {
        $transferencias = array();
        $cuentaDB = $this->conseguirFila("cuentas", "idusuario", $_SESSION["usuario"]->getIdusuario(), $cerrarConexion = true);
        if ($cuentaDB != null)
        {
            $transferenciaDB = $this->conseguirFilas("transferencias", "num_cuenta", $cuentaDB['num_cuenta'], $cerrarConexion = true);
            foreach ($transferenciaDB as $transferencia)
            {
                $t =  new TransferEntity($transferencia['idtransferencia'], $transferencia['beneficiario'], $transferencia['num_cuenta_beneficiario'], $transferencia['fecha_transferencia'], $transferencia['concepto'], $transferencia['cantidad']);
                $transferencias[] = $t;
            }
        }

        return $transferencias;
    }
    
    public function insertarTransferencia($beneficiario, $num_cuenta_beneficiario, $cantidad, $concepto, $num_cuenta, $cerrarConexion = true)
    {
        $insercionok = false;
        
        try
        {//CAMBIAR IDTRANFERENCIA EN BBDD
            $sql = "INSERT INTO `transferencias` (`beneficiario`, `num_cuenta_beneficiario`, `fecha_transferencia`, `cantidad`, `concepto`, `num_cuenta`) VALUES (:beneficiario, :num_cuenta_beneficiario,  CURDATE(), :cantidad, :concepto, :num_cuenta)";
            $stmt = $this->conexion->prepare($sql);
            $stmt->bindParam(":beneficiario", $beneficiario);
            $stmt->bindParam(":num_cuenta_beneficiario", $num_cuenta_beneficiario);
            $stmt->bindParam(":cantidad", $cantidad);
            $stmt->bindParam(":concepto", $concepto);
            $stmt->bindParam(":num_cuenta", $num_cuenta);
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

