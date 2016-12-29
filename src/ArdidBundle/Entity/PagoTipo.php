<?php

namespace ArdidBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="pago_tipo")
 * @ORM\Entity(repositoryClass="ArdidBundle\Repository\EmpleadoRepository")
 */
class PagoTipo
{
    /**
     * @ORM\Id
     * @ORM\Column(name="codigo_pago_tipo_pk", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $codigoPagoTipoPk;   
    
       /**
     * @ORM\Column(name="nombre", type="string", length=60, nullable=true)
     */    
    private $nombre;
    
    /**
     * @ORM\OneToMany(targetEntity="Pago", mappedBy="pagoTipoRel")
     */
    protected $pagosTipoRel;
   

    /**
     * Get codigoPagoTipoPk
     *
     * @return integer
     */
    public function getCodigoPagoTipoPk()
    {
        return $this->codigoPagoTipoPk;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return PagoTipo
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
     * Constructor
     */
    public function __construct()
    {
        $this->pagosTipoRel = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add pagosTipoRel
     *
     * @param \ArdidBundle\Entity\Pago $pagosTipoRel
     *
     * @return PagoTipo
     */
    public function addPagosTipoRel(\ArdidBundle\Entity\Pago $pagosTipoRel)
    {
        $this->pagosTipoRel[] = $pagosTipoRel;

        return $this;
    }

    /**
     * Remove pagosTipoRel
     *
     * @param \ArdidBundle\Entity\Pago $pagosTipoRel
     */
    public function removePagosTipoRel(\ArdidBundle\Entity\Pago $pagosTipoRel)
    {
        $this->pagosTipoRel->removeElement($pagosTipoRel);
    }

    /**
     * Get pagosTipoRel
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPagosTipoRel()
    {
        return $this->pagosTipoRel;
    }
}
