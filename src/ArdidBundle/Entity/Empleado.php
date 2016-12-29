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
     * @ORM\Column(name="codigo_identificacion_tipo_fk", type="integer")
     */
    private $codigoIdentificacionTipofk; 
     
    /**
     * @ORM\Column(name="numero_identifacion", type="integer", length=30)
     */
    private $numeroIdentificacion; 
    
    /**
     * @ORM\Column(name="nombre1", type="string", length=30, nullable=true)
     */    
    private $nombre1;
    
    /**
     * @ORM\Column(name="nombre2", type="string", length=30, nullable=true)
     */    
    private $nombre2;
    
    /**
     * @ORM\Column(name="apellido1", type="string", length=30, nullable=true)
     */    
    private $apellido1;
    
    /**
     * @ORM\Column(name="apellido2", type="string", length=30, nullable=true)
     */    
    private $apellido2;
    
     /**
     * @ORM\Column(name="nombre_corto", type="string", length=40, nullable=true)
     */    
    private $nombreCorto;
    
    /**
     * @ORM\OneToMany(targetEntity="Pago", mappedBy="empleadoRel")
     */
    protected $pagosEmpleadoRel;
    
  
    

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
     * Set codigoIdentificacionTipofk
     *
     * @param integer $codigoIdentificacionTipofk
     *
     * @return Empleado
     */
    public function setCodigoIdentificacionTipofk($codigoIdentificacionTipofk)
    {
        $this->codigoIdentificacionTipofk = $codigoIdentificacionTipofk;

        return $this;
    }

    /**
     * Get codigoIdentificacionTipofk
     *
     * @return integer
     */
    public function getCodigoIdentificacionTipofk()
    {
        return $this->codigoIdentificacionTipofk;
    }

    /**
     * Set numeroIdentificacion
     *
     * @param integer $numeroIdentificacion
     *
     * @return Empleado
     */
    public function setNumeroIdentificacion($numeroIdentificacion)
    {
        $this->numeroIdentificacion = $numeroIdentificacion;

        return $this;
    }

    /**
     * Get numeroIdentificacion
     *
     * @return integer
     */
    public function getNumeroIdentificacion()
    {
        return $this->numeroIdentificacion;
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
     * Constructor
     */
    public function __construct()
    {
        $this->pagosEmpleadoRel = new \Doctrine\Common\Collections\ArrayCollection();
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
}
