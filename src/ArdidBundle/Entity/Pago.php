<?php

namespace ArdidBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="pago")
 * @ORM\Entity(repositoryClass="ArdidBundle\Repository\PagoRepository")
 */
class Pago
{
    /**
     * @ORM\Id
     * @ORM\Column(name="codigo_pago_pk", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $codigoPagoPk;   
    
    /**
     * @ORM\Column(name="codigo_empresa_fk", type="integer")
     */
    private $codigoEmpresaFk; 
     
    /**
     * @ORM\Column(name="codigo_empleado_fk", type="integer")
     */
    private $codigoEmpleadoFk; 
    
     /**
     * @ORM\Column(name="codigo_pago_tipo_fk", type="integer")
     */
    private $codigoPagoTipoFk; 
    
     /**
     * @ORM\Column(name="fecha_desde", type="date", nullable=true)
     */    
    private $fechaDesde;  
    
     /**
     * @ORM\Column(name="fecha_hasta", type="date", nullable=true)
     */    
    private $fechaHasta;  
    
    /**
     * @ORM\Column(name="numero", type="string", length=30, nullable=true)
     */    
    private $numero;
    
    /**
     * @ORM\Column(name="vr_deducciones", type="float")
     */
    private $vrDeducciones = 0;    
    
    /**
     * @ORM\Column(name="vr_neto", type="float")
     */
    private $vrNeto = 0;    
    
    /**
     * @ORM\Column(name="vr_devengado", type="float")
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
     * @ORM\JoinColumn(name="codigo_pago_tipo_Fk", referencedColumnName="codigo_pago_tipo_pk")
     */
    protected $pagoTipoRel;
    
    /**
     * @ORM\OneToMany(targetEntity="PagoDetalle", mappedBy="pagoRel")
     */
    protected $pagosRel; 
    

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
     * Set numero
     *
     * @param string $numero
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
     * @return string
     */
    public function getNumero()
    {
        return $this->numero;
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
     * Constructor
     */
    public function __construct()
    {
        $this->pagosRel = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add pagosRel
     *
     * @param \ArdidBundle\Entity\PagoDetalle $pagosRel
     *
     * @return Pago
     */
    public function addPagosRel(\ArdidBundle\Entity\PagoDetalle $pagosRel)
    {
        $this->pagosRel[] = $pagosRel;

        return $this;
    }

    /**
     * Remove pagosRel
     *
     * @param \ArdidBundle\Entity\PagoDetalle $pagosRel
     */
    public function removePagosRel(\ArdidBundle\Entity\PagoDetalle $pagosRel)
    {
        $this->pagosRel->removeElement($pagosRel);
    }

    /**
     * Get pagosRel
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPagosRel()
    {
        return $this->pagosRel;
    }
}
