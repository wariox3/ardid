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
     * @ORM\Column(name="numero", type="integer")
     */    
    private $numero = 0;                 
    
    /**
     * @ORM\Column(name="fecha_desde", type="date", nullable=true)
     */    
    private $fechaDesde;    
    
    /**
     * @ORM\Column(name="fecha_hasta", type="date", nullable=true)
     */    
    private $fechaHasta;    

    /**
     * @ORM\Column(name="fecha_desde_pago", type="date", nullable=true)
     */    
    private $fechaDesdePago;    

    /**
     * @ORM\Column(name="fecha_hasta_pago", type="date", nullable=true)
     */    
    private $fechaHastaPago;    
    
    /**
     * @ORM\Column(name="vr_salario", type="float")
     */
    private $vrSalario = 0;        

    /**
     * Es el salario que tenia el empleado cuando se genero el pago
     * @ORM\Column(name="vr_salario_empleado", type="float")
     */
    private $vrSalarioEmpleado = 0;        
    
    /**
     * @ORM\Column(name="vr_devengado", type="float")
     */
    private $vrDevengado = 0;    

    /**
     * @ORM\Column(name="vr_deducciones", type="float")
     */
    private $vrDeducciones = 0;    
                      
    /**
     * @ORM\Column(name="vr_neto", type="float")
     */
    private $vrNeto = 0;    
    
    /**
     * @ORM\Column(name="vr_bruto", type="float")
     */
    private $vrBruto = 0;                                       
    
    /**
     * @ORM\Column(name="dias_periodo", type="integer")
     */
    private $diasPeriodo = 0;   

    /**
     * @ORM\Column(name="dias_laborados", type="integer")
     */
    private $diasLaborados = 0;
                  
    /**
     * @ORM\Column(name="comentarios", type="string", length=500, nullable=true)
     */    
    private $comentarios;        
    
    /**
     * @ORM\Column(name="dias_ausentismo", type="integer")
     */
    private $diasAusentismo = 0;         
       

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
     * Set numero
     *
     * @param integer $numero
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
     * @return integer
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * Set fechaDesde
     *
     * @param \DateTime $fechaDesde
     *
     * @return Pago
     */
    public function setFechaDesde($fechaDesde)
    {
        $this->fechaDesde = $fechaDesde;

        return $this;
    }

    /**
     * Get fechaDesde
     *
     * @return \DateTime
     */
    public function getFechaDesde()
    {
        return $this->fechaDesde;
    }

    /**
     * Set fechaHasta
     *
     * @param \DateTime $fechaHasta
     *
     * @return Pago
     */
    public function setFechaHasta($fechaHasta)
    {
        $this->fechaHasta = $fechaHasta;

        return $this;
    }

    /**
     * Get fechaHasta
     *
     * @return \DateTime
     */
    public function getFechaHasta()
    {
        return $this->fechaHasta;
    }

    /**
     * Set fechaDesdePago
     *
     * @param \DateTime $fechaDesdePago
     *
     * @return Pago
     */
    public function setFechaDesdePago($fechaDesdePago)
    {
        $this->fechaDesdePago = $fechaDesdePago;

        return $this;
    }

    /**
     * Get fechaDesdePago
     *
     * @return \DateTime
     */
    public function getFechaDesdePago()
    {
        return $this->fechaDesdePago;
    }

    /**
     * Set fechaHastaPago
     *
     * @param \DateTime $fechaHastaPago
     *
     * @return Pago
     */
    public function setFechaHastaPago($fechaHastaPago)
    {
        $this->fechaHastaPago = $fechaHastaPago;

        return $this;
    }

    /**
     * Get fechaHastaPago
     *
     * @return \DateTime
     */
    public function getFechaHastaPago()
    {
        return $this->fechaHastaPago;
    }

    /**
     * Set vrSalario
     *
     * @param float $vrSalario
     *
     * @return Pago
     */
    public function setVrSalario($vrSalario)
    {
        $this->vrSalario = $vrSalario;

        return $this;
    }

    /**
     * Get vrSalario
     *
     * @return float
     */
    public function getVrSalario()
    {
        return $this->vrSalario;
    }

    /**
     * Set vrSalarioEmpleado
     *
     * @param float $vrSalarioEmpleado
     *
     * @return Pago
     */
    public function setVrSalarioEmpleado($vrSalarioEmpleado)
    {
        $this->vrSalarioEmpleado = $vrSalarioEmpleado;

        return $this;
    }

    /**
     * Get vrSalarioEmpleado
     *
     * @return float
     */
    public function getVrSalarioEmpleado()
    {
        return $this->vrSalarioEmpleado;
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

    /**
     * Set vrDeducciones
     *
     * @param float $vrDeducciones
     *
     * @return Pago
     */
    public function setVrDeducciones($vrDeducciones)
    {
        $this->vrDeducciones = $vrDeducciones;

        return $this;
    }

    /**
     * Get vrDeducciones
     *
     * @return float
     */
    public function getVrDeducciones()
    {
        return $this->vrDeducciones;
    }

    /**
     * Set vrNeto
     *
     * @param float $vrNeto
     *
     * @return Pago
     */
    public function setVrNeto($vrNeto)
    {
        $this->vrNeto = $vrNeto;

        return $this;
    }

    /**
     * Get vrNeto
     *
     * @return float
     */
    public function getVrNeto()
    {
        return $this->vrNeto;
    }

    /**
     * Set vrBruto
     *
     * @param float $vrBruto
     *
     * @return Pago
     */
    public function setVrBruto($vrBruto)
    {
        $this->vrBruto = $vrBruto;

        return $this;
    }

    /**
     * Get vrBruto
     *
     * @return float
     */
    public function getVrBruto()
    {
        return $this->vrBruto;
    }

    /**
     * Set diasPeriodo
     *
     * @param integer $diasPeriodo
     *
     * @return Pago
     */
    public function setDiasPeriodo($diasPeriodo)
    {
        $this->diasPeriodo = $diasPeriodo;

        return $this;
    }

    /**
     * Get diasPeriodo
     *
     * @return integer
     */
    public function getDiasPeriodo()
    {
        return $this->diasPeriodo;
    }

    /**
     * Set diasLaborados
     *
     * @param integer $diasLaborados
     *
     * @return Pago
     */
    public function setDiasLaborados($diasLaborados)
    {
        $this->diasLaborados = $diasLaborados;

        return $this;
    }

    /**
     * Get diasLaborados
     *
     * @return integer
     */
    public function getDiasLaborados()
    {
        return $this->diasLaborados;
    }

    /**
     * Set comentarios
     *
     * @param string $comentarios
     *
     * @return Pago
     */
    public function setComentarios($comentarios)
    {
        $this->comentarios = $comentarios;

        return $this;
    }

    /**
     * Get comentarios
     *
     * @return string
     */
    public function getComentarios()
    {
        return $this->comentarios;
    }

    /**
     * Set diasAusentismo
     *
     * @param integer $diasAusentismo
     *
     * @return Pago
     */
    public function setDiasAusentismo($diasAusentismo)
    {
        $this->diasAusentismo = $diasAusentismo;

        return $this;
    }

    /**
     * Get diasAusentismo
     *
     * @return integer
     */
    public function getDiasAusentismo()
    {
        return $this->diasAusentismo;
    }
}
