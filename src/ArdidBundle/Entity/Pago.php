<?php

namespace ArdidBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="pago")
 * @ORM\Entity(repositoryClass="ArdidBundle\Repository\PagoRepository")
 */
class Pago {

    /**
     * @ORM\Id
     * @ORM\Column(name="codigo_pago_pk", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $codigoPagoPk;

    /**
     * @ORM\Column(name="codigo_empresa_fk", type="integer",nullable=true)
     */
    private $codigoEmpresaFk;

    /**
     * @ORM\Column(name="codigo_empleado_fk", type="integer",nullable=true)
     */
    private $codigoEmpleadoFk;

    /**
     * @ORM\Column(name="codigo_pago_tipo_fk", type="integer",nullable=true)
     */
    private $codigoPagoTipoFk;

    /**
     * @ORM\Column(name="codigo_contrato", type="integer", nullable=true)
     */
    private $codigoContrato;     
    
    /**
     * @ORM\Column(name="codigo_soporte_pago_fk", type="integer", nullable=true)
     */
    private $codigoSoportePagoFk;    
    
    /**
     * @ORM\Column(name="cargo", type="string", nullable=true)
     */
    private $cargo;

    /**
     * @ORM\Column(name="grupo_pago", type="string", nullable=true)
     */
    private $grupoPago;

    /**
     * @ORM\Column(name="zona", type="string", nullable=true)
     */
    private $zona;

    /**
     * @ORM\Column(name="periodo_pago", type="string", nullable=true)
     */
    private $periodoPago;

    /**
     * @ORM\Column(name="cuenta", type="string", nullable=true)
     */
    private $cuenta;

    /**
     * @ORM\Column(name="banco", type="string", nullable=true)
     */
    private $banco;

    /**
     * @ORM\Column(name="pension", type="string", nullable=true)
     */
    private $pension;

    /**
     * @ORM\Column(name="salud", type="string", nullable=true)
     */
    private $salud;
    
    /**
     * @ORM\Column(name="vr_salario", type="float", nullable=true)
     */
    private $vrSalario = 0;    
    
    /**
     * @ORM\Column(name="fecha_desde", type="date", nullable=true)
     */
    private $fechaDesde;

    /**
     * @ORM\Column(name="fecha_hasta", type="date", nullable=true)
     */
    private $fechaHasta;

    /**
     * @ORM\Column(name="numero", type="integer", length=30, nullable=true)
     */
    private $numero;

    /**
     * @ORM\Column(name="vr_deducciones", type="float", nullable=true)
     */
    private $vrDeducciones = 0;

    /**
     * @ORM\Column(name="vr_neto", type="float", nullable=true)
     */
    private $vrNeto = 0;
    
     /**
     * @ORM\Column(name="vr_salario_empleado", type="float", nullable=true)
     */
    private $vrSalarioEmpleado = 0;

    /**
     * @ORM\Column(name="vr_devengado", type="float", nullable=true)
     */
    private $vrDevengado = 0;

    /**
     * @ORM\ManyToOne(targetEntity="Empresa", inversedBy="pagosEmpresaRel")
     * @ORM\JoinColumn(name="codigo_empresa_fk", referencedColumnName="codigo_empresa_pk")
     */
    protected $empresaRel;

    /**
     * @ORM\ManyToOne(targetEntity="Empleado", inversedBy="pagosEmpleadoRel")
     * @ORM\JoinColumn(name="codigo_empleado_fk", referencedColumnName="codigo_empleado_pk")
     */
    protected $empleadoRel;

    /**
     * @ORM\ManyToOne(targetEntity="PagoTipo", inversedBy="pagosTipoRel")
     * @ORM\JoinColumn(name="codigo_pago_tipo_fk", referencedColumnName="codigo_pago_tipo_pk")
     */
    protected $pagoTipoRel;
    
    /**
     * @ORM\OneToMany(targetEntity="PagoDetalle", mappedBy="pagoRel")
     */
    protected $pagosDetallesPagoRel;
    

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->pagosDetallesPagoRel = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get codigoPagoPk
     *
     * @return integer
     */
    public function getCodigoPagoPk()
    {
        return $this->codigoPagoPk;
    }

    /**
     * Set codigoEmpresaFk
     *
     * @param integer $codigoEmpresaFk
     *
     * @return Pago
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
     * Set codigoEmpleadoFk
     *
     * @param integer $codigoEmpleadoFk
     *
     * @return Pago
     */
    public function setCodigoEmpleadoFk($codigoEmpleadoFk)
    {
        $this->codigoEmpleadoFk = $codigoEmpleadoFk;

        return $this;
    }

