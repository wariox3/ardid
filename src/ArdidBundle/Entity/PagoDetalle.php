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
     * @ORM\Column(name="codigo_empresa_fk", type="integer",nullable=true)
     */
    private $codigoEmpresaFk; 
    
    /**
     * @ORM\Column(name="codigo_numero_fk", type="integer",nullable=true)
     */
    private $numeroFk; 
    
    /**
     * @ORM\Column(name="codigo_concepto_fk", type="integer",nullable=true)
     */
    private $codigoConceptoFk;
    
    /**
     * @ORM\Column(name="concepto", type="string",nullable=true)
     */
    private $concepto;
    
    /**
     * @ORM\Column(name="vr_pago", type="float",nullable=true)
     */
    private $vrPago = 0;     

    /**
     * @ORM\Column(name="operacion", type="integer",nullable=true)
     */
    private $operacion = 0;
    
    /**
     * @ORM\Column(name="vr_pago_neto", type="float",nullable=true)
     */
    private $vrNeto= 0;    
    
    /**
     * @ORM\Column(name="horas", type="float",nullable=true)
     */
    private $horas = 0;    
    
    
    /**
     * @ORM\Column(name="porcentaje", type="float",nullable=true)
     */
    private $porcentaje = 0;    
    
    /**
     * @ORM\Column(name="dias", type="integer",nullable=true)
     */
    private $dias = 0;                                   
    
   
     /**
     * @ORM\ManyToOne(targetEntity="Empresa", inversedBy="pagosDetallesEmpresaRel")
     * @ORM\JoinColumn(name="codigo_empresa_fk", referencedColumnName="codigo_empresa_pk")
     */
    protected $empresaRel;    

   

    


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
     * Set codigoEmpresaFk
     *
     * @param integer $codigoEmpresaFk
     *
     * @return PagoDetalle
     */
    public function setCodigoEmpresaFk($codigoEmpresaFk)
    {
        $this->codigoEmpresaFk = $codigoEmpresaFk;

        return $this;
    }

    /**
     * Get codigoEmpresaFk
     *
     * @return integer
     */
    public function getCodigoEmpresaFk()
    {
        return $this->codigoEmpresaFk;
    }

    /**
     * Set numeroFk
     *
     * @param integer $numeroFk
     *
     * @return PagoDetalle
     */
    public function setNumeroFk($numeroFk)
    {
        $this->numeroFk = $numeroFk;

        return $this;
    }

    /**
     * Get numeroFk
     *
     * @return integer
     */
    public function getNumeroFk()
    {
        return $this->numeroFk;
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
     * Set empresaRel
     *
     * @param \ArdidBundle\Entity\Empresa $empresaRel
     *
     * @return PagoDetalle
     */
    public function setEmpresaRel(\ArdidBundle\Entity\Empresa $empresaRel = null)
    {
        $this->empresaRel = $empresaRel;

        return $this;
    }

    /**
     * Get empresaRel
     *
     * @return \ArdidBundle\Entity\Empresa
     */
    public function getEmpresaRel()
    {
        return $this->empresaRel;
    }
}
