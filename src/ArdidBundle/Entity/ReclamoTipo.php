<?php

namespace ArdidBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="reclamo_tipo")
 * @ORM\Entity(repositoryClass="ArdidBundle\Repository\ReclamoTipoRepository")
 */
class ReclamoTipo {

    /**
     * @ORM\Id
     * @ORM\Column(name="codigo_reclamo_tipo_pk", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $codigoReclamoTipoPk;

    /**
     * @ORM\Column(name="nombre", type="string", length=60, nullable=true)
     */
    private $nombre;

    /**
     * @ORM\OneToMany(targetEntity="Reclamo", mappedBy="reclamoTipoRel")
     */
    protected $reclamosTipoRel;
    

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->reclamosTipoRel = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get codigoReclamoTipoPk
     *
     * @return integer
     */
    public function getCodigoReclamoTipoPk()
    {
        return $this->codigoReclamoTipoPk;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return ReclamoTipo
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
     * Add reclamosTipoRel
     *
     * @param \ArdidBundle\Entity\Reclamo $reclamosTipoRel
     *
     * @return ReclamoTipo
     */
    public function addReclamosTipoRel(\ArdidBundle\Entity\Reclamo $reclamosTipoRel)
    {
        $this->reclamosTipoRel[] = $reclamosTipoRel;

        return $this;
    }

    /**
     * Remove reclamosTipoRel
     *
     * @param \ArdidBundle\Entity\Reclamo $reclamosTipoRel
     */
    public function removeReclamosTipoRel(\ArdidBundle\Entity\Reclamo $reclamosTipoRel)
    {
        $this->reclamosTipoRel->removeElement($reclamosTipoRel);
    }

    /**
     * Get reclamosTipoRel
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getReclamosTipoRel()
    {
        return $this->reclamosTipoRel;
    }
}
