<?php

namespace ArdidBundle\Formato;

use Doctrine\ORM\EntityRepository;

class Pago extends \FPDF {

    public static $em;
    public static $codigoPago;
    public static $arUsuario;

    public function Generar($em, $codigoPago) {
        ob_clean();
        $formato =
        self::$em = $em;
        self::$codigoPago = $codigoPago;
        $pdf = new Pago('P', 'mm', 'letter');
        $pdf->AliasNbPages();
        $pdf->AddPage();
        $pdf->SetFont('Times', '', 12);
        $pdf->SetFillColor(200, 200, 200);
        $this->Body($pdf);
        $pdf->Output("Pago$codigoPago.pdf", 'D');
    }

    public function Header() {
        $arPago = self::$em->getRepository('ArdidBundle:Pago')->find(self::$codigoPago);
        $arEmpresa = new \ArdidBundle\Entity\Empresa();
        $arEmpresa = self::$em->getRepository('ArdidBundle:Empresa')->find($arPago->getCodigoEmpresaFk());
       // $arEmpleado = new \ArdidBundle\Entity\Empleado();
        //$arEmpleado = $em->getRepository('ArdidBundle:Empleado')->findOneBy(array('identificacionNumero'=>$arUsuario->getUsername()));
        
        $this->SetFillColor(200, 200, 200);
        $this->SetFont('Arial', 'B', 10);
        //Logo
        $this->SetXY(53, 3);
        $this->Image('imagenes/logos/logo'.$arPago->getCodigoEmpresaFk().'.jpg', 12, 5, 35, 17);
        //INFORMACIÓN EMPRESA
        $this->Cell(150, 7, "COMPROBANTE PAGO NOMINA", 0, 0, 'C', 1); //$this->Cell(150, 7, utf8_decode("COMPROBANTE PAGO ". $arPago->getPagoTipoRel()->getNombre().""), 0, 0, 'C', 1);
        $this->SetXY(53, 11);
        $this->SetFont('Arial', 'B', 9);
        $this->Cell(20, 4, "EMPRESA:", 0, 0, 'L', 1);
        $this->Cell(100, 4, $arEmpresa->getNombre() . " NIT:" . $arEmpresa->getNit() . " - " . $arEmpresa->getDigitoVerificacion(), 0, 0, 'L', 0);
        $this->SetXY(53, 15);
        $this->Cell(20, 4, utf8_decode("DIRECCIÓN:"), 0, 0, 'L', 1);
        $this->Cell(100, 4, $arEmpresa->getDireccion(), 0, 0, 'L', 0);
        $this->SetXY(53, 19);
        $this->Cell(20, 4, utf8_decode("TELÉFONO:"), 0, 0, 'L', 1);
        $this->Cell(100, 4, $arEmpresa->getTelefono(), 0, 0, 'L', 0);
        $this->EncabezadoDetalles();
    }

    public function EncabezadoDetalles() {
        $this->SetXY(10, 60);
        //$this->Ln(45);
        $header = array('CODIGO', 'CONCEPTO DE PAGO', 'HORAS', 'DIAS', 'VR.HORA' ,'%','DEVENGADO', 'DEDUCCION');
        $this->SetFillColor(200, 200, 200);
        $this->SetTextColor(0);
        $this->SetDrawColor(0, 0, 0);
        $this->SetLineWidth(.2);
        $this->SetFont('', 'B', 6.8);

        //creamos la cabecera de la tabla.
        $w = array(13, 73, 17, 17, 15, 20, 20, 20);
        for ($i = 0; $i < count($header); $i++)
            if ($i == 0 || $i == 1)
                $this->Cell($w[$i], 4, $header[$i], 1, 0, 'L', 1);
            else
                $this->Cell($w[$i], 4, $header[$i], 1, 0, 'C', 1);

        //Restauración de colores y fuentes
        $this->SetFillColor(224, 235, 255);
        $this->SetTextColor(0);
        $this->SetFont('');
        $this->Ln(4);
    }

