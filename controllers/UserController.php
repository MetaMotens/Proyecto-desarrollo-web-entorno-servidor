<?php
namespace controllers;

use models\UserModel;
use helpers\Validaciones;
use entities\UserEntity;

class UserController
{

    public function __construct()
    {}
    
    public function mostrar()
    {
        require_once 'views/layout/content.php';
    }
    
    public function mostrarAcceso()
    {
        require_once 'views/layout/user/acceso.php';
    }
    
    public function mostrarRegistro()
    {
        require_once 'views/layout/user/registro.php';
    }
    
    public function login()
    {
        if (isset($_POST['btnlogin']))
        {
            $email = Validaciones::arreglarTextoEntrada($_POST['email']);
            $passwd = Validaciones::arreglarTextoEntrada($_POST['passwd']);
            
            //FALTA A�ADIR VALIDACION AQUI
            
            $usermodel = new UserModel();
            $usuario = $usermodel->conseguirUsuario($email);
            if($usermodel->comprobarUsuario($passwd, $usuario))
            {
                if(!isset($_SESSION))
                {
                    session_start();
                }
                $usuario = new UserEntity($usuario['idusuario'], $usuario['email'], $usuario['passwd'], $usuario['rol']);
                $_SESSION["usuario"] = $usuario;
                
                setcookie("bienvenida", "Bienvenido: " . $_SESSION['usuario']->getEmail(), time()+7200, "/");
                
                header("location: " . URL_BASE);
            }
            else
            {
                header("location: " . URL_BASE . "/user/mostraracceso&errorlogin");
            }
        }  
    }
    
    public function registro()
    {
        if (isset($_POST['btnregistro']))
        {
            $email = Validaciones::arreglarTextoEntrada($_POST['email']);
            $passwd = Validaciones::arreglarTextoEntrada($_POST['passwd']);
            $rol = $_POST['rol'];
            
            $passwdsalt = password_hash($passwd, PASSWORD_BCRYPT, ['cost'=>4]);
            $usuario = new UserEntity(null, $email, $passwdsalt, $rol);
            
            $usermodel = new UserModel();
            if($usermodel->registrarUsuario($usuario))
            {
                header("location: " . URL_BASE . "/user/mostrarregistro&ok");
            }
            else
            {
                header("location: " . URL_BASE . "/user/mostrarregistro&error");
            }
        } 
    }
    
    public function logout()
    {
        if (isset($_SESSION['usuario']))
        {
            unset($_SESSION['usuario']);
            header("Location:" .URL_BASE);
        }
        
    }
    
}

