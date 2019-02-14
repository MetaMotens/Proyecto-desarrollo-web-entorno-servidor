<?php
namespace models;
use PDO;
use PDOException;
use entities\UserEntity;

class UserModel extends BaseModel
{

    public function __construct()
    {
        parent::__construct();
    }
    
    public function conseguirUsuario($email, $cerrarconexion = true)
    {
        try
        {
            $sql = "select * from usuarios where email=:email";
            $stmt = $this->conexion->prepare($sql);
            $stmt->bindParam(":email", $email);
            $stmt->execute();
            if ($stmt->rowCount()>0)
            {
                if ($registro = $stmt->fetch(PDO::FETCH_ASSOC))
                {
                    $usuario = $registro;
                }
            }
            
        }
        catch (PDOException $e)
        {
            echo $e->getMessage();
        }
        finally
        {
            $stmt->closeCursor();
            if ($cerrarconexion)
            {
                $this->conexion=null;
            }
            return $usuario;
        } 
    }
    
    public function comprobarUsuario($passwd, $usuario)
    {
        $login = false;
        $passwdsalt = $usuario['passwd'];
        if(password_verify($passwd, $passwdsalt))
        {
            $login = true;
            $usuario = new UserEntity(null, $usuario['email'], $usuario['passwd'], $usuario['rol']);
        }
        return $login;
        
    }
    
    public function registrarUsuario($usuario, $cerrarconexion = true)
    {
        $registroOK = false;
        $email = $usuario->getEmail();
        $passwd = $usuario->getPasswd();
        $rol = $usuario->getRol();
        
        try
        {
            $sql = "insert into usuarios (email, passwd, rol) values (:email, :passwd, :rol)";
            $stmt = $this->conexion->prepare($sql);
            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":passwd", $passwd);
            $stmt->bindParam(":rol", $rol);
            $stmt->execute();
            
            if($stmt->rowCount()>0)
            {
                $registroOK = true;
            }
        }
        catch (PDOException $e)
        {
            echo $e->getMessage();
        }
        finally
        {
            $stmt->closeCursor();
            if ($cerrarconexion)
            {
                $this->conexion=null;
            }
            return $registroOK;
        }
    }
}

