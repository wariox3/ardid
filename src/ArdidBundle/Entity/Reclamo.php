<?php

namespace ArdidBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="reclamo")
 * @ORM\Entity(repositoryClass="ArdidBundle\Repository\ReclamoRepository")
 */
class Reclamo {

    /**
     * @ORM\Id
     * @ORM\Column(name="codigo_reclamo_pk", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $codigoReclamoPk;

    /**
     * @ORM\Column(name="codigo_empresa_fk", type="integer",nullable=true)
     */
    private $codigoEmpresaFk;

    /**
     * @ORM\Column(name="codigo_empleado_fk", type="integer",nullable=true)
     */
    private $codigoEmpleadoFk;

    /**
     * @ORM\Column(name="codigo_reclamo_tipo_fk", type="integer",nullable=true)
     */
    private $codigoReclamoTipoFk;
    
    /**
     * @ORM\Column(name="motivo", type="string", nullable=true)
     */
    private $motivo;

    /**
     * @ORM\Column(name="descripcion", type="string", nullable=true)
     */
    private $descripcion;

    /**
     * @ORM\Column(name="fecha_generacion", type="date", nullable=true)
     */
    private $fechaGeneracion;

    /**
     * @ORM\Column(name="fecha_atendido", type="date", nullable=true)
     */
    private $fechaAtendido;
    
    /**
     * @ORM\Column(name="fecha_respuesta", type="date", nullable=true)
     */
    private $fechaRespuesta;
    
     /**
     * @ORM\Column(name="estado_solucionado", type="boolean", nullable=true)
     */
    private $estado_solucionado;
    
     /**
     * @ORM\Column(name="estado_atendido", type="boolean", nullable=true)
     */
    private $estado_atendido;

    /**
     * @ORM\ManyToOne(targetEntity="ReclamoTipo", inversedBy="reclamosTipoRel")
     * @ORM\JoinColumn(name="codigo_reclamo_tipo_fk", referencedColumnName="codigo_reclamo_tipo_pk")
     */
    protected $reclamoTipoRel;

    /**
     * @ORM\ManyToOne(targetEntity="Empleado", inversedBy="reclamosEmpleadoRel")
     * @ORM\JoinColumn(name="codigo_empleado_fk", referencedColumnName="codigo_empleado_pk")
     */
    protected $empleadoRel;

    /**
     * @ORM\ManyToOne(targetEntity="Empresa", inversedBy="reclamosEmpresaRel")
     * @ORM\JoinColumn(name="codigo_empresa_fk", referencedColumnName="codigo_empresa_pk")
     */
    protected $empresaRel;
    
    /**
     * @ORM\OneToMany(targetEntity="ReclamoDetalle", mappedBy="reclamoDetalleRel")
     */
    protected $reclamosDetallesRel; 


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->reclamosDetallesRel = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get codigoReclamoPk
     *
     * @return integer
     */
    public function getCodigoReclamoPk()
    {
        return $this->codigoReclamoPk;
    }

    /**
     * Set codigoEmpresaFk
     *
     * @param integer $codigoEmpresaFk
     *
     * @return Reclamo
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
     * @return Reclamo
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
     * Set codigoReclamoTipoFk
     *
     * @param integer $codigoReclamoTipoFk
     *
     * @return Reclamo
     */
    public function setCodigoReclamoTipoFk($codigoReclamoTipoFk)
    {
        $this->codigoReclamoTipoFk = $codigoReclamoTipoFk;

        return $this;
    }

    /**
     * Get codigoReclamoTipoFk
     *
     * @return integer
     */
    public function getCodigoReclamoTipoFk()
    {
        return $this->codigoReclamoTipoFk;
    }

    /**
     * Set motivo
     *
     * @param string $motivo
     *
     * @return Reclamo
     */
    public function setMotivo($motivo)
    {
        $this->motivo = $motivo;

        return $this;
    }

