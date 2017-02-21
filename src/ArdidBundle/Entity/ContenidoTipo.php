<?php

namespace ArdidBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="contenido_tipo")
 * @ORM\Entity(repositoryClass="ArdidBundle\Repository\ContenidoTipoRepository")
 */
class ContenidoTipo {

    /**
     * @ORM\Id
     * @ORM\Column(name="codigo_contenido_tipo_pk", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $codigoContenidoTipoPk;

    /**
     * @ORM\Column(name="nombre", type="string", length=300, nullable=true)
     */
    private $nombre;

    /**
     * @ORM\Column(name="etiqueta", type="text", nullable=true)
     */
    private $etiqueta;

    /**
     * @ORM\OneToMany(targetEntity="Contenido", mappedBy="codigoContenidosTipoRel")
     */
    protected $codigoContenidoTipoRel;


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->codigoContenidoTipoRel = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get codigoContenidoTipoPk
     *
     * @return integer
     */
    public function getCodigoContenidoTipoPk()
    {
        return $this->codigoContenidoTipoPk;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return ContenidoTipo
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
     * Set etiqueta
     *
     * @param string $etiqueta
     *
     * @return ContenidoTipo
     */
    public function setEtiqueta($etiqueta)
    {
        $this->etiqueta = $etiqueta;

        return $this;
    }

    /**
     * Get etiqueta
     *
     * @return string
     */
    public function getEtiqueta()
    {
        return $this->etiqueta;
    }

    /**
     * Add codigoContenidoTipoRel
     *
     * @param \ArdidBundle\Entity\Contenido $codigoContenidoTipoRel
     *
     * @return ContenidoTipo
     */
    public function addCodigoContenidoTipoRel(\ArdidBundle\Entity\Contenido $codigoContenidoTipoRel)
    {
        $this->codigoContenidoTipoRel[] = $codigoContenidoTipoRel;

        return $this;
    }

    /**
     * Remove codigoContenidoTipoRel
     *
     * @param \ArdidBundle\Entity\Contenido $codigoContenidoTipoRel
     */
    public function removeCodigoContenidoTipoRel(\ArdidBundle\Entity\Contenido $codigoContenidoTipoRel)
    {
        $this->codigoContenidoTipoRel->removeElement($codigoContenidoTipoRel);
    }

    /**
     * Get codigoContenidoTipoRel
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCodigoContenidoTipoRel()
    {
        return $this->codigoContenidoTipoRel;
    }
}
