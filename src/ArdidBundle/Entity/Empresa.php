<?php

namespace ArdidBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="empresa")
 * @ORM\Entity(repositoryClass="ArdidBundle\Repository\EmpresaRepository")
 */
class Empresa {

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
     * @ORM\Column(name="direccion", type="string", length=60, nullable=true)
     */
    private $direccion;

    /**
     * @ORM\Column(name="telefono", type="string", length=60, nullable=true)
     */
    private $telefono;

    /**
     * @ORM\Column(name="nit", type="string", length=20, nullable=true)
     */
    private $nit;

    /**
     * @ORM\Column(name="digito_verificacion", type="string", length=1, nullable=true)
     */
    private $digitoVerificacion;
    
    /**
     * @ORM\Column(name="abreviatura", type="string", length=60, nullable=true)
     */
    private $abreviatura;

    /**
     * @ORM\OneToMany(targetEntity="PagoDetalle", mappedBy="empresaRel")
     */
    protected $pagosDetallesEmpresaRel;

    /**
     * @ORM\OneToMany(targetEntity="Pago", mappedBy="empresaRel")
     */
    protected $pagosEmpresaRel;

    /**
     * @ORM\OneToMany(targetEntity="Contrato", mappedBy="empresaRel")
     */
    protected $contratosEmpresaRel;  
    
     /**
     * @ORM\OneToMany(targetEntity="Contenido", mappedBy="empresaRel")
     */
    protected $contenidoEmpresaRel;
    
    /**
     * @ORM\OneToMany(targetEntity="Reclamo", mappedBy="empresaRel")
     */
    protected $quejasReclamosEmpresaRel; 
    
