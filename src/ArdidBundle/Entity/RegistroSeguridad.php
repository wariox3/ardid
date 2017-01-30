<?php

namespace ArdidBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="registro_seguridad")
 * @ORM\Entity(repositoryClass="ArdidBundle\Repository\RegistroSeguridadRepository")
 */
class RegistroSeguridad
{
    /**
     * @ORM\Id
     * @ORM\Column(name="codigo_registro_seguridad_pk", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $codigoRegistroSeguridadPk;   
    
    /**
     * @ORM\Column(name="codigo", length=20, nullable=true)
     */
    private $codigo; 
     
    /**
     * @ORM\Column(name="fecha", type="datetime", nullable=true)
     */
    private $fecha;
    
    /**
     * @ORM\Column(name="codigo_usuario_fk", type="integer", nullable=true)
     */
    private $codigoUsuarioFk;     
    
    /**
     * @ORM\Column(type="string", length=25)
     */
    private $username;    
    


    /**
     * Get codigoRegistroSeguridadPk
     *
     * @return integer
     */
    public function getCodigoRegistroSeguridadPk()
    {
        return $this->codigoRegistroSeguridadPk;
    }

    /**
     * Set codigo
     *
     * @param string $codigo
     *
     * @return RegistroSeguridad
     */
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;

        return $this;
    }

    /**
     * Get codigo
     *
     * @return string
     */
    public function getCodigo()
    {
        return $this->codigo;
    }

    /**
     * Set fecha
     *
     * @param \DateTime $fecha
     *
     * @return RegistroSeguridad
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
     * Set codigoUsuarioFk
     *
     * @param integer $codigoUsuarioFk
     *
     * @return RegistroSeguridad
     */
    public function setCodigoUsuarioFk($codigoUsuarioFk)
    {
        $this->codigoUsuarioFk = $codigoUsuarioFk;

        return $this;
    }

    /**
     * Get codigoUsuarioFk
     *
     * @return integer
     */
    public function getCodigoUsuarioFk()
    {
        return $this->codigoUsuarioFk;
    }

    /**
     * Set username
     *
     * @param string $username
     *
     * @return RegistroSeguridad
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }
}
