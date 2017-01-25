<?php


namespace ArdidBundle\Formato;

use Doctrine\ORM\EntityRepository;

class FormatoCertificadoLaboral extends \FPDF {

    public static $em;
    public static $codigoContrato;
    public static $arUsuario;

    public function Generar($em, $codigoContrato) {
        ob_clean();
        self::$em = $em;    
        self::$codigoContrato = $codigoContrato;
        $pdf = new FormatoCertificadoLaboral();
        $pdf->AliasNbPages();
        $pdf->AddPage();
        $pdf->SetFont('Arial', '', 12);
        $pdf->SetFillColor(200, 200, 200);
        $this->Body($pdf);
        $pdf->Output("Contrato$codigoContrato.pdf", 'D');
    }
        public function Header() {
        $arEmpleado = new \ArdidBundle\Entity\Empleado();
        $arContrato =self::$em->getRepository('ArdidBundle:contrato')->find(self::$codigoContrato);

        $this->SetFillColor(200, 200, 200);
        $this->SetFont('Arial', 'B', 10);
        //Logo
        $this->SetXY(53, 3);
        $this->Image('imagenes/logos/logo'.$arContrato->getCodigoEmpresaFk().'.jpg', 12, 5, 35, 17);
}
}