    /**
     * Get codigoEmpleadoFk
     *
     * @return integer
     */
    public function getCodigoEmpleadoFk()
    {
        return $this->codigoEmpleadoFk;
    }

    /**
     * Set codigoPagoTipoFk
     *
     * @param integer $codigoPagoTipoFk
     *
     * @return Pago
     */
    public function setCodigoPagoTipoFk($codigoPagoTipoFk)
    {
        $this->codigoPagoTipoFk = $codigoPagoTipoFk;

        return $this;
    }

    /**
     * Get codigoPagoTipoFk
     *
     * @return integer
     */
    public function getCodigoPagoTipoFk()
    {
        return $this->codigoPagoTipoFk;
    }

    /**
     * Set codigoContrato
     *
     * @param integer $codigoContrato
     *
     * @return Pago
     */
    public function setCodigoContrato($codigoContrato)
    {
        $this->codigoContrato = $codigoContrato;

        return $this;
    }

    /**
     * Get codigoContrato
     *
     * @return integer
     */
    public function getCodigoContrato()
    {
        return $this->codigoContrato;
    }

    /**
     * Set cargo
     *
     * @param string $cargo
     *
     * @return Pago
     */
    public function setCargo($cargo)
    {
        $this->cargo = $cargo;

        return $this;
    }

    /**
     * Get cargo
     *
     * @return string
     */
    public function getCargo()
    {
        return $this->cargo;
    }

    /**
     * Set grupoPago
     *
     * @param string $grupoPago
     *
     * @return Pago
     */
    public function setGrupoPago($grupoPago)
    {
        $this->grupoPago = $grupoPago;

        return $this;
    }

    /**
     * Get grupoPago
     *
     * @return string
     */
    public function getGrupoPago()
    {
        return $this->grupoPago;
    }

    /**
     * Set zona
     *
     * @param string $zona
     *
     * @return Pago
     */
    public function setZona($zona)
    {
        $this->zona = $zona;

        return $this;
    }

    /**
     * Get zona
     *
     * @return string
     */
    public function getZona()
    {
        return $this->zona;
    }

    /**
     * Set periodoPago
     *
     * @param string $periodoPago
     *
     * @return Pago
     */
    public function setPeriodoPago($periodoPago)
    {
        $this->periodoPago = $periodoPago;

        return $this;
    }

    /**
     * Get periodoPago
     *
     * @return string
     */
    public function getPeriodoPago()
    {
        return $this->periodoPago;
    }

    /**
     * Set cuenta
     *
     * @param string $cuenta
     *
     * @return Pago
     */
    public function setCuenta($cuenta)
    {
        $this->cuenta = $cuenta;

        return $this;
    }

    /**
     * Get cuenta
     *
     * @return string
     */
    public function getCuenta()
    {
        return $this->cuenta;
    }

    /**
     * Set banco
     *
     * @param string $banco
     *
     * @return Pago
     */
    public function setBanco($banco)
    {
        $this->banco = $banco;

        return $this;
    }

    /**
     * Get banco
     *
     * @return string
     */
    public function getBanco()
    {
        return $this->banco;
    }

    /**
     * Set pension
     *
     * @param string $pension
     *
     * @return Pago
     */
    public function setPension($pension)
    {
        $this->pension = $pension;

        return $this;
    }

    /**
     * Get pension
     *
     * @return string
     */
    public function getPension()
    {
        return $this->pension;
    }

    /**
     * Set salud
     *
     * @param string $salud
     *
     * @return Pago
     */
    public function setSalud($salud)
    {
        $this->salud = $salud;

        return $this;
    }

    /**
     * Get salud
     *
     * @return string
     */
    public function getSalud()
    {
        return $this->salud;
    }

    /**
     * Set vrSalario
     *
     * @param float $vrSalario
     *
     * @return Pago
     */
    public function setVrSalario($vrSalario)
    {
        $this->vrSalario = $vrSalario;

        return $this;
    }

    /**
     * Get vrSalario
     *
     * @return float
     */
    public function getVrSalario()
    {
        return $this->vrSalario;
    }

    /**
     * Set fechaDesde
     *
     * @param \DateTime $fechaDesde
     *
     * @return Pago
     */
    public function setFechaDesde($fechaDesde)
    {
        $this->fechaDesde = $fechaDesde;

        return $this;
    }

    /**
     * Get fechaDesde
     *
     * @return \DateTime
     */
    public function getFechaDesde()
    {
        return $this->fechaDesde;
    }

