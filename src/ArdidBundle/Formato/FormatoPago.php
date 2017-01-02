<?php

namespace ArdidBundle\Formato;



class FormatoPago extends \FPDF {

    public static $em;
    public static $codigoPago;

    public function Generar($em, $codigoPago) {
        ob_clean();
        //$em = $miThis->getDoctrine()->getManager();
        self::$em = $em;
        self::$codigoPago = $codigoPago;

        //$pdf = new FormatoPagoMasivo('P', 'mm', array(215, 147));
        $pdf = new FormatoPago('P', 'mm', 'letter');
        $pdf->AliasNbPages();
        $pdf->AddPage();
        $pdf->SetFont('Times', '', 12);
        $pdf->SetFillColor(200, 200, 200);
        $this->Body($pdf);
        $pdf->Output("Pago$codigoPago.pdf", 'D');
    }

    public function Header() {

        $arConfiguracion = new \ArdidBundle\Entity\Empresa();
        $arConfiguracion = self::$em->getRepository('ArdidBundle:Empresa')->find(1);

        $this->SetFillColor(200, 200, 200);
        $this->SetFont('Arial', 'B', 10);
        //Logo
        $this->SetXY(53, 3);
        //$this->Image('imagenes/logos/logo.jpg', 12, 5, 35, 17);
        //INFORMACIÓN EMPRESA
        $this->Cell(150, 7, "COMPROBANTE PAGO NOMINA", 0, 0, 'C', 1); //$this->Cell(150, 7, utf8_decode("COMPROBANTE PAGO ". $arPago->getPagoTipoRel()->getNombre().""), 0, 0, 'C', 1);
        $this->SetXY(53, 11);
        $this->SetFont('Arial', 'B', 9);
        $this->Cell(20, 4, "EMPRESA:", 0, 0, 'L', 1);
        $this->Cell(100, 4, $arConfiguracion->getNombre() . " NIT:" . $arConfiguracion->getNit() . " - " . $arConfiguracion->getDigitoVerificacion(), 0, 0, 'L', 0);
        $this->SetXY(53, 15);
        $this->Cell(20, 4, utf8_decode("DIRECCIÓN:"), 0, 0, 'L', 1);
        $this->Cell(100, 4, '', 0, 0, 'L', 0);
        $this->SetXY(53, 19);
        $this->Cell(20, 4, utf8_decode("TELÉFONO:"), 0, 0, 'L', 1);
        $this->Cell(100, 4, '', 0, 0, 'L', 0);
        $this->EncabezadoDetalles();
    }

