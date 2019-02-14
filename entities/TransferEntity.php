<?php
namespace entities;

class TransferEntity
{
    private $idtransferencia;
    private $beneficiario;
    private $num_cuenta_beneficiario;
    private $fecha_transferencia;
    private $concepto;
    private $cantidad;

    public function __construct($idtransferencia, $beneficiario, $num_cuenta_beneficiario, $fecha_transferencia, $concepto, $cantidad)
    {
        $this->idtransferencia = $idtransferencia;
        $this->beneficiario = $beneficiario;
        $this->num_cuenta_beneficiario = $num_cuenta_beneficiario;
        $this->fecha_transferencia = $fecha_transferencia;
        $this->concepto = $concepto;
        $this->cantidad = $cantidad;
    }
    
    
    /**
     * @return mixed
     */
    public function getConcepto()
    {
        return $this->concepto;
    }

    /**
     * @param mixed $concepto
     */
    public function setConcepto($concepto)
    {
        $this->concepto = $concepto;
    }

    /**
     * @return mixed
     */
    public function getIdtransferencia()
    {
        return $this->idtransferencia;
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
    public function getNum_cuenta_beneficiario()
    {
        return $this->num_cuenta_beneficiario;
    }

    /**
     * @return mixed
     */
    public function getFecha_transferencia()
    {
        return $this->fecha_transferencia;
    }

    /**
     * @return mixed
     */
    public function getCantidad()
    {
        return $this->cantidad;
    }

    /**
     * @param mixed $idtransferencia
     */
    public function setIdtransferencia($idtransferencia)
    {
        $this->idtransferencia = $idtransferencia;
    }

    /**
     * @param mixed $beneficiario
     */
    public function setBeneficiario($beneficiario)
    {
        $this->beneficiario = $beneficiario;
    }

    /**
     * @param mixed $num_cuenta_beneficiario
     */
    public function setNum_cuenta_beneficiario($num_cuenta_beneficiario)
    {
        $this->num_cuenta_beneficiario = $num_cuenta_beneficiario;
    }

    /**
     * @param mixed $fecha_transferencia
     */
    public function setFecha_transferencia($fecha_transferencia)
    {
        $this->fecha_transferencia = $fecha_transferencia;
    }

    /**
     * @param mixed $cantidad
     */
    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;
    }

}

