<?php

namespace ArdidBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="pago_detalle")
 * @ORM\Entity(repositoryClass="ArdidBundle\Repository\PagoDetalleRepository")
 */
class PagoDetalle
{
    /**
     * @ORM\Id
     * @ORM\Column(name="codigo_pago_detalle_pk", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $codigoPagoDetallePk;           
    
    /**
     * @ORM\Column(name="vr_pago", type="float")
     */
    private $vrPago = 0;     

    /**
     * @ORM\Column(name="operacion", type="integer")
     */
    private $operacion = 0;
    
    /**
     * @ORM\Column(name="vr_pago_operado", type="float")
     */
    private $vrPagoOperado = 0;    
    
    /**
     * @ORM\Column(name="horas", type="float")
     */
    private $horas = 0;    
    
    /**
     * @ORM\Column(name="vr_hora", type="float")
     */
    private $vrHora = 0;     
    
    /**
     * @ORM\Column(name="porcentaje_aplicado", type="float")
     */
    private $porcentajeAplicado = 0;    
    
    /**
     * @ORM\Column(name="dias", type="integer")
     */
    private $dias = 0;                                   
    
    /**
     * @ORM\Column(name="vr_ingreso_base_cotizacion", type="float")
     */
    private $vrIngresoBaseCotizacion = 0;     

    /**
     * @ORM\Column(name="vr_ingreso_base_prestacion", type="float")
     */
    private $vrIngresoBasePrestacion = 0;               


    /**
     * Get codigoPagoDetallePk
     *
     * @return integer
     */
    public function getCodigoPagoDetallePk()
    {
        return $this->codigoPagoDetallePk;
    }

    /**
     * Set vrPago
     *
     * @param float $vrPago
     *
     * @return PagoDetalle
     */
    public function setVrPago($vrPago)
    {
        $this->vrPago = $vrPago;

        return $this;
    }

    /**
     * Get vrPago
     *
     * @return float
     */
    public function getVrPago()
    {
        return $this->vrPago;
    }

    /**
     * Set operacion
     *
     * @param integer $operacion
     *
     * @return PagoDetalle
     */
    public function setOperacion($operacion)
    {
        $this->operacion = $operacion;

        return $this;
    }

    /**
     * Get operacion
     *
     * @return integer
     */
    public function getOperacion()
    {
        return $this->operacion;
    }

    /**
     * Set vrPagoOperado
     *
     * @param float $vrPagoOperado
     *
     * @return PagoDetalle
     */
    public function setVrPagoOperado($vrPagoOperado)
    {
        $this->vrPagoOperado = $vrPagoOperado;

        return $this;
    }

    /**
     * Get vrPagoOperado
     *
     * @return float
     */
    public function getVrPagoOperado()
    {
        return $this->vrPagoOperado;
    }

    /**
     * Set horas
     *
     * @param float $horas
     *
     * @return PagoDetalle
     */
    public function setHoras($horas)
    {
        $this->horas = $horas;

        return $this;
    }

    /**
     * Get horas
     *
     * @return float
     */
    public function getHoras()
    {
        return $this->horas;
    }

    /**
     * Set vrHora
     *
     * @param float $vrHora
     *
     * @return PagoDetalle
     */
    public function setVrHora($vrHora)
    {
        $this->vrHora = $vrHora;

        return $this;
    }

    /**
     * Get vrHora
     *
     * @return float
     */
    public function getVrHora()
    {
        return $this->vrHora;
    }

    /**
     * Set porcentajeAplicado
     *
     * @param float $porcentajeAplicado
     *
     * @return PagoDetalle
     */
    public function setPorcentajeAplicado($porcentajeAplicado)
    {
        $this->porcentajeAplicado = $porcentajeAplicado;

        return $this;
    }

    /**
     * Get porcentajeAplicado
     *
     * @return float
     */
    public function getPorcentajeAplicado()
    {
        return $this->porcentajeAplicado;
    }

    /**
     * Set dias
     *
     * @param integer $dias
     *
     * @return PagoDetalle
     */
    public function setDias($dias)
    {
        $this->dias = $dias;

        return $this;
    }

    /**
     * Get dias
     *
     * @return integer
     */
    public function getDias()
    {
        return $this->dias;
    }

    /**
     * Set vrIngresoBaseCotizacion
     *
     * @param float $vrIngresoBaseCotizacion
     *
     * @return PagoDetalle
     */
    public function setVrIngresoBaseCotizacion($vrIngresoBaseCotizacion)
    {
        $this->vrIngresoBaseCotizacion = $vrIngresoBaseCotizacion;

        return $this;
    }

    /**
     * Get vrIngresoBaseCotizacion
     *
     * @return float
     */
    public function getVrIngresoBaseCotizacion()
    {
        return $this->vrIngresoBaseCotizacion;
    }

    /**
     * Set vrIngresoBasePrestacion
     *
     * @param float $vrIngresoBasePrestacion
     *
     * @return PagoDetalle
     */
    public function setVrIngresoBasePrestacion($vrIngresoBasePrestacion)
    {
        $this->vrIngresoBasePrestacion = $vrIngresoBasePrestacion;

        return $this;
    }

    /**
     * Get vrIngresoBasePrestacion
     *
     * @return float
     */
    public function getVrIngresoBasePrestacion()
    {
        return $this->vrIngresoBasePrestacion;
    }
}
