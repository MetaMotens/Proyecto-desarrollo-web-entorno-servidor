<?php
namespace helpers;

class Utilidades
{
    public static function borrarSesion($nombre)
    {
        if(isset($_SESSION[$nombre]))
        {
            unset($_SESSION[$nombre]);
        }
    }
 
    public static function borrarCookie($nombre)
    {
        if(isset($_COOKIE[$nombre]))
        {
            setcookie($nombre, null, time()-1);
            unset($_COOKIE[$nombre]);
        }
    }
    
    public static function esAdmin()
    {
        $esadmin = false;
        if(isset($_SESSION['usuario']))
        {
            if(strcmp($_SESSION['usuario']->getRol(),"admin"))
            {
                $esadmin = false;
                $direccion = URL_BASE;
                echo $direccion;
                header("Location:".$direccion);
            }
            else{
            $esadmin = true;
            }
        }
        else{
            $esadmin = false;
            $direccion = URL_BASE;
            echo $direccion;
            header("Location:".$direccion);
        }
        return $esadmin;
    }
    
    public static function esUser()
    {
        $esuser = false;
        if(isset($_SESSION['usuario']))
        {
            if(strcmp($_SESSION['usuario']->getRol(),"User"))
            {
                $esuser = false;
                $direccion = URL_BASE;
                echo $direccion;
                header("Location:".$direccion);
            }
            else{
                $esuser = true;
            }
        }
        else{
            $esuser = false;
            $direccion = URL_BASE;
            echo $direccion;
            header("Location:".$direccion);
        }
        return $esuser;
    }

}

