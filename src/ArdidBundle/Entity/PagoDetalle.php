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
     * @ORM\Column(name="codigo_pago_fk", type="integer")
     */
    private $codigoPagoFk; 
    
    /**
     * @ORM\Column(name="codigo_concepto_fk", type="integer")
     */
    private $codigoConceptoFk;
    
    /**
     * @ORM\Column(name="cncepto", type="integer")
     */
    private $concepto;
    
    /**
     * @ORM\Column(name="vr_pago", type="float")
     */
    private $vrPago = 0;     

    /**
     * @ORM\Column(name="operacion", type="integer")
     */
    private $operacion = 0;
    
    /**
     * @ORM\Column(name="vr_pago_neto", type="float")
     */
    private $vrNeto= 0;    
    
    /**
     * @ORM\Column(name="horas", type="float")
     */
    private $horas = 0;    
    
    
    /**
     * @ORM\Column(name="porcentaje", type="float")
     */
    private $porcentaje = 0;    
    
    /**
     * @ORM\Column(name="dias", type="integer")
     */
    private $dias = 0;                                   
    
    /**
     * @ORM\ManyToOne(targetEntity="Pago", inversedBy="pagosRel")
     * @ORM\JoinColumn(name="codigo_pago_fk", referencedColumnName="codigo_pago_pk")
     */
    protected $pagoRel;       

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
     * Set codigoPagoFk
     *
     * @param integer $codigoPagoFk
     *
     * @return PagoDetalle
     */
    public function setCodigoPagoFk($codigoPagoFk)
    {
        $this->codigoPagoFk = $codigoPagoFk;

        return $this;
    }

    /**
     * Get codigoPagoFk
     *
     * @return integer
     */
    public function getCodigoPagoFk()
    {
        return $this->codigoPagoFk;
    }

    /**
     * Set codigoConceptoFk
     *
     * @param integer $codigoConceptoFk
     *
     * @return PagoDetalle
     */
    public function setCodigoConceptoFk($codigoConceptoFk)
    {
        $this->codigoConceptoFk = $codigoConceptoFk;

        return $this;
    }

    /**
     * Get codigoConceptoFk
     *
     * @return integer
     */
    public function getCodigoConceptoFk()
    {
        return $this->codigoConceptoFk;
    }

    /**
     * Set concepto
     *
     * @param integer $concepto
     *
     * @return PagoDetalle
     */
    public function setConcepto($concepto)
    {
        $this->concepto = $concepto;

        return $this;
    }

    /**
     * Get concepto
     *
     * @return integer
     */
    public function getConcepto()
    {
        return $this->concepto;
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
     * Set vrNeto
     *
     * @param float $vrNeto
     *
     * @return PagoDetalle
     */
    public function setVrNeto($vrNeto)
    {
        $this->vrNeto = $vrNeto;

        return $this;
    }

    /**
     * Get vrNeto
     *
     * @return float
     */
    public function getVrNeto()
    {
        return $this->vrNeto;
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
     * Set porcentaje
     *
     * @param float $porcentaje
     *
     * @return PagoDetalle
     */
    public function setPorcentaje($porcentaje)
    {
        $this->porcentaje = $porcentaje;

        return $this;
    }

    /**
     * Get porcentaje
     *
     * @return float
     */
    public function getPorcentaje()
    {
        return $this->porcentaje;
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
     * Set pagoRel
     *
     * @param \ArdidBundle\Entity\Pago $pagoRel
     *
     * @return PagoDetalle
     */
    public function setPagoRel(\ArdidBundle\Entity\Pago $pagoRel = null)
    {
        $this->pagoRel = $pagoRel;

        return $this;
    }

    /**
     * Get pagoRel
     *
     * @return \ArdidBundle\Entity\Pago
     */
    public function getPagoRel()
    {
        return $this->pagoRel;
    }
}
