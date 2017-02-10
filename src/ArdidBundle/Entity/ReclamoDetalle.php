<?php

namespace ArdidBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="reclamo_detalle")
 * @ORM\Entity(repositoryClass="ArdidBundle\Repository\ReclamoTipoRepository")
 */
class ReclamoDetalle {

    /**
     * @ORM\Id
     * @ORM\Column(name="codigo_detalle_reclamo_Pk", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $codigoDetalleReclamoPk;

    /**
     * @ORM\Column(name="codigo_reclamo_fk", type="integer",nullable=true)
     */
    private $codigoReclamoFk;
    
    /**
     * @ORM\Column(name="descripcion", type="string", length=60, nullable=true)
     */
    private $descripcion;

     /**
     * @ORM\Column(name="fecha", type="date", nullable=true)
     */
    private $fecha;
    
     /**
     * @ORM\ManyToOne(targetEntity="Reclamo", inversedBy="reclamosDetallesRel")
     * @ORM\JoinColumn(name="codigo_reclamo_fk", referencedColumnName="codigo_reclamo_pk")
     */
    protected $reclamoDetalleRel;
    

    

    /**
     * Get codigoDetalleReclamoPk
     *
     * @return integer
     */
    public function getCodigoDetalleReclamoPk()
    {
        return $this->codigoDetalleReclamoPk;
    }

    /**
     * Set codigoReclamoFk
     *
     * @param integer $codigoReclamoFk
     *
     * @return ReclamoDetalle
     */
    public function setCodigoReclamoFk($codigoReclamoFk)
    {
        $this->codigoReclamoFk = $codigoReclamoFk;

        return $this;
    }

    /**
     * Get codigoReclamoFk
     *
     * @return integer
     */
    public function getCodigoReclamoFk()
    {
        return $this->codigoReclamoFk;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     *
     * @return ReclamoDetalle
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
     * Set fecha
     *
     * @param \DateTime $fecha
     *
     * @return ReclamoDetalle
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get fecha
     *
     * @return \DateTime
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set reclamoDetalleRel
     *
     * @param \ArdidBundle\Entity\Reclamo $reclamoDetalleRel
     *
     * @return ReclamoDetalle
     */
    public function setReclamoDetalleRel(\ArdidBundle\Entity\Reclamo $reclamoDetalleRel = null)
    {
        $this->reclamoDetalleRel = $reclamoDetalleRel;

        return $this;
    }

    /**
     * Get reclamoDetalleRel
     *
     * @return \ArdidBundle\Entity\Reclamo
     */
    public function getReclamoDetalleRel()
    {
        return $this->reclamoDetalleRel;
    }
}
