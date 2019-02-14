<?php
namespace entities;

class CardEntity
{
    private $num_tarjeta;
    private $fecha_inicio;
    private $fecha_fin;
    private $validado;
    
    public function __construct($num_tarjeta, $fecha_inicio, $fecha_fin, $validado)
    {
        $this->num_tarjeta = $num_tarjeta;
        $this->fecha_inicio = $fecha_inicio;
        $this->fecha_fin = $fecha_fin;
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
    public function getNum_tarjeta()
    {
        return $this->num_tarjeta;
    }

    /**
     * @return mixed
     */
    public function getFecha_inicio()
    {
        return $this->fecha_inicio;
    }

    /**
     * @return mixed
     */
    public function getFecha_fin()
    {
        return $this->fecha_fin;
    }

    /**
     * @param mixed $num_tarjeta
     */
    public function setNum_tarjeta($num_tarjeta)
    {
        $this->num_tarjeta = $num_tarjeta;
    }

    /**
     * @param mixed $fecha_inicio
     */
    public function setFecha_inicio($fecha_inicio)
    {
        $this->fecha_inicio = $fecha_inicio;
    }

    /**
     * @param mixed $fecha_fin
     */
    public function setFecha_fin($fecha_fin)
    {
        $this->fecha_fin = $fecha_fin;
    }

    
    
    
}

