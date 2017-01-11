<?php

namespace ArdidBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Table(name="IdentifiacaionTipo")
 * @ORM\Entity(repositoryClass="ArdidBundle\Repository\IdentificacionTipoRepository")
 */
class IdentificacionTipo
{
    /**
     * @ORM\Id
     * @ORM\Column(name="codigo_identificacion_tipo_pk", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $identificacionTipoPk;    
    
        /**
     * @ORM\Column(name="nombre", type="string", length=60, nullable=true)
     */    
    private $nombre; 
    
    /**
     * @ORM\OneToMany(targetEntity="Empleado", mappedBy="identificacionTipoRel")
     */
    protected $empleadosIdentificacionTipoRel;
        

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->empleadosIdentificacionTipoRel = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get identificacionTipoPk
     *
     * @return integer
     */
    public function getIdentificacionTipoPk()
    {
        return $this->identificacionTipoPk;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return IdentificacionTipo
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Add empleadosIdentificacionTipoRel
     *
     * @param \ArdidBundle\Entity\Empleado $empleadosIdentificacionTipoRel
     *
     * @return IdentificacionTipo
     */
    public function addEmpleadosIdentificacionTipoRel(\ArdidBundle\Entity\Empleado $empleadosIdentificacionTipoRel)
    {
        $this->empleadosIdentificacionTipoRel[] = $empleadosIdentificacionTipoRel;

        return $this;
    }

    /**
     * Remove empleadosIdentificacionTipoRel
     *
     * @param \ArdidBundle\Entity\Empleado $empleadosIdentificacionTipoRel
     */
    public function removeEmpleadosIdentificacionTipoRel(\ArdidBundle\Entity\Empleado $empleadosIdentificacionTipoRel)
    {
        $this->empleadosIdentificacionTipoRel->removeElement($empleadosIdentificacionTipoRel);
    }

    /**
     * Get empleadosIdentificacionTipoRel
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEmpleadosIdentificacionTipoRel()
    {
        return $this->empleadosIdentificacionTipoRel;
    }
}
