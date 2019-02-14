<?php
namespace models;

use entities\CardEntity;
use PDOException;

class CardModel extends BaseModel
{

    public function __construct()
    {
        parent::__construct();
    }
    
    public function conseguirTarjetas($cerrarConexion = true)
    {
        $tarjetas = array();
        $cuentaDB = $this->conseguirFila("cuentas", "idusuario", $_SESSION["usuario"]->getIdusuario(), $cerrarConexion = true);
        if ($cuentaDB != null)
        {
            $tarjetasDB = $this->conseguirFilas("tarjetas", "num_cuenta", $cuentaDB['num_cuenta'], $cerrarConexion = true);
            foreach ($tarjetasDB as $tarjeta)
            {
                $t =  new CardEntity($tarjeta['numero_tarjeta'], $tarjeta['fecha_inicio'], $tarjeta['fecha_fin'], $tarjeta['validado']);
                $tarjetas[] = $t;
            }
        }
        return $tarjetas;
    }
    
    public function insertarTarjeta($num_cuenta, $cerrarConexion = true)
    {
        
        $insercionok = false;
        
        try
        {//TODO CAMBIAR NUMERO DE TARJETA PARA QUE SEA AUTOINCREMENTAL
            $sql = "INSERT INTO `tarjetas` (`fecha_inicio`, `fecha_fin`, `num_cuenta`) VALUES (CURDATE(), DATE_ADD(CURDATE(), INTERVAL 10 YEAR), :num_cuenta)";
            $stmt = $this->conexion->prepare($sql);
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