    public function Body($pdf) {
        $pdf->SetX(10);
        $pdf->SetFont('Arial', '', 7);
        $pdf->SetFillColor(200, 200, 200);
        $arPago = self::$em->getRepository('ArdidBundle:Pago')->find(self::$codigoPago);
//        $numeroPagos = count($arPago);
        $contador = 1;

        $y = 25;
        //FILA 1
        $pdf->SetXY(10, $y);
        $pdf->SetFillColor(200, 200, 200);
        $pdf->SetFont('Arial', 'B', 6.5);
        $pdf->Cell(22, 6, "NUMERO:", 1, 0, 'L', 1);
        $pdf->SetFillColor(255, 255, 255);
        $pdf->SetFont('Arial', '', 7);
        $pdf->Cell(78, 6, $arPago->getNumero(), 1, 0, 'L', 1);
        $pdf->SetFont('Arial', 'B', 6.5);
        $pdf->SetFillColor(200, 200, 200);
        $pdf->Cell(24, 6, "CUENTA:", 1, 0, 'L', 1);
        $pdf->SetFont('Arial', '', 7);
        $pdf->SetFillColor(255, 255, 255);
        $pdf->Cell(72, 6, $arPago->getCuenta(), 1, 0, 'L', 1);
        
        //FILA 2
        $pdf->SetXY(10, $y + 6);
        $pdf->SetFont('Arial', 'B', 6.5);
        $pdf->SetFillColor(200, 200, 200);
        $pdf->Cell(22, 6, "EMPLEADO:", 1, 0, 'L', 1);
        $pdf->SetFont('Arial', '', 7);
        $pdf->SetFillColor(255, 255, 255);
        $pdf->Cell(78, 6, utf8_decode($arPago->getEmpleadoRel()->getnombreCorto()), 1, 0, 'L', 1);
        $pdf->SetFont('Arial', 'B', 6.5);
        $pdf->SetFillColor(200, 200, 200);
        $pdf->Cell(24, 6, "IDENTIFICACION:", 1, 0, 'L', 1);
        $pdf->SetFont('Arial', '', 7);
        $pdf->SetFillColor(255, 255, 255);
        $pdf->Cell(24, 6, $arPago->getEmpleadoRel()->getidentificacionNumero() , 1, 0, 'L', 1);
        $pdf->SetFont('Arial', 'B', 6.5);
        $pdf->SetFillColor(200, 200, 200);
        $pdf->Cell(24, 6, "BANCO:", 1, 0, 'L', 1);
        $pdf->SetFont('Arial', '', 7);
        $pdf->SetFillColor(255, 255, 255);
        $banco = substr($arPago->getBanco(),0,14); 
        $pdf->Cell(24, 6, $banco, 1, 0, 'L', 1);
        $pdf->SetFont('Arial', 'B', 6.5);
        $pdf->SetFillColor(200, 200, 200);
        //FILA 3
        $pdf->SetXY(10, $y + 12);
        $pdf->SetFont('Arial', 'B', 6.5);
        $pdf->SetFillColor(200, 200, 200);
        $pdf->Cell(22, 6, "CARGO:", 1, 0, 'L', 1);
        $pdf->SetFont('Arial', '', 7);
        $pdf->SetFillColor(255, 255, 255);
        $pdf->Cell(78, 6, $arPago->getCargo(), 1, 0, 'L', 1);
        $pdf->SetFont('Arial', 'B', 6.5);
        $pdf->SetFillColor(200, 200, 200);
        $pdf->Cell(24, 6, "PERIODO PAGO:", 1, 0, 'L', 1);
        $pdf->SetFont('Arial', '', 7);
        $pdf->SetFillColor(255, 255, 255);
        $pdf->Cell(24, 6, $arPago->getPeriodoPago() , 1, 0, 'L', 1);
        $pdf->SetFont('Arial', 'B', 6.5);
        $pdf->SetFillColor(200, 200, 200);
        $pdf->Cell(24, 6, "PENSION:", 1, 0, 'L', 1);
        $pdf->SetFont('Arial', '', 7);
        $pdf->SetFillColor(255, 255, 255);
        $pension = substr($arPago->getPension(),0,14);                
        $pdf->Cell(24, 6,utf8_decode($pension) , 1, 0, 'L', 1);
      
        //FILA 4
        $pdf->SetXY(10, $y + 18);
        $pdf->SetFont('Arial', 'B', 6.5);
        $pdf->SetFillColor(200, 200, 200);
        $pdf->Cell(22, 6, "CENTRO COSTOS:", 1, 0, 'L', 1);
        $pdf->SetFont('Arial', '', 7);
        $pdf->SetFillColor(255, 255, 255);
        $pdf->Cell(78, 6, $arPago->getGrupoPago(), 1, 0, 'L', 1);
        $pdf->SetFont('Arial', 'B', 6.5);
        $pdf->SetFillColor(200, 200, 200);
        $pdf->Cell(24, 6, "DESE:", 1, 0, 'L', 1);
        $pdf->SetFont('Arial', '', 7);
        $pdf->SetFillColor(255, 255, 255);
        $pdf->Cell(24, 6, $arPago->getfechaDesde()->format('Y/m/d'), 1, 0, 'L', 1);
        $pdf->SetFont('Arial', 'B', 6.5);
        $pdf->SetFillColor(200, 200, 200);
        $pdf->Cell(24, 6, "SALUD:", 1, 0, 'L', 1);
        $pdf->SetFont('Arial', '', 7);
        $pdf->SetFillColor(255, 255, 255);
        $pdf->Cell(24, 6,$arPago->getSalud(), 1, 0, 'L', 1);
        //FILA 5
        $pdf->SetXY(10, $y + 24);
        $pdf->SetFont('Arial', 'B', 6.5);
        $pdf->SetFillColor(200, 200, 200);
        $pdf->Cell(22, 6, "ZONA:", 1, 0, 'L', 1);
        $pdf->SetFont('Arial', '', 7);
        $pdf->SetFillColor(255, 255, 255);
        $pdf->Cell(78, 6, $arPago->getZona(), 1, 0, 'L', 1);
        $pdf->SetFont('Arial', 'B', 6.5);
        $pdf->SetFillColor(200, 200, 200);
        $pdf->Cell(24, 6, "HASTA:", 1, 0, 'L', 1);
        $pdf->SetFont('Arial', '', 7);
        $pdf->SetFillColor(255, 255, 255);
        $pdf->Cell(24, 6, $arPago->getfechaHasta()->format('Y/m/d'), 1, 0, 'L', 1);
        $pdf->SetFont('Arial', 'B', 6.5);
        $pdf->SetFillColor(200, 200, 200);
        $pdf->Cell(24, 6, "SALARIO:", 1, 0, 'L', 1);
        $pdf->SetFont('Arial', '', 7);
        $pdf->SetFillColor(255, 255, 255);
        $pdf->Cell(24, 6, number_format($arPago->getvrSalarioEmpleado(), 0, '.', ','), 1, 0, 'R');
    
        $arPagoDetalles = new \ArdidBundle\Entity\PagoDetalle();
        $arPagoDetalles = self::$em->getRepository('ArdidBundle:PagoDetalle')->findBy(array('codigoPagoFk' => $arPago->getCodigoPagoPk()));
        //$query = self::$em->createQuery($dql);
        //$arPagoDetalles = $query->getResult();
        $pdf->SetXY(10, 64);
        foreach ($arPagoDetalles as $arPagoDetalle) {
            $pdf->SetFont('Arial', '', 6);
            $pdf->Cell(13, 4, $arPagoDetalle->getCodigoConceptoFk(), 1, 0, 'L');
            $pdf->Cell(73, 4, utf8_decode($arPagoDetalle->getNombreConcepto()), 1, 0, 'L');
            $pdf->Cell(17, 4, number_format($arPagoDetalle->getHoras(), 0, '.', ','), 1, 0, 'R');
            $pdf->Cell(17, 4, number_format($arPagoDetalle->getDias(), 0, '.', ','), 1, 0, 'R');
            $pdf->Cell(15, 4, number_format($arPagoDetalle->getVrHora(), 0, '.', ','), 1, 0, 'R');
            $pdf->Cell(20, 4, number_format($arPagoDetalle->getPorcentaje(), 0, '.', ','), 1, 0, 'R');
            if($arPagoDetalle->getOperacion() == 1) {
                $pdf->Cell(20, 4, number_format($arPagoDetalle->getVrPago(), 0, '.', ','), 1, 0, 'R');
                $pdf->Cell(20, 4, 0, 1, 0, 'R');                
            }
            if($arPagoDetalle->getOperacion() == -1) {                
                $pdf->Cell(20, 4, 0, 1, 0, 'R');                
                $pdf->Cell(20, 4, number_format($arPagoDetalle->getVrPago(), 0, '.', ','), 1, 0, 'R');                
            }            
            if($arPagoDetalle->getOperacion() == 0) {
                $pdf->Cell(20, 4, 0, 1, 0, 'R');
                $pdf->Cell(20, 4, 0, 1, 0, 'R');                
            }            
            $pdf->Ln();
            $pdf->SetAutoPageBreak(true, 15);

            $w = array(13, 53, 20, 20, 15, 20, 27, 27);
        }

        //TOTALES
       // $pdf->Ln(2);
        
        $w=$pdf->getY();
        $w=$w+5;    
        $pdf->SetXY(145, $w);
        $pdf->SetFillColor(200, 200, 200);
        $pdf->Cell(30, 5, "TOTAL DEVENGADO", 1, 0, 'R', true);
        $pdf->Cell(30, 5, number_format($arPago->getVrDevengado(), 0, '.', ','), 1, 0, 'R');
        $pdf->SetFillColor(255, 255, 255);
        $pdf->SetXY(145,$w + 5);
        $pdf->SetFillColor(200, 200, 200);
        $pdf->Cell(30, 5, "TOTAL DEDUCCIONES", 1, 0, 'R', true);
        $pdf->Cell(30, 5, number_format($arPago->getVrDeducciones(), 0, '.', ','), 1, 0, 'R');
        $pdf->SetFillColor(255, 255, 255);
        $pdf->SetXY(145, $w +10);
        $pdf->SetFillColor(200, 200, 200);
        $pdf->Cell(30, 5, "NETO PAGAR", 1, 0, 'R', true);
        $pdf->Cell(30, 5, number_format($arPago->getvrNeto(), 0, '.', ','), 1, 0, 'R');
        $pdf->SetFillColor(255, 255, 255);
        $pdf->Ln(-8);
        if($arPago->getCodigoSoportePagoFk() != 0 && $arPago->getCodigoSoportePagoFk() != "") {
            $arProgramaciones = new \ArdidBundle\Entity\Programacion();
            $arProgramaciones = self::$em->getRepository('ArdidBundle:Programacion')->findBy(array('codigoEmpresaFk' => $arPago->getCodigoEmpresaFk(), 'codigoSoportePagoFk' => $arPago->getCodigoSoportePagoFk()));
            if($arProgramaciones) {
                $desde = $arPago->getFechaDesde()->format('j');
                $hasta = $arPago->getFechaHasta()->format('j'); 
                if($hasta == 30) {$hasta = 31;}
                $header = array('D1','D2','D3','D4','D5','D6','D7','D8','D9','D10','D11','D12','D13','D14','D15','D16','D17','D18','D19','D20','D21','D22','D23','D24','D25','D26','D27','D28','D29','D30','D31');
                $pdf->SetFillColor(200, 200, 200);
                $pdf->SetTextColor(0);
                $pdf->SetDrawColor(0, 0, 0);
                $pdf->SetLineWidth(.2);
                $pdf->SetFont('', 'B', 6.8);

                //creamos la cabecera de la tabla.
                $w = array(6.2,6.2,6.2,6.2,6.2,6.2,6.2,6.2,6.2,6.2,6.2,6.2,6.2,6.2,6.2,6.2,6.2,6.2,6.2,6.2,6.2,6.2,6.2,6.2,6.2,6.2,6.2,6.2,6.2,6.2,6.2);
                for ($i = $desde; $i <= $hasta; $i++) {
                    $pdf->Cell(6.2, 4, "D".$i, 1, 0, 'L', 1);
                }
                $pdf->Ln();
                foreach ($arProgramaciones as $arProgramacion) {
                    $detalle = $this->convertirArray($arProgramacion);
                    $pdf->SetFont('Arial', '', 5);
                    for($j=$desde; $j<=$hasta; $j++) {                            
                        $pdf->Cell(6.2, 4, $detalle[$j], 1, 0, 'L');
                    }
                    $pdf->Ln();
                    $pdf->SetAutoPageBreak(true, 15);
                }                                        
            }            
        }

        if ($arPago->getMensajePago() != null) {
            $pdf->Ln(16);
            $pdf->SetY($pdf->GetY());
            $pdf->SetFont('Arial', 'B', 7);
            $pdf->Cell(193, 4, utf8_decode($arPago->getMensajePago()), 0, 0, 'C');
        }
        
        $pdf->SetFont('Arial', 'B', 7);
    }

