<?php
namespace entities;

class AccountEntity
{
    private $num_cuenta;
    private $titular_cuenta;
    private $direccion;
    private $dni;
    private $saldo;
    private $validado;
    
    public function __construct($num_cuenta, $titular_cuenta, $direccion, $dni, $saldo, $validado)
    {
        $this->num_cuenta = $num_cuenta;
        $this->titular_cuenta = $titular_cuenta;
        $this->direccion = $direccion;
        $this->dni = $dni;
        $this->saldo = $saldo;
        $this->validado = $validado;
    }
    
    
    /**
     * @return mixed
     */
    public function getValidado()
    {
        return $this->validado;
    }

    /**
     * @param mixed $validado
     */
    public function setValidado($validado)
    {
        $this->validado = $validado;
    }

    /**
     * @return mixed
     */
    public function getNum_cuenta()
    {
        return $this->num_cuenta;
    }

    /**
     * @return mixed
     */
    public function getTitular_cuenta()
    {
        return $this->titular_cuenta;
    }

    /**
     * @return mixed
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * @return mixed
     */
    public function getDni()
    {
        return $this->dni;
    }

    /**
     * @return mixed
     */
    public function getSaldo()
    {
        return $this->saldo;
    }

    /**
     * @param mixed $num_cuenta
     */
    public function setNum_cuenta($num_cuenta)
    {
        $this->num_cuenta = $num_cuenta;
    }

    /**
     * @param mixed $titular_cuenta
     */
    public function setTitular_cuenta($titular_cuenta)
    {
        $this->titular_cuenta = $titular_cuenta;
    }


    /**
     * @param mixed $direccion
     */
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;
    }

    /**
     * @param mixed $dni
     */
    public function setDni($dni)
    {
        $this->dni = $dni;
    }

    /**
     * @param mixed $saldo
     */
    public function setSaldo($saldo)
    {
        $this->saldo = $saldo;
    }

}

