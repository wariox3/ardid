<?php

namespace ArdidBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="reclamo_solucion")
 * @ORM\Entity(repositoryClass="ArdidBundle\Repository\ReclamoTipoRepository")
 */
class ReclamoSolucion {

    /**
     * @ORM\Id
     * @ORM\Column(name="codigo_reclamo_solucion_pk", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $codigoDetalleReclamoPk;

    /**
     * @ORM\Column(name="codigo_reclamo_fk", type="integer",nullable=true)
     */
    private $codigoReclamoFk;
    
    /**
     * @ORM\Column(name="solucion", type="string", length=60, nullable=true)
     */
    private $solucion;

     /**
     * @ORM\Column(name="fecha", type="date", nullable=true)
     */
    private $fecha;
    
     /**
     * @ORM\ManyToOne(targetEntity="Reclamo", inversedBy="reclamosSolucionRel")
     * @ORM\JoinColumn(name="codigo_reclamo_fk", referencedColumnName="codigo_reclamo_pk")
     */
    protected $reclamoSolucionRel;
    


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
     * @return ReclamoSolucion
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
     * Set solucion
     *
     * @param string $solucion
     *
     * @return ReclamoSolucion
     */
    public function setSolucion($solucion)
    {
        $this->solucion = $solucion;

        return $this;
    }

    /**
     * Get solucion
     *
     * @return string
     */
    public function getSolucion()
    {
        return $this->solucion;
    }

    /**
     * Set fecha
     *
     * @param \DateTime $fecha
     *
     * @return ReclamoSolucion
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
     * Set reclamoSolucionRel
     *
     * @param \ArdidBundle\Entity\Reclamo $reclamoSolucionRel
     *
     * @return ReclamoSolucion
     */
    public function setReclamoSolucionRel(\ArdidBundle\Entity\Reclamo $reclamoSolucionRel = null)
    {
        $this->reclamoSolucionRel = $reclamoSolucionRel;

        return $this;
    }

    /**
     * Get reclamoSolucionRel
     *
     * @return \ArdidBundle\Entity\Reclamo
     */
    public function getReclamoSolucionRel()
    {
        return $this->reclamoSolucionRel;
    }
}