    /**
     * @ORM\OneToMany(targetEntity="Programacion", mappedBy="empresaRel")
     */
    protected $programacionesEmpresaRel;    
   
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->pagosDetallesEmpresaRel = new \Doctrine\Common\Collections\ArrayCollection();
        $this->pagosEmpresaRel = new \Doctrine\Common\Collections\ArrayCollection();
        $this->contratosEmpresaRel = new \Doctrine\Common\Collections\ArrayCollection();
        $this->contenidoEmpresaRel = new \Doctrine\Common\Collections\ArrayCollection();
        $this->quejasReclamosEmpresaRel = new \Doctrine\Common\Collections\ArrayCollection();
    }

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
     * Set direccion
     *
     * @param string $direccion
     *
     * @return Empresa
     */
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;

        return $this;
    }

    /**
     * Get direccion
     *
     * @return string
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * Set telefono
     *
     * @param string $telefono
     *
     * @return Empresa
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;

        return $this;
    }

    /**
     * Get telefono
     *
     * @return string
     */
    public function getTelefono()
    {
        return $this->telefono;
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
     * Set abreviatura
     *
     * @param string $abreviatura
     *
     * @return Empresa
     */
    public function setAbreviatura($abreviatura)
    {
        $this->abreviatura = $abreviatura;

        return $this;
    }

    /**
     * Get abreviatura
     *
     * @return string
     */
    public function getAbreviatura()
    {
        return $this->abreviatura;
    }

    /**
     * Add pagosDetallesEmpresaRel
     *
     * @param \ArdidBundle\Entity\PagoDetalle $pagosDetallesEmpresaRel
     *
     * @return Empresa
     */
    public function addPagosDetallesEmpresaRel(\ArdidBundle\Entity\PagoDetalle $pagosDetallesEmpresaRel)
    {
        $this->pagosDetallesEmpresaRel[] = $pagosDetallesEmpresaRel;

        return $this;
    }

    /**
     * Remove pagosDetallesEmpresaRel
     *
     * @param \ArdidBundle\Entity\PagoDetalle $pagosDetallesEmpresaRel
     */
    public function removePagosDetallesEmpresaRel(\ArdidBundle\Entity\PagoDetalle $pagosDetallesEmpresaRel)
    {
        $this->pagosDetallesEmpresaRel->removeElement($pagosDetallesEmpresaRel);
    }

    /**
     * Get pagosDetallesEmpresaRel
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPagosDetallesEmpresaRel()
    {
        return $this->pagosDetallesEmpresaRel;
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

    /**
     * Add contratosEmpresaRel
     *
     * @param \ArdidBundle\Entity\Contrato $contratosEmpresaRel
     *
     * @return Empresa
     */
    public function addContratosEmpresaRel(\ArdidBundle\Entity\Contrato $contratosEmpresaRel)
    {
        $this->contratosEmpresaRel[] = $contratosEmpresaRel;

        return $this;
    }

    /**
     * Remove contratosEmpresaRel
     *
     * @param \ArdidBundle\Entity\Contrato $contratosEmpresaRel
     */
    public function removeContratosEmpresaRel(\ArdidBundle\Entity\Contrato $contratosEmpresaRel)
    {
        $this->contratosEmpresaRel->removeElement($contratosEmpresaRel);
    }

    /**
     * Get contratosEmpresaRel
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getContratosEmpresaRel()
    {
        return $this->contratosEmpresaRel;
    }

    /**
     * Add contenidoEmpresaRel
     *
     * @param \ArdidBundle\Entity\Contenido $contenidoEmpresaRel
     *
     * @return Empresa
     */
    public function addContenidoEmpresaRel(\ArdidBundle\Entity\Contenido $contenidoEmpresaRel)
    {
        $this->contenidoEmpresaRel[] = $contenidoEmpresaRel;

        return $this;
    }

    /**
     * Remove contenidoEmpresaRel
     *
     * @param \ArdidBundle\Entity\Contenido $contenidoEmpresaRel
     */
    public function removeContenidoEmpresaRel(\ArdidBundle\Entity\Contenido $contenidoEmpresaRel)
    {
        $this->contenidoEmpresaRel->removeElement($contenidoEmpresaRel);
    }

    /**
     * Get contenidoEmpresaRel
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getContenidoEmpresaRel()
    {
        return $this->contenidoEmpresaRel;
    }

    /**
     * Add quejasReclamosEmpresaRel
     *
     * @param \ArdidBundle\Entity\Reclamo $quejasReclamosEmpresaRel
     *
     * @return Empresa
     */
    public function addQuejasReclamosEmpresaRel(\ArdidBundle\Entity\Reclamo $quejasReclamosEmpresaRel)
    {
        $this->quejasReclamosEmpresaRel[] = $quejasReclamosEmpresaRel;

        return $this;
    }

    /**
     * Remove quejasReclamosEmpresaRel
     *
     * @param \ArdidBundle\Entity\Reclamo $quejasReclamosEmpresaRel
     */
    public function removeQuejasReclamosEmpresaRel(\ArdidBundle\Entity\Reclamo $quejasReclamosEmpresaRel)
    {
        $this->quejasReclamosEmpresaRel->removeElement($quejasReclamosEmpresaRel);
    }

    /**
     * Get quejasReclamosEmpresaRel
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getQuejasReclamosEmpresaRel()
    {
        return $this->quejasReclamosEmpresaRel;
    }

    /**
     * Add programacionesEmpresaRel
     *
     * @param \ArdidBundle\Entity\Programacion $programacionesEmpresaRel
     *
     * @return Empresa
     */
    public function addProgramacionesEmpresaRel(\ArdidBundle\Entity\Programacion $programacionesEmpresaRel)
    {
        $this->programacionesEmpresaRel[] = $programacionesEmpresaRel;

        return $this;
    }

    /**
     * Remove programacionesEmpresaRel
     *
     * @param \ArdidBundle\Entity\Programacion $programacionesEmpresaRel
     */
    public function removeProgramacionesEmpresaRel(\ArdidBundle\Entity\Programacion $programacionesEmpresaRel)
    {
        $this->programacionesEmpresaRel->removeElement($programacionesEmpresaRel);
    }

    /**
     * Get programacionesEmpresaRel
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProgramacionesEmpresaRel()
    {
        return $this->programacionesEmpresaRel;
    }
}
