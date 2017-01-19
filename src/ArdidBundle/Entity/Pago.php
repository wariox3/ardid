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
     * @ORM\Column(name="cargo", type="string", nullable=true)
     */
    private $cargo;

    /**
     * @ORM\Column(name="centro_costos", type="string", nullable=true)
     */
    private $centroCostos;

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
     * @ORM\Column(name="salario", type="string", nullable=true)
     */
    private $salario;

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
     * Get codigoPagoPk
     *
     * @return integer
     */
    public function getCodigoPagoPk() {
        return $this->codigoPagoPk;
    }

    /**
     * Set codigoEmpresaFk
     *
     * @param integer $codigoEmpresaFk
     *
     * @return Pago
     */
    public function setCodigoEmpresaFk($codigoEmpresaFk) {
        $this->codigoEmpresaFk = $codigoEmpresaFk;

        return $this;
    }

    /**
     * Get codigoEmpresaFk
     *
     * @return integer
     */
    public function getCodigoEmpresaFk() {
        return $this->codigoEmpresaFk;
    }

    /**
     * Set codigoEmpleadoFk
     *
     * @param integer $codigoEmpleadoFk
     *
     * @return Pago
     */
    public function setCodigoEmpleadoFk($codigoEmpleadoFk) {
        $this->codigoEmpleadoFk = $codigoEmpleadoFk;

        return $this;
    }

    /**
     * Get codigoEmpleadoFk
     *
     * @return integer
     */
    public function getCodigoEmpleadoFk() {
        return $this->codigoEmpleadoFk;
    }

    /**
     * Set codigoPagoTipoFk
     *
     * @param integer $codigoPagoTipoFk
     *
     * @return Pago
     */
    public function setCodigoPagoTipoFk($codigoPagoTipoFk) {
        $this->codigoPagoTipoFk = $codigoPagoTipoFk;

        return $this;
    }

    /**
     * Get codigoPagoTipoFk
     *
     * @return integer
     */
    public function getCodigoPagoTipoFk() {
        return $this->codigoPagoTipoFk;
    }

    /**
     * Set cargo
     *
     * @param string $cargo
     *
     * @return Pago
     */
    public function setCargo($cargo) {
        $this->cargo = $cargo;

        return $this;
    }

    /**
     * Get cargo
     *
     * @return string
     */
    public function getCargo() {
        return $this->cargo;
    }

    /**
     * Set centroCostos
     *
     * @param string $centroCostos
     *
     * @return Pago
     */
    public function setCentroCostos($centroCostos) {
        $this->centroCostos = $centroCostos;

        return $this;
    }

    /**
     * Get centroCostos
     *
     * @return string
     */
    public function getCentroCostos() {
        return $this->centroCostos;
    }

    /**
     * Set zona
     *
     * @param string $zona
     *
     * @return Pago
     */
    public function setZona($zona) {
        $this->zona = $zona;

        return $this;
    }

    /**
     * Get zona
     *
     * @return string
     */
    public function getZona() {
        return $this->zona;
    }

    /**
     * Set periodoPago
     *
     * @param string $periodoPago
     *
     * @return Pago
     */
    public function setPeriodoPago($periodoPago) {
        $this->periodoPago = $periodoPago;

        return $this;
    }

    /**
     * Get periodoPago
     *
     * @return string
     */
    public function getPeriodoPago() {
        return $this->periodoPago;
    }

    /**
     * Set cuenta
     *
     * @param string $cuenta
     *
     * @return Pago
     */
    public function setCuenta($cuenta) {
        $this->cuenta = $cuenta;

        return $this;
    }

    /**
     * Get cuenta
     *
     * @return string
     */
    public function getCuenta() {
        return $this->cuenta;
    }

    /**
     * Set banco
     *
     * @param string $banco
     *
     * @return Pago
     */
    public function setBanco($banco) {
        $this->banco = $banco;

        return $this;
    }

    /**
     * Get banco
     *
     * @return string
     */
    public function getBanco() {
        return $this->banco;
    }

    /**
     * Set pension
     *
     * @param string $pension
     *
     * @return Pago
     */
    public function setPension($pension) {
        $this->pension = $pension;

        return $this;
    }

    /**
     * Get pension
     *
     * @return string
     */
    public function getPension() {
        return $this->pension;
    }

    /**
     * Set salud
     *
     * @param string $salud
     *
     * @return Pago
     */
    public function setSalud($salud) {
        $this->salud = $salud;

        return $this;
    }

    /**
     * Get salud
     *
     * @return string
     */
    public function getSalud() {
        return $this->salud;
    }

    /**
     * Set salario
     *
     * @param string $salario
     *
     * @return Pago
     */
    public function setSalario($salario) {
        $this->salario = $salario;

        return $this;
    }

    /**
     * Get salario
     *
     * @return string
     */
    public function getSalario() {
        return $this->salario;
    }

    /**
     * Set fechaDesde
     *
     * @param \DateTime $fechaDesde
     *
     * @return Pago
     */
    public function setFechaDesde($fechaDesde) {
        $this->fechaDesde = $fechaDesde;

        return $this;
    }

    /**
     * Get fechaDesde
     *
     * @return \DateTime
     */
    public function getFechaDesde() {
        return $this->fechaDesde;
    }

    /**
     * Set fechaHasta
     *
     * @param \DateTime $fechaHasta
     *
     * @return Pago
     */
    public function setFechaHasta($fechaHasta) {
        $this->fechaHasta = $fechaHasta;

        return $this;
    }

    /**
     * Get fechaHasta
     *
     * @return \DateTime
     */
    public function getFechaHasta() {
        return $this->fechaHasta;
    }

    /**
     * Set numero
     *
     * @param integer $numero
     *
     * @return Pago
     */
    public function setNumero($numero) {
        $this->numero = $numero;

        return $this;
    }

    /**
     * Get numero
     *
     * @return integer
     */
    public function getNumero() {
        return $this->numero;
    }

    /**
     * Set vrDeducciones
     *
     * @param float $vrDeducciones
     *
     * @return Pago
     */
    public function setVrDeducciones($vrDeducciones) {
        $this->vrDeducciones = $vrDeducciones;

        return $this;
    }

    /**
     * Get vrDeducciones
     *
     * @return float
     */
    public function getVrDeducciones() {
        return $this->vrDeducciones;
    }

    /**
     * Set vrNeto
     *
     * @param float $vrNeto
     *
     * @return Pago
     */
    public function setVrNeto($vrNeto) {
        $this->vrNeto = $vrNeto;

        return $this;
    }

    /**
     * Get vrNeto
     *
     * @return float
     */
    public function getVrNeto() {
        return $this->vrNeto;
    }

    /**
     * Set vrDevengado
     *
     * @param float $vrDevengado
     *
     * @return Pago
     */
    public function setVrDevengado($vrDevengado) {
        $this->vrDevengado = $vrDevengado;

        return $this;
    }

    /**
     * Get vrDevengado
     *
     * @return float
     */
    public function getVrDevengado() {
        return $this->vrDevengado;
    }

    /**
     * Set empresaRel
     *
     * @param \ArdidBundle\Entity\Empresa $empresaRel
     *
     * @return Pago
     */
    public function setEmpresaRel(\ArdidBundle\Entity\Empresa $empresaRel = null) {
        $this->empresaRel = $empresaRel;

        return $this;
    }

    /**
     * Get empresaRel
     *
     * @return \ArdidBundle\Entity\Empresa
     */
    public function getEmpresaRel() {
        return $this->empresaRel;
    }

    /**
     * Set empleadoRel
     *
     * @param \ArdidBundle\Entity\Empleado $empleadoRel
     *
     * @return Pago
     */
    public function setEmpleadoRel(\ArdidBundle\Entity\Empleado $empleadoRel = null) {
        $this->empleadoRel = $empleadoRel;

        return $this;
    }

    /**
     * Get empleadoRel
     *
     * @return \ArdidBundle\Entity\Empleado
     */
    public function getEmpleadoRel() {
        return $this->empleadoRel;
    }

    /**
     * Set pagoTipoRel
     *
     * @param \ArdidBundle\Entity\PagoTipo $pagoTipoRel
     *
     * @return Pago
     */
    public function setPagoTipoRel(\ArdidBundle\Entity\PagoTipo $pagoTipoRel = null) {
        $this->pagoTipoRel = $pagoTipoRel;

        return $this;
    }

    /**
     * Get pagoTipoRel
     *
     * @return \ArdidBundle\Entity\PagoTipo
     */
    public function getPagoTipoRel() {
        return $this->pagoTipoRel;
    }

}
