<?php

namespace ArdidBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="empleado")
 * @ORM\Entity(repositoryClass="ArdidBundle\Repository\EmpleadoRepository")
 */
class Empleado
{
    /**
     * @ORM\Id
     * @ORM\Column(name="codigo_empleado_pk", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $codigoEmpleadoPk;   
    
    /**
     * @ORM\Column(name="codigo_identificacion_tipo_fk", length=2, nullable=true)
     */
    private $codigoIdentificacionTipoFk; 
     
    /**
     * @ORM\Column(name="identificacion_numero", type="integer", length=30)
     */
    private $identificacionNumero; 
    
    /**
     * @ORM\Column(name="nombre1", type="string", length=60, nullable=true)
     */    
    private $nombre1;
    
    /**
     * @ORM\Column(name="nombre2", type="string", length=60, nullable=true)
     */    
    private $nombre2;
    
    /**
     * @ORM\Column(name="apellido1", type="string", length=60, nullable=true)
     */    
    private $apellido1;
    
    /**
     * @ORM\Column(name="apellido2", type="string", length=60, nullable=true)
     */    
    private $apellido2;
    
     /**
     * @ORM\Column(name="nombre_corto", type="string", length=240, nullable=true)
     */    
    private $nombreCorto;
    
    /**
     * @ORM\OneToMany(targetEntity="Pago", mappedBy="empleadoRel")
     */
    protected $pagosEmpleadoRel;
    
    /**
     * @ORM\ManyToOne(targetEntity="IdentificacionTipo", inversedBy="empleadosIdentificacionTipoRel")
     * @ORM\JoinColumn(name="codigo_identificacion_tipo_fk", referencedColumnName="codigo_identificacion_tipo_pk")
     */
    protected $identificacionTipoRel;
   
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->pagosEmpleadoRel = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get codigoEmpleadoPk
     *
     * @return integer
     */
    public function getCodigoEmpleadoPk()
    {
        return $this->codigoEmpleadoPk;
    }

    /**
     * Set codigoIdentificacionTipoFk
     *
     * @param string $codigoIdentificacionTipoFk
     *
     * @return Empleado
     */
    public function setCodigoIdentificacionTipoFk($codigoIdentificacionTipoFk)
    {
        $this->codigoIdentificacionTipoFk = $codigoIdentificacionTipoFk;

        return $this;
    }

    /**
     * Get codigoIdentificacionTipoFk
     *
     * @return string
     */
    public function getCodigoIdentificacionTipoFk()
    {
        return $this->codigoIdentificacionTipoFk;
    }

    /**
     * Set identificacionNumero
     *
     * @param integer $identificacionNumero
     *
     * @return Empleado
     */
    public function setIdentificacionNumero($identificacionNumero)
    {
        $this->identificacionNumero = $identificacionNumero;

        return $this;
    }

    /**
     * Get identificacionNumero
     *
     * @return integer
     */
    public function getIdentificacionNumero()
    {
        return $this->identificacionNumero;
    }

    /**
     * Set nombre1
     *
     * @param string $nombre1
     *
     * @return Empleado
     */
    public function setNombre1($nombre1)
    {
        $this->nombre1 = $nombre1;

        return $this;
    }

    /**
     * Get nombre1
     *
     * @return string
     */
    public function getNombre1()
    {
        return $this->nombre1;
    }

    /**
     * Set nombre2
     *
     * @param string $nombre2
     *
     * @return Empleado
     */
    public function setNombre2($nombre2)
    {
        $this->nombre2 = $nombre2;

        return $this;
    }

    /**
     * Get nombre2
     *
     * @return string
     */
    public function getNombre2()
    {
        return $this->nombre2;
    }

    /**
     * Set apellido1
     *
     * @param string $apellido1
     *
     * @return Empleado
     */
    public function setApellido1($apellido1)
    {
        $this->apellido1 = $apellido1;

        return $this;
    }

    /**
     * Get apellido1
     *
     * @return string
     */
    public function getApellido1()
    {
        return $this->apellido1;
    }

    /**
     * Set apellido2
     *
     * @param string $apellido2
     *
     * @return Empleado
     */
    public function setApellido2($apellido2)
    {
        $this->apellido2 = $apellido2;

        return $this;
    }

    /**
     * Get apellido2
     *
     * @return string
     */
    public function getApellido2()
    {
        return $this->apellido2;
    }

    /**
     * Set nombreCorto
     *
     * @param string $nombreCorto
     *
     * @return Empleado
     */
    public function setNombreCorto($nombreCorto)
    {
        $this->nombreCorto = $nombreCorto;

        return $this;
    }

    /**
     * Get nombreCorto
     *
     * @return string
     */
    public function getNombreCorto()
    {
        return $this->nombreCorto;
    }

    /**
     * Add pagosEmpleadoRel
     *
     * @param \ArdidBundle\Entity\Pago $pagosEmpleadoRel
     *
     * @return Empleado
     */
    public function addPagosEmpleadoRel(\ArdidBundle\Entity\Pago $pagosEmpleadoRel)
    {
        $this->pagosEmpleadoRel[] = $pagosEmpleadoRel;

        return $this;
    }

    /**
     * Remove pagosEmpleadoRel
     *
     * @param \ArdidBundle\Entity\Pago $pagosEmpleadoRel
     */
    public function removePagosEmpleadoRel(\ArdidBundle\Entity\Pago $pagosEmpleadoRel)
    {
        $this->pagosEmpleadoRel->removeElement($pagosEmpleadoRel);
    }

    /**
     * Get pagosEmpleadoRel
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPagosEmpleadoRel()
    {
        return $this->pagosEmpleadoRel;
    }

    /**
     * Set identificacionTipoRel
     *
     * @param \ArdidBundle\Entity\IdentificacionTipo $identificacionTipoRel
     *
     * @return Empleado
     */
    public function setIdentificacionTipoRel(\ArdidBundle\Entity\IdentificacionTipo $identificacionTipoRel = null)
    {
        $this->identificacionTipoRel = $identificacionTipoRel;

        return $this;
    }

    /**
     * Get identificacionTipoRel
     *
     * @return \ArdidBundle\Entity\IdentificacionTipo
     */
    public function getIdentificacionTipoRel()
    {
        return $this->identificacionTipoRel;
    }
}
