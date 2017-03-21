<?php

namespace ArdidBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="contrato")
 * @ORM\Entity(repositoryClass="ArdidBundle\Repository\ContratoRepository")
 */
class Contrato {

    /**
     * @ORM\Id
     * @ORM\Column(name="codigo_contrato_pk", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $codigoContratoPk;

    /**
     * @ORM\Column(name="codigo_empresa_fk", type="integer",nullable=true)
     */
    private $codigoEmpresaFk;

    /**
     * @ORM\Column(name="codigo", type="integer", nullable=true)
     */
    private $codigo;     
    
    /**
     * @ORM\Column(name="codigo_empleado_fk", type="integer", nullable=true)
     */
    private $codigoEmpleadoFk;

    /**
     * @ORM\Column(name="tipo", type="string", length=80, nullable=true)
     */
    private $tipo;                
    
    /**
     * @ORM\Column(name="numero", type="string", nullable=true)
     */
    private $numero;   

    /**
     * @ORM\Column(name="codigo_clase_fk", type="integer", nullable=true)
     */
    private $codigoClaseFk;

    /**
     * @ORM\Column(name="fecha_desde", type="date", nullable=true)
     */
    private $fechaDesde;

    /**
     * @ORM\Column(name="fecha_hasta", type="date", nullable=true)
     */
    private $fechaHasta;    
    
    /**
     * @ORM\Column(name="cargo", type="string", nullable=true)
     */
    private $cargo;
   
    /**
     * @ORM\Column(name="grupo_pago", type="string", nullable=true)
     */
    private $grupoPago;

    /**
     * @ORM\Column(name="vr_salario", type="float", nullable=true)
     */
    private $vrSalario = 0;          
    
    /**     
     * @ORM\Column(name="vigente", type="boolean")
     */    
    private $vigente = false;    

    /**     
     * @ORM\Column(name="auxilio_transporte", type="boolean")
     */    
    private $auxilioTransporte = false; 
    
    /**
     * @ORM\ManyToOne(targetEntity="Empresa", inversedBy="contratosEmpresaRel")
     * @ORM\JoinColumn(name="codigo_empresa_fk", referencedColumnName="codigo_empresa_pk")
     */
    protected $empresaRel;

    /**
     * @ORM\ManyToOne(targetEntity="Empleado", inversedBy="contratosEmpleadoRel")
     * @ORM\JoinColumn(name="codigo_empleado_fk", referencedColumnName="codigo_empleado_pk")
     */
    protected $empleadoRel;    
    



    /**
     * Get codigoContratoPk
     *
     * @return integer
     */
    public function getCodigoContratoPk()
    {
        return $this->codigoContratoPk;
    }

    /**
     * Set codigoEmpresaFk
     *
     * @param integer $codigoEmpresaFk
     *
     * @return Contrato
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
     * @return Contrato
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
     * Set tipo
     *
     * @param string $tipo
     *
     * @return Contrato
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;

        return $this;
    }

    /**
     * Get tipo
     *
     * @return string
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Set numero
     *
     * @param string $numero
     *
     * @return Contrato
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;

        return $this;
    }

    /**
     * Get numero
     *
     * @return string
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * Set codigo
     *
     * @param integer $codigo
     *
     * @return Contrato
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
     * Set codigoClaseFk
     *
     * @param integer $codigoClaseFk
     *
     * @return Contrato
     */
    public function setCodigoClaseFk($codigoClaseFk)
    {
        $this->codigoClaseFk = $codigoClaseFk;

        return $this;
    }

    /**
     * Get codigoClaseFk
     *
     * @return integer
     */
    public function getCodigoClaseFk()
    {
        return $this->codigoClaseFk;
    }

    /**
     * Set fechaDesde
     *
     * @param \DateTime $fechaDesde
     *
     * @return Contrato
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
     * @return Contrato
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
     * Set cargo
     *
     * @param string $cargo
     *
     * @return Contrato
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
     * @return Contrato
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
     * Set vrSalario
     *
     * @param float $vrSalario
     *
     * @return Contrato
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
     * Set vigente
     *
     * @param boolean $vigente
     *
     * @return Contrato
     */
    public function setVigente($vigente)
    {
        $this->vigente = $vigente;

        return $this;
    }

    /**
     * Get vigente
     *
     * @return boolean
     */
    public function getVigente()
    {
        return $this->vigente;
    }

    /**
     * Set empresaRel
     *
     * @param \ArdidBundle\Entity\Empresa $empresaRel
     *
     * @return Contrato
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
     * @return Contrato
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
     * Set identificador
     *
     * @param integer $identificador
     *
     * @return Contrato
     */
    public function setIdentificador($identificador)
    {
        $this->identificador = $identificador;

        return $this;
    }

    /**
     * Get identificador
     *
     * @return integer
     */
    public function getIdentificador()
    {
        return $this->identificador;
    }

    /**
     * Set auxilioTransporte
     *
     * @param boolean $auxilioTransporte
     *
     * @return Contrato
     */
    public function setAuxilioTransporte($auxilioTransporte)
    {
        $this->auxilioTransporte = $auxilioTransporte;

        return $this;
    }

    /**
     * Get auxilioTransporte
     *
     * @return boolean
     */
    public function getAuxilioTransporte()
    {
        return $this->auxilioTransporte;
    }
}
