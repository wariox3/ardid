<?php

namespace ArdidBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="pago_detalle")
 * @ORM\Entity(repositoryClass="ArdidBundle\Repository\PagoDetalleRepository")
 */
class PagoDetalle {

    /**
     * @ORM\Id
     * @ORM\Column(name="codigo_pago_detalle_pk", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $codigoPagoDetallePk;

    /**
     * @ORM\Column(name="codigo", type="integer",nullable=true)
     */
    private $codigo;    
    
    /**
     * @ORM\Column(name="codigo_empresa_fk", type="integer",nullable=true)
     */
    private $codigoEmpresaFk;

    /**
     * @ORM\Column(name="numero", type="integer",nullable=true)
     */
    private $numero;    
    
    /**
     * @ORM\Column(name="codigo_pago_fk", type="integer",nullable=true)
     */
    private $codigoPagoFk;

    /**
     * @ORM\Column(name="codigo_concepto_fk", type="integer",nullable=true)
     */
    private $codigoConceptoFk;

    /**
     * @ORM\Column(name="nombre_concepto", type="string",nullable=true)
     */
    private $nombreConcepto;

    /**
     * @ORM\Column(name="vr_pago", type="float",nullable=true)
     */
    private $vrPago = 0;

    /**
     * @ORM\Column(name="operacion", type="integer",nullable=true)
     */
    private $operacion = 0;

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
     * @ORM\Column(name="vr_hora", type="float",nullable=true)
     */
    private $vrHora = 0;

    /**
     * @ORM\ManyToOne(targetEntity="Empresa", inversedBy="pagosDetallesEmpresaRel")
     * @ORM\JoinColumn(name="codigo_empresa_fk", referencedColumnName="codigo_empresa_pk")
     */
    protected $empresaRel;

    /**
     * @ORM\ManyToOne(targetEntity="pago", inversedBy="pagosDetallesPagoRel")
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
     * Set codigo
     *
     * @param integer $codigo
     *
     * @return PagoDetalle
     */
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;

        return $this;
    }

    /**
     * Get codigo
     *
     * @return integer
     */
    public function getCodigo()
    {
        return $this->codigo;
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
     * Set nombreConcepto
     *
     * @param string $nombreConcepto
     *
     * @return PagoDetalle
     */
    public function setNombreConcepto($nombreConcepto)
    {
        $this->nombreConcepto = $nombreConcepto;

        return $this;
    }

    /**
     * Get nombreConcepto
     *
     * @return string
     */
    public function getNombreConcepto()
    {
        return $this->nombreConcepto;
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

    /**
     * Set pagoRel
     *
     * @param \ArdidBundle\Entity\pago $pagoRel
     *
     * @return PagoDetalle
     */
    public function setPagoRel(\ArdidBundle\Entity\pago $pagoRel = null)
    {
        $this->pagoRel = $pagoRel;

        return $this;
    }

    /**
     * Get pagoRel
     *
     * @return \ArdidBundle\Entity\pago
     */
    public function getPagoRel()
    {
        return $this->pagoRel;
    }

    /**
     * Set numero
     *
     * @param integer $numero
     *
     * @return PagoDetalle
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;

        return $this;
    }

    /**
     * Get numero
     *
     * @return integer
     */
    public function getNumero()
    {
        return $this->numero;
    }
}