    /**
     * Get motivo
     *
     * @return string
     */
    public function getMotivo()
    {
        return $this->motivo;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     *
     * @return Reclamo
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set fechaGeneracion
     *
     * @param \DateTime $fechaGeneracion
     *
     * @return Reclamo
     */
    public function setFechaGeneracion($fechaGeneracion)
    {
        $this->fechaGeneracion = $fechaGeneracion;

        return $this;
    }

    /**
     * Get fechaGeneracion
     *
     * @return \DateTime
     */
    public function getFechaGeneracion()
    {
        return $this->fechaGeneracion;
    }

    /**
     * Set fechaAtendido
     *
     * @param \DateTime $fechaAtendido
     *
     * @return Reclamo
     */
    public function setFechaAtendido($fechaAtendido)
    {
        $this->fechaAtendido = $fechaAtendido;

        return $this;
    }

    /**
     * Get fechaAtendido
     *
     * @return \DateTime
     */
    public function getFechaAtendido()
    {
        return $this->fechaAtendido;
    }

    /**
     * Set fechaRespuesta
     *
     * @param \DateTime $fechaRespuesta
     *
     * @return Reclamo
     */
    public function setFechaRespuesta($fechaRespuesta)
    {
        $this->fechaRespuesta = $fechaRespuesta;

        return $this;
    }

    /**
     * Get fechaRespuesta
     *
     * @return \DateTime
     */
    public function getFechaRespuesta()
    {
        return $this->fechaRespuesta;
    }

    /**
     * Set estadoSolucionado
     *
     * @param boolean $estadoSolucionado
     *
     * @return Reclamo
     */
    public function setEstadoSolucionado($estadoSolucionado)
    {
        $this->estado_solucionado = $estadoSolucionado;

        return $this;
    }

    /**
     * Get estadoSolucionado
     *
     * @return boolean
     */
    public function getEstadoSolucionado()
    {
        return $this->estado_solucionado;
    }

    /**
     * Set estadoAtendido
     *
     * @param boolean $estadoAtendido
     *
     * @return Reclamo
     */
    public function setEstadoAtendido($estadoAtendido)
    {
        $this->estado_atendido = $estadoAtendido;

        return $this;
    }

    /**
     * Get estadoAtendido
     *
     * @return boolean
     */
    public function getEstadoAtendido()
    {
        return $this->estado_atendido;
    }

    /**
     * Set reclamoTipoRel
     *
     * @param \ArdidBundle\Entity\ReclamoTipo $reclamoTipoRel
     *
     * @return Reclamo
     */
    public function setReclamoTipoRel(\ArdidBundle\Entity\ReclamoTipo $reclamoTipoRel = null)
    {
        $this->reclamoTipoRel = $reclamoTipoRel;

        return $this;
    }

    /**
     * Get reclamoTipoRel
     *
     * @return \ArdidBundle\Entity\ReclamoTipo
     */
    public function getReclamoTipoRel()
    {
        return $this->reclamoTipoRel;
    }

    /**
     * Set empleadoRel
     *
     * @param \ArdidBundle\Entity\Empleado $empleadoRel
     *
     * @return Reclamo
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
     * Set empresaRel
     *
     * @param \ArdidBundle\Entity\Empresa $empresaRel
     *
     * @return Reclamo
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
     * Add reclamosDetallesRel
     *
     * @param \ArdidBundle\Entity\ReclamoDetalle $reclamosDetallesRel
     *
     * @return Reclamo
     */
    public function addReclamosDetallesRel(\ArdidBundle\Entity\ReclamoDetalle $reclamosDetallesRel)
    {
        $this->reclamosDetallesRel[] = $reclamosDetallesRel;

        return $this;
    }

    /**
     * Remove reclamosDetallesRel
     *
     * @param \ArdidBundle\Entity\ReclamoDetalle $reclamosDetallesRel
     */
    public function removeReclamosDetallesRel(\ArdidBundle\Entity\ReclamoDetalle $reclamosDetallesRel)
    {
        $this->reclamosDetallesRel->removeElement($reclamosDetallesRel);
    }

    /**
     * Get reclamosDetallesRel
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getReclamosDetallesRel()
    {
        return $this->reclamosDetallesRel;
    }
}