    /**
     * Set fechaHasta
     *
     * @param \DateTime $fechaHasta
     *
     * @return Pago
     */
    public function setFechaHasta($fechaHasta)
    {
        $this->fechaHasta = $fechaHasta;

        return $this;
    }

    /**
     * Get fechaHasta
     *
     * @return \DateTime
     */
    public function getFechaHasta()
    {
        return $this->fechaHasta;
    }

    /**
     * Set numero
     *
     * @param integer $numero
     *
     * @return Pago
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

    /**
     * Set vrDeducciones
     *
     * @param float $vrDeducciones
     *
     * @return Pago
     */
    public function setVrDeducciones($vrDeducciones)
    {
        $this->vrDeducciones = $vrDeducciones;

        return $this;
    }

    /**
     * Get vrDeducciones
     *
     * @return float
     */
    public function getVrDeducciones()
    {
        return $this->vrDeducciones;
    }

    /**
     * Set vrNeto
     *
     * @param float $vrNeto
     *
     * @return Pago
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
     * Set vrSalarioEmpleado
     *
     * @param float $vrSalarioEmpleado
     *
     * @return Pago
     */
    public function setVrSalarioEmpleado($vrSalarioEmpleado)
    {
        $this->vrSalarioEmpleado = $vrSalarioEmpleado;

        return $this;
    }

    /**
     * Get vrSalarioEmpleado
     *
     * @return float
     */
    public function getVrSalarioEmpleado()
    {
        return $this->vrSalarioEmpleado;
    }

    /**
     * Set vrDevengado
     *
     * @param float $vrDevengado
     *
     * @return Pago
     */
    public function setVrDevengado($vrDevengado)
    {
        $this->vrDevengado = $vrDevengado;

        return $this;
    }

    /**
     * Get vrDevengado
     *
     * @return float
     */
    public function getVrDevengado()
    {
        return $this->vrDevengado;
    }

    /**
     * Set empresaRel
     *
     * @param \ArdidBundle\Entity\Empresa $empresaRel
     *
     * @return Pago
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
     * Set empleadoRel
     *
     * @param \ArdidBundle\Entity\Empleado $empleadoRel
     *
     * @return Pago
     */
    public function setEmpleadoRel(\ArdidBundle\Entity\Empleado $empleadoRel = null)
    {
        $this->empleadoRel = $empleadoRel;

        return $this;
    }

    /**
     * Get empleadoRel
     *
     * @return \ArdidBundle\Entity\Empleado
     */
    public function getEmpleadoRel()
    {
        return $this->empleadoRel;
    }

    /**
     * Set pagoTipoRel
     *
     * @param \ArdidBundle\Entity\PagoTipo $pagoTipoRel
     *
     * @return Pago
     */
    public function setPagoTipoRel(\ArdidBundle\Entity\PagoTipo $pagoTipoRel = null)
    {
        $this->pagoTipoRel = $pagoTipoRel;

        return $this;
    }

    /**
     * Get pagoTipoRel
     *
     * @return \ArdidBundle\Entity\PagoTipo
     */
    public function getPagoTipoRel()
    {
        return $this->pagoTipoRel;
    }

    /**
     * Add pagosDetallesPagoRel
     *
     * @param \ArdidBundle\Entity\PagoDetalle $pagosDetallesPagoRel
     *
     * @return Pago
     */
    public function addPagosDetallesPagoRel(\ArdidBundle\Entity\PagoDetalle $pagosDetallesPagoRel)
    {
        $this->pagosDetallesPagoRel[] = $pagosDetallesPagoRel;

        return $this;
    }

    /**
     * Remove pagosDetallesPagoRel
     *
     * @param \ArdidBundle\Entity\PagoDetalle $pagosDetallesPagoRel
     */
    public function removePagosDetallesPagoRel(\ArdidBundle\Entity\PagoDetalle $pagosDetallesPagoRel)
    {
        $this->pagosDetallesPagoRel->removeElement($pagosDetallesPagoRel);
    }

    /**
     * Get pagosDetallesPagoRel
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPagosDetallesPagoRel()
    {
        return $this->pagosDetallesPagoRel;
    }

    /**
     * Set codigoSoportePagoFk
     *
     * @param integer $codigoSoportePagoFk
     *
     * @return Pago
     */
    public function setCodigoSoportePagoFk($codigoSoportePagoFk)
    {
        $this->codigoSoportePagoFk = $codigoSoportePagoFk;

        return $this;
    }

    /**
     * Get codigoSoportePagoFk
     *
     * @return integer
     */
    public function getCodigoSoportePagoFk()
    {
        return $this->codigoSoportePagoFk;
    }
}
