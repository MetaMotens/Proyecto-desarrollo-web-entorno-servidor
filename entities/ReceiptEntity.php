<?php
namespace entities;

class ReceiptEntity
{

    private $idrecibo;
    private $beneficiario;
    private $cantidad;
    
    public function __construct($idrecibo, $beneficiario, $cantidad)
    {
        $this->idrecibo = $idrecibo;
        $this->beneficiario = $beneficiario;
        $this->cantidad = $cantidad;
    }
    /**
     * @return mixed
     */
    public function getIdrecibo()
    {
        return $this->idrecibo;
    }

    /**
     * @return mixed
     */
    public function getBeneficiario()
    {
        return $this->beneficiario;
    }

    /**
     * @return mixed
     */
    public function getCantidad()
    {
        return $this->cantidad;
    }

    /**
     * @param mixed $idrecibo
     */
    public function setIdrecibo($idrecibo)
    {
        $this->idrecibo = $idrecibo;
    }

    /**
     * @param mixed $beneficiario
     */
    public function setBeneficiario($beneficiario)
    {
        $this->beneficiario = $beneficiario;
    }

    /**
     * @param mixed $cantidad
     */
    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;
    }

    
    
    
}

