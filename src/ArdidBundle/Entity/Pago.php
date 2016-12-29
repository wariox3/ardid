<?php

namespace ArdidBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="pago")
 * @ORM\Entity(repositoryClass="ArdidBundle\Repository\PagoRepository")
 */
class Pago
{
    /**
     * @ORM\Id
     * @ORM\Column(name="codigo_pago_pk", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $codigoPagoPk;   
    
     /**
     * @ORM\Column(name="codigo_empresa_fk", type="integer")
     */
    private $codigoEmpresafk; 
     
    /**
     * @ORM\Column(name="codigo_empleado_fk", type="integer")
     */
    private $codigoEmpleadofk; 
    
    /**
     * @ORM\Column(name="numero", type="string", length=30, nullable=true)
     */    
    private $numero;
    
    /**
     * @ORM\Column(name="vr_devengado", type="float")
     */
    private $vrDevengado = 0;    
    

    /**
     * Get codigoPagoPk
     *
     * @return integer
     */
    public function getCodigoPagoPk()
    {
        return $this->codigoPagoPk;
    }

    /**
     * Set codigoEmpresafk
     *
     * @param integer $codigoEmpresafk
     *
     * @return Pago
     */
    public function setCodigoEmpresafk($codigoEmpresafk)
    {
        $this->codigoEmpresafk = $codigoEmpresafk;

        return $this;
    }

    /**
     * Get codigoEmpresafk
     *
     * @return integer
     */
    public function getCodigoEmpresafk()
    {
        return $this->codigoEmpresafk;
    }

    /**
     * Set codigoEmpleadofk
     *
     * @param integer $codigoEmpleadofk
     *
     * @return Pago
     */
    public function setCodigoEmpleadofk($codigoEmpleadofk)
    {
        $this->codigoEmpleadofk = $codigoEmpleadofk;

        return $this;
    }

    /**
     * Get codigoEmpleadofk
     *
     * @return integer
     */
    public function getCodigoEmpleadofk()
    {
        return $this->codigoEmpleadofk;
    }

    /**
     * Set numero
     *
     * @param string $numero
     *
     * @return Pago
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;

        return $this;
    }

    /**
     * Get numero
     *
     * @return string
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * Set vrDevengado
     *
     * @param float $vrDevengado
     *
     * @return Pago
     */
    public function setVrDevengado($vrDevengado)
    {
        $this->vrDevengado = $vrDevengado;

        return $this;
    }

    /**
     * Get vrDevengado
     *
     * @return float
     */
    public function getVrDevengado()
    {
        return $this->vrDevengado;
    }
}
