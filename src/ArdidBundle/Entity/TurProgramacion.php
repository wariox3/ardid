<?php

namespace ArdidBundle\Entity;

/**
 * TurProgramacion
 */
class TurProgramacion
{
    /**
     * @var integer
     */
    private $codigoProgramacionPk;

    /**
     * @var integer
     */
    private $codigoEmpresaFk;

    /**
     * @var integer
     */
    private $codigoSoportePagoFk;

    /**
     * @var string
     */
    private $dia1;

    /**
     * @var string
     */
    private $dia2;

    /**
     * @var string
     */
    private $dia3;

    /**
     * @var string
     */
    private $dia4;

    /**
     * @var string
     */
    private $dia5;

    /**
     * @var string
     */
    private $dia6;

    /**
     * @var string
     */
    private $dia7;

    /**
     * @var string
     */
    private $dia8;

    /**
     * @var string
     */
    private $dia9;

    /**
     * @var string
     */
    private $dia10;

    /**
     * @var string
     */
    private $dia11;

    /**
     * @var string
     */
    private $dia12;

    /**
     * @var string
     */
    private $dia13;

    /**
     * @var string
     */
    private $dia14;

    /**
     * @var string
     */
    private $dia15;

    /**
     * @var string
     */
    private $dia16;

    /**
     * @var string
     */
    private $dia17;

    /**
     * @var string
     */
    private $dia18;

    /**
     * @var string
     */
    private $dia19;

    /**
     * @var string
     */
    private $dia20;

    /**
     * @var string
     */
    private $dia21;

    /**
     * @var string
     */
    private $dia22;

    /**
     * @var string
     */
    private $dia23;

    /**
     * @var string
     */
    private $dia24;

    /**
     * @var string
     */
    private $dia25;

    /**
     * @var string
     */
    private $dia26;

    /**
     * @var string
     */
    private $dia27;

    /**
     * @var string
     */
    private $dia28;

    /**
     * @var string
     */
    private $dia29;

    /**
     * @var string
     */
    private $dia30;

    /**
     * @var string
     */
    private $dia31;

    /**
     * @var \ArdidBundle\Entity\Empresa
     */
    private $empresaRel;


    /**
     * Get codigoProgramacionPk
     *
     * @return integer
     */
    public function getCodigoProgramacionPk()
    {
        return $this->codigoProgramacionPk;
    }

    /**
     * Set codigoEmpresaFk
     *
     * @param integer $codigoEmpresaFk
     *
     * @return TurProgramacion
     */
    public function setCodigoEmpresaFk($codigoEmpresaFk)
    {
        $this->codigoEmpresaFk = $codigoEmpresaFk;

        return $this;
    }

    /**
     * Get codigoEmpresaFk
     *
     * @return integer
     */
    public function getCodigoEmpresaFk()
    {
        return $this->codigoEmpresaFk;
    }

    /**
     * Set codigoSoportePagoFk
     *
     * @param integer $codigoSoportePagoFk
     *
     * @return TurProgramacion
     */
    public function setCodigoSoportePagoFk($codigoSoportePagoFk)
    {
        $this->codigoSoportePagoFk = $codigoSoportePagoFk;

        return $this;
    }

    /**
     * Get codigoSoportePagoFk
     *
     * @return integer
     */
    public function getCodigoSoportePagoFk()
    {
        return $this->codigoSoportePagoFk;
    }

    /**
     * Set dia1
     *
     * @param string $dia1
     *
     * @return TurProgramacion
     */
    public function setDia1($dia1)
    {
        $this->dia1 = $dia1;

        return $this;
    }

    /**
     * Get dia1
     *
     * @return string
     */
    public function getDia1()
    {
        return $this->dia1;
    }

    /**
     * Set dia2
     *
     * @param string $dia2
     *
     * @return TurProgramacion
     */
    public function setDia2($dia2)
    {
        $this->dia2 = $dia2;

        return $this;
    }

    /**
     * Get dia2
     *
     * @return string
     */
    public function getDia2()
    {
        return $this->dia2;
    }

    /**
     * Set dia3
     *
     * @param string $dia3
     *
     * @return TurProgramacion
     */
    public function setDia3($dia3)
    {
        $this->dia3 = $dia3;

        return $this;
    }

    /**
     * Get dia3
     *
     * @return string
     */
    public function getDia3()
    {
        return $this->dia3;
    }

    /**
     * Set dia4
     *
     * @param string $dia4
     *
     * @return TurProgramacion
     */
    public function setDia4($dia4)
    {
        $this->dia4 = $dia4;

        return $this;
    }

    /**
     * Get dia4
     *
     * @return string
     */
    public function getDia4()
    {
        return $this->dia4;
    }

