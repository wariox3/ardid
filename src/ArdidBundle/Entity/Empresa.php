<?php

namespace ArdidBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="empresa")
 * @ORM\Entity(repositoryClass="ArdidBundle\Repository\EmpresaRepository")
 */
class Empresa
{
    /**
     * @ORM\Id
     * @ORM\Column(name="codigo_empresa_pk", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $codigoEmpresaPk;       
        
    /**
     * @ORM\Column(name="nombre", type="string", length=60, nullable=true)
     */    
    private $nombre;
                   
     /**
     * @ORM\Column(name="nit", type="string", length=20, nullable=true)
     */    
    private $nit;
    
     /**
     * @ORM\Column(name="digito_verificacion", type="string", length=1, nullable=true)
     */    
    private $digitoVerificacion;
    
    /**
     * @ORM\OneToMany(targetEntity="Pago", mappedBy="empresaRel")
     */
    protected $pagosEmpresaRel; 
   

    /**
     * Get codigoEmpresaPk
     *
     * @return integer
     */
    public function getCodigoEmpresaPk()
    {
        return $this->codigoEmpresaPk;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Empresa
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
     * Set nit
     *
     * @param string $nit
     *
     * @return Empresa
     */
    public function setNit($nit)
    {
        $this->nit = $nit;

        return $this;
    }

    /**
     * Get nit
     *
     * @return string
     */
    public function getNit()
    {
        return $this->nit;
    }

    /**
     * Set digitoVerificacion
     *
     * @param string $digitoVerificacion
     *
     * @return Empresa
     */
    public function setDigitoVerificacion($digitoVerificacion)
    {
        $this->digitoVerificacion = $digitoVerificacion;

        return $this;
    }

    /**
     * Get digitoVerificacion
     *
     * @return string
     */
    public function getDigitoVerificacion()
    {
        return $this->digitoVerificacion;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->pagosEmpresaRel = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add pagosEmpresaRel
     *
     * @param \ArdidBundle\Entity\Pago $pagosEmpresaRel
     *
     * @return Empresa
     */
    public function addPagosEmpresaRel(\ArdidBundle\Entity\Pago $pagosEmpresaRel)
    {
        $this->pagosEmpresaRel[] = $pagosEmpresaRel;

        return $this;
    }

    /**
     * Remove pagosEmpresaRel
     *
     * @param \ArdidBundle\Entity\Pago $pagosEmpresaRel
     */
    public function removePagosEmpresaRel(\ArdidBundle\Entity\Pago $pagosEmpresaRel)
    {
        $this->pagosEmpresaRel->removeElement($pagosEmpresaRel);
    }

    /**
     * Get pagosEmpresaRel
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPagosEmpresaRel()
    {
        return $this->pagosEmpresaRel;
    }
}
