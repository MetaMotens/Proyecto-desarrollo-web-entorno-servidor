<?php
namespace models;

use config\Database;
use PDO;
use PDOException;

class BaseModel
{
    protected $conexion;
    
    public function __construct()
    {
        $this->conexion = Database::conectar();
    }
    
    public function conseguirFila($tabla, $campo, $valor, $cerrarConexion = true)
    {
        $fila = null;
        
        try{
            $sql = "select * from $tabla where $campo = $valor";
            $stmt = $this->conexion->prepare($sql);
            $stmt->execute();
            if($f = $stmt->fetch(PDO::FETCH_ASSOC))
            {
                $fila = $f;
            }
        }
        catch (PDOException $e)
        {
            echo "<br>error al mostrar la fila buscada <br>". $e->getMessage()."<br>";
        }
        finally {
            $stmt->closeCursor();
            if($cerrarConexion)
            {
                $this->conexion= null;
            }
        }
        return $fila;
    }
    
    public function conseguirFilas($tabla, $campo, $valor, $cerrarConexion = true)
    {
        $filas = array();
        
        if ($this->conexion == null)
        {
            $this->conexion = Database::conectar();
        }
       
        try{
            $sql = "select * from $tabla where $campo = '$valor'";
            $stmt = $this->conexion->prepare($sql);
            $stmt->execute();
            while($fila = $stmt->fetch(PDO::FETCH_ASSOC))
            {
                $filas[] = $fila;
            }
        }
        catch (PDOException $e)
        {
            echo "<br>error al mostrar la fila buscada <br>". $e->getMessage()."<br>";
        }
        finally {
            $stmt->closeCursor();
            if($cerrarConexion)
            {
                $this->conexion= null;
            }
        }
        return $filas;
    }
    
}