    /**
     * Set dia5
     *
     * @param string $dia5
     *
     * @return TurProgramacion
     */
    public function setDia5($dia5)
    {
        $this->dia5 = $dia5;

        return $this;
    }

    /**
     * Get dia5
     *
     * @return string
     */
    public function getDia5()
    {
        return $this->dia5;
    }

    /**
     * Set dia6
     *
     * @param string $dia6
     *
     * @return TurProgramacion
     */
    public function setDia6($dia6)
    {
        $this->dia6 = $dia6;

        return $this;
    }

    /**
     * Get dia6
     *
     * @return string
     */
    public function getDia6()
    {
        return $this->dia6;
    }

    /**
     * Set dia7
     *
     * @param string $dia7
     *
     * @return TurProgramacion
     */
    public function setDia7($dia7)
    {
        $this->dia7 = $dia7;

        return $this;
    }

    /**
     * Get dia7
     *
     * @return string
     */
    public function getDia7()
    {
        return $this->dia7;
    }

    /**
     * Set dia8
     *
     * @param string $dia8
     *
     * @return TurProgramacion
     */
    public function setDia8($dia8)
    {
        $this->dia8 = $dia8;

        return $this;
    }

    /**
     * Get dia8
     *
     * @return string
     */
    public function getDia8()
    {
        return $this->dia8;
    }

    /**
     * Set dia9
     *
     * @param string $dia9
     *
     * @return TurProgramacion
     */
    public function setDia9($dia9)
    {
        $this->dia9 = $dia9;

        return $this;
    }

    /**
     * Get dia9
     *
     * @return string
     */
    public function getDia9()
    {
        return $this->dia9;
    }

    /**
     * Set dia10
     *
     * @param string $dia10
     *
     * @return TurProgramacion
     */
    public function setDia10($dia10)
    {
        $this->dia10 = $dia10;

        return $this;
    }

    /**
     * Get dia10
     *
     * @return string
     */
    public function getDia10()
    {
        return $this->dia10;
    }

    /**
     * Set dia11
     *
     * @param string $dia11
     *
     * @return TurProgramacion
     */
    public function setDia11($dia11)
    {
        $this->dia11 = $dia11;

        return $this;
    }

    /**
     * Get dia11
     *
     * @return string
     */
    public function getDia11()
    {
        return $this->dia11;
    }

    /**
     * Set dia12
     *
     * @param string $dia12
     *
     * @return TurProgramacion
     */
    public function setDia12($dia12)
    {
        $this->dia12 = $dia12;

        return $this;
    }

    /**
     * Get dia12
     *
     * @return string
     */
    public function getDia12()
    {
        return $this->dia12;
    }

    /**
     * Set dia13
     *
     * @param string $dia13
     *
     * @return TurProgramacion
     */
    public function setDia13($dia13)
    {
        $this->dia13 = $dia13;

        return $this;
    }

    /**
     * Get dia13
     *
     * @return string
     */
    public function getDia13()
    {
        return $this->dia13;
    }

    /**
     * Set dia14
     *
     * @param string $dia14
     *
     * @return TurProgramacion
     */
    public function setDia14($dia14)
    {
        $this->dia14 = $dia14;

        return $this;
    }

    /**
     * Get dia14
     *
     * @return string
     */
    public function getDia14()
    {
        return $this->dia14;
    }

    /**
     * Set dia15
     *
     * @param string $dia15
     *
     * @return TurProgramacion
     */
    public function setDia15($dia15)
    {
        $this->dia15 = $dia15;

        return $this;
    }

    /**
     * Get dia15
     *
     * @return string
     */
    public function getDia15()
    {
        return $this->dia15;
    }

    /**
     * Set dia16
     *
     * @param string $dia16
     *
     * @return TurProgramacion
     */
    public function setDia16($dia16)
    {
        $this->dia16 = $dia16;

        return $this;
    }

    /**
     * Get dia16
     *
     * @return string
     */
    public function getDia16()
    {
        return $this->dia16;
    }

    /**
     * Set dia17
     *
     * @param string $dia17
     *
     * @return TurProgramacion
     */
    public function setDia17($dia17)
    {
        $this->dia17 = $dia17;

        return $this;
    }

    /**
     * Get dia17
     *
     * @return string
     */
    public function getDia17()
    {
        return $this->dia17;
    }

    /**
     * Set dia18
     *
     * @param string $dia18
     *
     * @return TurProgramacion
     */
    public function setDia18($dia18)
    {
        $this->dia18 = $dia18;

        return $this;
    }

    /**
     * Get dia18
     *
     * @return string
     */
    public function getDia18()
    {
        return $this->dia18;
    }

    /**
     * Set dia19
     *
     * @param string $dia19
     *
     * @return TurProgramacion
     */
    public function setDia19($dia19)
    {
        $this->dia19 = $dia19;

        return $this;
    }

