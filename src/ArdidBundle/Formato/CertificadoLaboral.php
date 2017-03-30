<?php

namespace ArdidBundle\Formato;

use Doctrine\ORM\EntityRepository;

class CertificadoLaboral extends \FPDF {

    public static $em;
    public static $codigoContrato;

    

    public function Generar($em, $codigoContrato) {
        ob_clean();
        self::$em = $em;
        self::$codigoContrato = $codigoContrato;
    
        $pdf = new CertificadoLaboral('P', 'mm', 'A4');
        $pdf->AliasNbPages();
        $pdf->AddPage();
        $pdf->SetFont('Arial', '', 12);
        $pdf->SetFillColor(200, 200, 200);
        $pdf->SetMargins(25, 15 , 25); 
        $this->Body($pdf);
        $pdf->Output("Contrato$codigoContrato.pdf", 'D');
    }

    public function Header() {
        $arEmpleado = new \ArdidBundle\Entity\Empleado();
        $arContrato = self::$em->getRepository('ArdidBundle:contrato')->find(self::$codigoContrato);

        $this->SetFillColor(200, 200, 200);
        $this->SetFont('Arial', 'B', 10);
        //Logo
        $this->Image('imagenes/logos/logo' . $arContrato->getCodigoEmpresaFk() . '.jpg', 20, 12, 35, 0);
        $this->Image('imagenes/firmas/firma'.$arContrato->getCodigoEmpresaFk().'.jpg', 30, 170, 35, 20);
    }

    public function EncabezadoDetalles() {
        $arConfiguracion = new \Brasa\GeneralBundle\Entity\GenConfiguracion();
        $arConfiguracion = self::$em->getRepository('BrasaGeneralBundle:GenConfiguracion')->find(1);        
        $this->SetFont('Arial','','9');
        //$this->Text(10, 55, utf8_decode($arConfiguracion->getCiudadRel()->getNombre()). " ". self::$fechaProceso);
        $this->Ln(20);
    }

    public function Body($pdf) {
        $pdf->SetXY(25, 65);
        $pdf->SetFont('Arial', '', 10);
        $arContrato = new \ArdidBundle\Entity\Contrato;
        $arContrato = self::$em->getRepository('ArdidBundle:Contrato')->find(self::$codigoContrato);  
        $arContenido = new \ArdidBundle\Entity\Contenido;
        $arContenido = self::$em->getRepository('ArdidBundle:Contenido')->findOneBy(array('codigoEmpresaFk' => $arContrato->getCodigoEmpresaFk(), 'tipo'=> 2));
        $contenido = $arContenido->getContenido();
        $fecha = new \DateTime('now');        
        $vigente;
        $contratoVigente = $arContrato->getVigente();
        if ($contratoVigente == 1){
            $vigente = "SI";
        }
        if ($contratoVigente == 0){
            $vigente = "NO";
        }        
        $contenido = preg_replace('/#1/', $arContrato->getEmpleadoRel()->getIdentificacionNumero(), $contenido);
        $contenido = preg_replace('/#2/', $arContrato->getEmpleadoRel()->getNombreCorto(), $contenido);
        $contenido = preg_replace('/#3/', $arContrato->getCargo(), $contenido);
        $contenido = preg_replace('/#4/', strftime("%d de ". $this->MesesEspañol($arContrato->getFechaDesde()->format('m')) ." de %Y", strtotime($arContrato->getFechaDesde()->format('Y-m-d'))), $contenido);
        $contenido = preg_replace('/#5/', $arContrato->getEmpresaRel()->getNombre(), $contenido);
        $contenido = preg_replace('/#6/', $arContrato->getEmpresaRel()->getNit(), $contenido);
        $contenido = preg_replace('/#7/', $arContrato->getEmpresaRel()->getTelefono(), $contenido);
        $contenido = preg_replace('/#8/', $fecha->format('Y/m/d'), $contenido);
        $contenido = preg_replace('/#9/', $vigente, $contenido);
        $contenido = preg_replace('/#10/', $arContrato->getTipo(), $contenido);
        $contenido = preg_replace('/#11/', strftime("%d de ". $this->MesesEspañol($arContrato->getFechaHasta()->format('m')) ." de %Y", strtotime($arContrato->getFechaHasta()->format('Y-m-d'))), $contenido);
        $contenido = utf8_decode($contenido);    
        $pdf->MultiCell(0,5, $contenido);
        
    }

    public function Footer() {
        //$this->Cell(0,10,'Página '.$this->PageNo(),0,0,'C');
        
    }  
    
    public static function MesesEspañol($mes) {
        
        if ($mes == '01'){
            $mesEspañol = "Enero";
        }
        if ($mes == '02'){
            $mesEspañol = "Febrero";
        }
        if ($mes == '03'){
            $mesEspañol = "Marzo";
        }
        if ($mes == '04'){
            $mesEspañol = "Abril";
        }
        if ($mes == '05'){
            $mesEspañol = "Mayo";
        }
        if ($mes == '06'){
            $mesEspañol = "Junio";
        }
        if ($mes == '07'){
            $mesEspañol = "Julio";
        }
        if ($mes == '08'){
            $mesEspañol = "Agosto";
        }
        if ($mes == '09'){
            $mesEspañol = "Septiembre";
        }
        if ($mes == '10'){
            $mesEspañol = "Octubre";
        }
        if ($mes == '11'){
            $mesEspañol = "Noviembre";
        }
        if ($mes == '12'){
            $mesEspañol = "Diciembre";
        }

        return $mesEspañol;
    }    
    
}