    public function Footer() {


        //$this->SetFont('Arial','', 8);  
        //$this->Text(185, 140, utf8_decode('Página ') . $this->PageNo() . ' de {nb}');
    }

    private function convertirArray($arSoportePagoProgramacion) {
        $arrProgramacionDetalle = array();
        if($arSoportePagoProgramacion) {
            $arrProgramacionDetalle[1] = $arSoportePagoProgramacion->getDia1();
            $arrProgramacionDetalle[2] = $arSoportePagoProgramacion->getDia2();
            $arrProgramacionDetalle[3] = $arSoportePagoProgramacion->getDia3();
            $arrProgramacionDetalle[4] = $arSoportePagoProgramacion->getDia4();
            $arrProgramacionDetalle[5] = $arSoportePagoProgramacion->getDia5();
            $arrProgramacionDetalle[6] = $arSoportePagoProgramacion->getDia6();
            $arrProgramacionDetalle[7] = $arSoportePagoProgramacion->getDia7();
            $arrProgramacionDetalle[8] = $arSoportePagoProgramacion->getDia8();
            $arrProgramacionDetalle[9] = $arSoportePagoProgramacion->getDia9();
            $arrProgramacionDetalle[10] = $arSoportePagoProgramacion->getDia10();
            $arrProgramacionDetalle[11] = $arSoportePagoProgramacion->getDia11();
            $arrProgramacionDetalle[12] = $arSoportePagoProgramacion->getDia12();
            $arrProgramacionDetalle[13] = $arSoportePagoProgramacion->getDia13();
            $arrProgramacionDetalle[14] = $arSoportePagoProgramacion->getDia14();
            $arrProgramacionDetalle[15] = $arSoportePagoProgramacion->getDia15();
            $arrProgramacionDetalle[16] = $arSoportePagoProgramacion->getDia16();
            $arrProgramacionDetalle[17] = $arSoportePagoProgramacion->getDia17();
            $arrProgramacionDetalle[18] = $arSoportePagoProgramacion->getDia18();
            $arrProgramacionDetalle[19] = $arSoportePagoProgramacion->getDia19();
            $arrProgramacionDetalle[20] = $arSoportePagoProgramacion->getDia20();
            $arrProgramacionDetalle[21] = $arSoportePagoProgramacion->getDia21();
            $arrProgramacionDetalle[22] = $arSoportePagoProgramacion->getDia22();
            $arrProgramacionDetalle[23] = $arSoportePagoProgramacion->getDia23();
            $arrProgramacionDetalle[24] = $arSoportePagoProgramacion->getDia24();
            $arrProgramacionDetalle[25] = $arSoportePagoProgramacion->getDia25();
            $arrProgramacionDetalle[26] = $arSoportePagoProgramacion->getDia26();
            $arrProgramacionDetalle[27] = $arSoportePagoProgramacion->getDia27();
            $arrProgramacionDetalle[28] = $arSoportePagoProgramacion->getDia28();
            $arrProgramacionDetalle[29] = $arSoportePagoProgramacion->getDia29();
            $arrProgramacionDetalle[30] = $arSoportePagoProgramacion->getDia30();
            $arrProgramacionDetalle[31] = $arSoportePagoProgramacion->getDia31();
        }
        return $arrProgramacionDetalle;
    }    
    
}

?>