    /**
     * Get dia19
     *
     * @return string
     */
    public function getDia19()
    {
        return $this->dia19;
    }

    /**
     * Set dia20
     *
     * @param string $dia20
     *
     * @return TurProgramacion
     */
    public function setDia20($dia20)
    {
        $this->dia20 = $dia20;

        return $this;
    }

    /**
     * Get dia20
     *
     * @return string
     */
    public function getDia20()
    {
        return $this->dia20;
    }

    /**
     * Set dia21
     *
     * @param string $dia21
     *
     * @return TurProgramacion
     */
    public function setDia21($dia21)
    {
        $this->dia21 = $dia21;

        return $this;
    }

    /**
     * Get dia21
     *
     * @return string
     */
    public function getDia21()
    {
        return $this->dia21;
    }

    /**
     * Set dia22
     *
     * @param string $dia22
     *
     * @return TurProgramacion
     */
    public function setDia22($dia22)
    {
        $this->dia22 = $dia22;

        return $this;
    }

    /**
     * Get dia22
     *
     * @return string
     */
    public function getDia22()
    {
        return $this->dia22;
    }

    /**
     * Set dia23
     *
     * @param string $dia23
     *
     * @return TurProgramacion
     */
    public function setDia23($dia23)
    {
        $this->dia23 = $dia23;

        return $this;
    }

    /**
     * Get dia23
     *
     * @return string
     */
    public function getDia23()
    {
        return $this->dia23;
    }

    /**
     * Set dia24
     *
     * @param string $dia24
     *
     * @return TurProgramacion
     */
    public function setDia24($dia24)
    {
        $this->dia24 = $dia24;

        return $this;
    }

    /**
     * Get dia24
     *
     * @return string
     */
    public function getDia24()
    {
        return $this->dia24;
    }

    /**
     * Set dia25
     *
     * @param string $dia25
     *
     * @return TurProgramacion
     */
    public function setDia25($dia25)
    {
        $this->dia25 = $dia25;

        return $this;
    }

    /**
     * Get dia25
     *
     * @return string
     */
    public function getDia25()
    {
        return $this->dia25;
    }

    /**
     * Set dia26
     *
     * @param string $dia26
     *
     * @return TurProgramacion
     */
    public function setDia26($dia26)
    {
        $this->dia26 = $dia26;

        return $this;
    }

    /**
     * Get dia26
     *
     * @return string
     */
    public function getDia26()
    {
        return $this->dia26;
    }

    /**
     * Set dia27
     *
     * @param string $dia27
     *
     * @return TurProgramacion
     */
    public function setDia27($dia27)
    {
        $this->dia27 = $dia27;

        return $this;
    }

    /**
     * Get dia27
     *
     * @return string
     */
    public function getDia27()
    {
        return $this->dia27;
    }

    /**
     * Set dia28
     *
     * @param string $dia28
     *
     * @return TurProgramacion
     */
    public function setDia28($dia28)
    {
        $this->dia28 = $dia28;

        return $this;
    }

    /**
     * Get dia28
     *
     * @return string
     */
    public function getDia28()
    {
        return $this->dia28;
    }

    /**
     * Set dia29
     *
     * @param string $dia29
     *
     * @return TurProgramacion
     */
    public function setDia29($dia29)
    {
        $this->dia29 = $dia29;

        return $this;
    }

    /**
     * Get dia29
     *
     * @return string
     */
    public function getDia29()
    {
        return $this->dia29;
    }

    /**
     * Set dia30
     *
     * @param string $dia30
     *
     * @return TurProgramacion
     */
    public function setDia30($dia30)
    {
        $this->dia30 = $dia30;

        return $this;
    }

    /**
     * Get dia30
     *
     * @return string
     */
    public function getDia30()
    {
        return $this->dia30;
    }

    /**
     * Set dia31
     *
     * @param string $dia31
     *
     * @return TurProgramacion
     */
    public function setDia31($dia31)
    {
        $this->dia31 = $dia31;

        return $this;
    }

    /**
     * Get dia31
     *
     * @return string
     */
    public function getDia31()
    {
        return $this->dia31;
    }

    /**
     * Set empresaRel
     *
     * @param \ArdidBundle\Entity\Empresa $empresaRel
     *
     * @return TurProgramacion
     */
    public function setEmpresaRel(\ArdidBundle\Entity\Empresa $empresaRel = null)
    {
        $this->empresaRel = $empresaRel;

        return $this;
    }

    /**
     * Get empresaRel
     *
     * @return \ArdidBundle\Entity\Empresa
     */
    public function getEmpresaRel()
    {
        return $this->empresaRel;
    }
}
