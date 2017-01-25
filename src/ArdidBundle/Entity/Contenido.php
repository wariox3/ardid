<?php

namespace ArdidBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="contenido")
 * @ORM\Entity(repositoryClass="ArdidBundle\Repository\ContenidoRepository")
 */
class Contenido
{
    /**
     * @ORM\Id
     * @ORM\Column(name="codigo_contenido_pk", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $codigoContenidoPk;     

    /**
     * @ORM\Column(name="titulo", type="string", length=300, nullable=true)
     */    
    private $titulo;     
    
    /**
     * @ORM\Column(name="contenido", type="text", nullable=true)
     */    
    private $contenido;
    
    /**
     * @ORM\Column(name="codigo_formato_iso", type="string", length=300, nullable=true)
     */    
    private $codigoFormatoIso;
    
    /**
     * @ORM\Column(name="version", type="string", length=100, nullable=true)
     */    
    private $version;
    
    /**
     * @ORM\Column(name="fecha_version", type="date", nullable=true)
     */    
    private $fechaVersion;
       

    /**
     * Get codigoContenidoPk
     *
     * @return integer
     */
    public function getCodigoContenidoPk()
    {
        return $this->codigoContenidoPk;
    }

    /**
     * Set titulo
     *
     * @param string $titulo
     *
     * @return Contenido
     */
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;

        return $this;
    }

    /**
     * Get titulo
     *
     * @return string
     */
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * Set contenido
     *
     * @param string $contenido
     *
     * @return Contenido
     */
    public function setContenido($contenido)
    {
        $this->contenido = $contenido;

        return $this;
    }

    /**
     * Get contenido
     *
     * @return string
     */
    public function getContenido()
    {
        return $this->contenido;
    }

    /**
     * Set codigoFormatoIso
     *
     * @param string $codigoFormatoIso
     *
     * @return Contenido
     */
    public function setCodigoFormatoIso($codigoFormatoIso)
    {
        $this->codigoFormatoIso = $codigoFormatoIso;

        return $this;
    }

    /**
     * Get codigoFormatoIso
     *
     * @return string
     */
    public function getCodigoFormatoIso()
    {
        return $this->codigoFormatoIso;
    }

    /**
     * Set version
     *
     * @param string $version
     *
     * @return Contenido
     */
    public function setVersion($version)
    {
        $this->version = $version;

        return $this;
    }

    /**
     * Get version
     *
     * @return string
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * Set fechaVersion
     *
     * @param \DateTime $fechaVersion
     *
     * @return Contenido
     */
    public function setFechaVersion($fechaVersion)
    {
        $this->fechaVersion = $fechaVersion;

        return $this;
    }

    /**
     * Get fechaVersion
     *
     * @return \DateTime
     */
    public function getFechaVersion()
    {
        return $this->fechaVersion;
    }
}