    public function EncabezadoDetalles() {
        $this->SetXY(10, 53);
        //$this->Ln(45);
        $header = array('CODIGO', 'CONCEPTO DE PAGO', 'HORAS', 'DIAS', '%', 'OPERACION', 'PAGO', 'NETO');
        $this->SetFillColor(200, 200, 200);
        $this->SetTextColor(0);
        $this->SetDrawColor(0, 0, 0);
        $this->SetLineWidth(.2);
        $this->SetFont('', 'B', 6.8);

        //creamos la cabecera de la tabla.
        $w = array(13, 53 , 17, 17, 15, 20, 30, 30);
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
       // $arConfiguracion = new \ardid\ArdidBundle\Entity\Empresa();
        //$arConfiguracion = self::$em->getRepository('ArdidBundle:Empresa')->find(1);
        //$arUsuario = self::$em->getUser(); 
        $arPagos= self::$em->getRepository('ArdidBundle:Pago')->find(self::$codigoPago);
        //$dql = self::$em->getRepository('ArdidBundle:Pago')->findBy(array('codigoPago'=> $arPagos->getCodigoPagoPK));
        //$query = self::$em->createQuery($dql);
        //$arPagos = $query->getResult();
        $numeroPagos = count($arPagos);
        $contador = 1;        

            $y = 25;
            //FILA 1
            $pdf->SetXY(10, $y);
            $pdf->SetFillColor(200, 200, 200);
            $pdf->SetFont('Arial', 'B', 6.5);
            $pdf->Cell(22, 6, "NUMERO:", 1, 0, 'L', 1);
            $pdf->SetFillColor(255, 255, 255);
            $pdf->SetFont('Arial', '', 7);
            $pdf->Cell(78, 6, $arPagos->getnumero(), 1, 0, 'L', 1);
            $pdf->SetFont('Arial', 'B', 6.5);
            $pdf->SetFillColor(200, 200, 200);
            $pdf->Cell(24, 6, "FECHA:", 1, 0, 'L', 1);
            $pdf->SetFont('Arial', '', 7);
            $pdf->SetFillColor(255, 255, 255);
            $pdf->Cell(24, 6, $arPagos->getfechaHasta()->format('Y/m/d'), 1, 0, 'L', 1);
            $pdf->SetFont('Arial', 'B', 6.5);
            $pdf->SetFillColor(200, 200, 200);
            //FILA 2
            $pdf->SetXY(10, $y + 5);
            $pdf->SetFont('Arial', 'B', 7);
            $pdf->SetFillColor(200, 200, 200);
            $pdf->Cell(22, 6, "EMPLEADO:", 1, 0, 'L', 1);
            $pdf->SetFont('Arial', '', 6);
            $pdf->SetFillColor(255, 255, 255);
            $pdf->Cell(78, 6, utf8_decode($arPagos->getEmpleadoRel()->getnombreCorto()), 1, 0, 'L', 1);
            $pdf->SetFont('Arial', 'B', 6.5);
            $pdf->SetFillColor(200, 200, 200);
            $pdf->Cell(24, 6, "IDENTIFICACION:", 1, 0, 'L', 1);
            $pdf->SetFont('Arial', '', 7);
            $pdf->SetFillColor(255, 255, 255);
            $pdf->Cell(24, 6, $arPagos->getEmpleadoRel()->getnumeroIdentificacion() . " (" . $arPagos->getCodigoEmpleadoFk() . ")", 1, 0, 'L', 1);
            $pdf->SetFont('Arial', 'B', 6.5);
            $pdf->SetFillColor(200, 200, 200);
           //FILA 4
            $pdf->SetXY(10, $y + 15);
            $pdf->SetFont('Arial', 'B', 6.5);
            $pdf->SetFillColor(200, 200, 200);
            $pdf->Cell(24, 5, "DESDE:", 1, 0, 'L', 1);
            $pdf->SetFont('Arial', '', 7);
            $pdf->SetFillColor(255, 255, 255);
            $pdf->Cell(24, 5, $arPagos->getfechaDesde()->format('Y/m/d'), 1, 0, 'L', 1);
            $pdf->SetFont('Arial', 'B', 6.5);
            $pdf->SetFillColor(200, 200, 200);
            //FILA 5
            $pdf->SetXY(10, $y + 20);
            $pdf->SetFont('Arial', 'B', 6.5);
            $pdf->SetFillColor(200, 200, 200);
            $pdf->Cell(24, 5, "HASTA", 1, 0, 'L', 1);
            $pdf->SetFont('Arial', '', 7);
            $pdf->SetFillColor(255, 255, 255);
            $pdf->Cell(24, 5, $arPagos->getfechaHasta()->format('Y/m/d'), 1, 0, 'L', 1);
            $pdf->SetFont('Arial', 'B', 6.5);
            $pdf->SetFillColor(200, 200, 200);


            $arPagoDetalles = new \ArdidBundle\Entity\PagoDetalle();
            $arPagoDetalles = self::$em->getRepository('ArdidBundle:PagoDetalle')->findBy(array('codigoPagoFk' => self::$codigoPago));
            //$query = self::$em->createQuery($dql);
            //$arPagoDetalles = $query->getResult();
            $pdf->SetXY(10, $y + 32);
            foreach ($arPagoDetalles as $arPagoDetalle) {
                $pdf->SetFont('Arial', '', 6);
                $pdf->Cell(13, 4, $arPagoDetalle->getcodigoConceptoFk(), 1, 0, 'L');
                $pdf->Cell(53, 4, utf8_decode($arPagoDetalle->getcodigoConceptoFk()), 1, 0, 'L');                
                $pdf->Cell(17, 4, number_format($arPagoDetalle->getHoras(), 0, '.', ','), 1, 0, 'R');
                $pdf->Cell(17, 4, number_format($arPagoDetalle->getDias(), 0, '.', ','), 1, 0, 'R');
                $pdf->Cell(15, 4, number_format($arPagoDetalle->getHoras(), 0, '.', ','), 1, 0, 'R');
                $pdf->Cell(20, 4, number_format($arPagoDetalle->getPorcentaje(), 0, '.', ','), 1, 0, 'R');
                $pdf->Cell(30, 4, number_format($arPagoDetalle->getVrPago(), 0, '.', ','), 1, 0, 'R');
                $pdf->Cell(30, 4, number_format($arPagoDetalle->getVrNeto(), 0, '.', ','), 1, 0, 'R');
                $pdf->Ln();
                $pdf->SetAutoPageBreak(true, 15);
                
                    $w = array(13, 53 , 20, 20, 15, 20, 27, 27);
            }

            //TOTALES
            $pdf->Ln();
            $pdf->SetXY(145 , 65);
            $pdf->Cell(30, 4, "NETO PAGAR", 1, 0, 'R', true);
            $pdf->Cell(30, 4, number_format($arPagos->getvrNeto(), 0, '.', ','), 1, 0, 'R');
            $pdf->Ln(-8);


            //$pdf->Ln(5);

        //$pdf->Ln(8);
        $pdf->SetFont('Arial', 'B', 7);
    }

    public function Footer() {

        //$this->SetFont('Arial','', 8);  
        //$this->Text(185, 140, utf8_decode('Página ') . $this->PageNo() . ' de {nb}');
    }

}

?>