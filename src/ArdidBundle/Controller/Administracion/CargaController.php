<?php

namespace ArdidBundle\Controller\Administracion;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\FileType;

class CargaController extends Controller {

    /**
     * @Route("/administracion/cargar", name="cargar_archivo")
     */
    public function cargarAction(Request $request) {

        $em = $this->getDoctrine()->getManager();        
        $form = $this->createFormBuilder()
                       ->add('attachment', FileType::class, array('label'  => 'Cargar archivo'))
                       ->add('BtnCargar', SubmitType::class, array('label'  => 'Cargar'))
                           ->getForm();
        $form->handleRequest($request);

        if ($form->isValid()) {
            if ($form->get('BtnCargar')->isClicked()) {
                $rutaTemporal = '/var/www/html/temporal/';
                $form['attachment']->getData()->move($rutaTemporal, "carga.txt");
                $fp = fopen($rutaTemporal . "carga.txt", "r");
                while (!feof($fp)) {
                    $linea = fgets($fp);
                    if ($linea) {
                        echo $linea;
                        
                        /*$arrayDetalle = explode(";", $linea);
                        $arPagos= $this->getDoctrine()->getRepository('ArdidBundle:Pago')->findBy(array('codigoEmpleadoFk' => $arUsuario->getCodigoEmpleadoFk()));
                        $arPagoDetalles = $this->getDoctrine()->getRepository('ArdidBundle:PagoDetalle')->findBy(array('codigoPagoFk' => $codigoPago));
                        */
                        /*$arPagos = $em->getRepository('ArdidBundle:Pago')->find(array($arrayDetalle[1]));
                        $arPagoDetalles = $em->getRepository('ArdidBundle:PagoDetalle')->find($arrayDetalle[1]);
                        $arPagos = $em->setCodigoPk($arrayDetalle[1]);
                        $arPagos = $em->setCodigoEmpresaFk($arrayDetalle[2]);
                        $arPagos = $em->setCodigoEmpleadoFk($arrayDetalle[3]);
                        $arPagos = $em->setCodigoPagoTipoFk($arrayDetalle[4]);
                        $arPagos = $em->setFechaDesde ($arrayDetalle[5]);
                        $arPagos = $em->setFechaHasta ($arrayDetalle[6]);
                        $arPagos = $em->setNumero($arrayDetalle[7]);
                        $arPagos = $em->setVrDeducciones($arrayDetalle[8]);
                        $arPagos = $em->setVrNeto($arrayDetalle[9]);
                        $arPagos = $em->setVrDevengado($arrayDetalle[10]);
                        $arPagoDetalles = $em->setCodigoPagoFk($arrayDetalle[1]);
                        $arPagoDetalles = $em->setCodigoConceptoFk($arrayDetalle[11]);
                        $arPagoDetalles = $em->setconcepto($arrayDetalle[12]);
                        $arPagoDetalles = $em->setVrPago($arrayDetalle[13]);
                        $arPagoDetalles = $em->setVrNeto($arrayDetalle[9]);
                        $arPagoDetalles = $em->setOperacion($arrayDetalle[14]);
                        $arPagoDetalles = $em->setHoras($arrayDetalle[15]);
                        $arPagoDetalles = $em->setDias($arrayDetalle[16]);
                        $arPagoDetalles = $em->setPorcentaje($arrayDetalle[17]);
                      
                        */


                        }

                    }
                }
            }return $this->render('ArdidBundle:Administracion:Carga.html.twig', array(
                                    'form' => $form->createView()    ));
        } 
}
        /*
          $objMensaje = new \Brasa\GeneralBundle\MisClases\Mensajes();
          $rutaTemporal = new \Brasa\GeneralBundle\Entity\GenConfiguracion();
          $rutaTemporal = $em->getRepository('BrasaGeneralBundle:GenConfiguracion')->find(1);
         * 
          $form = $this->createFormBuilder()
          ->add('attachment', FileType::class)
          ->add('BtnCargar', SubmitType::class, array('label'  => 'Cargar'))
          ->getForm();
          $form->handleRequest($request);

          if($form->isValid()) {
          if($form->get('BtnCargar')->isClicked()) {
          $rutaTemporal = $em->getRepository('BrasaGeneralBundle:GenConfiguracion')->find(1);

         * 
         * 
         * 
         * 

          $empleadoSinContrato = "";
          $empleadoNoExiste = "";
          while(!feof($fp)) {
          $linea = fgets($fp);
          if($linea){
          $arrayDetalle = explode(";", $linea);
          if($arrayDetalle[0] != "") {
          $arEmpleado = new \Brasa\RecursoHumanoBundle\Entity\RhuEmpleado();
          $arEmpleado = $em->getRepository('BrasaRecursoHumanoBundle:RhuEmpleado')->findOneBy(array('numeroIdentificacion' => $arrayDetalle[0]));
          if(count($arEmpleado) > 0) {
          $arEmpleadoValidar = $em->getRepository('BrasaRecursoHumanoBundle:RhuEmpleado')->findOneBy(array('numeroIdentificacion' => $arrayDetalle[0], 'codigoCentroCostoFk' => null));
          if (count($arEmpleadoValidar) > 0){
          $empleadoSinContrato = "El numero de identificación " .$arrayDetalle[0]. " No tiene contrato";
          }else{
          //Créditos
          $arCredito = new \Brasa\RecursoHumanoBundle\Entity\RhuCredito();
          $arCreditoTipo = new \Brasa\RecursoHumanoBundle\Entity\RhuCreditoTipo();
          $arCreditoTipo = $em->getRepository('BrasaRecursoHumanoBundle:RhuCreditoTipo')->find($arrayDetalle[1]);
          $arCreditoTipoPago = new \Brasa\RecursoHumanoBundle\Entity\RhuCreditoTipoPago();
          $arCreditoTipoPago = $em->getRepository('BrasaRecursoHumanoBundle:RhuCreditoTipoPago')->find($arrayDetalle[4]);
          $arCredito->setEmpleadoRel($arEmpleado);
          $arCredito->setCreditoTipoRel($arCreditoTipo);
          $arCredito->setCreditoTipoPagoRel($arCreditoTipoPago);
          $arCredito->setCentroCostoRel($arEmpleado->getCentroCostoRel());
          $intVrCredito = $arrayDetalle[2];
          $arCredito->setVrPagar($intVrCredito);
          $intCuotas = $arrayDetalle[3];
          $arCredito->setNumeroCuotas($intCuotas);
          $arCredito->setVrCuota($intVrCredito / $intCuotas);
          $dateFecha = $arrayDetalle[5];
          $dateFecha = new \DateTime($dateFecha);
          $arCredito->setFecha(new \DateTime('now'));
          $arCredito->setFechaInicio($dateFecha);
          $intVrSeguro = $arrayDetalle[6];
          $arCredito->setSeguro($intVrSeguro);
          $em->persist($arCredito);
          }
          }else{
          $empleadoNoExiste = "El numero de identificación " .$arrayDetalle[0]. " No existe";
          }
          }
          }
          }
          fclose($fp);
          if ($empleadoNoExiste <> ""){
          $objMensaje->Mensaje("error", "" .$empleadoNoExiste. "");
          }else{
          if($empleadoSinContrato <> ""){
          $objMensaje->Mensaje("error", "" .$empleadoSinContrato. "");
          }else{
          $em->flush();
          echo "<script languaje='javascript' type='text/javascript'>window.close();window.opener.location.reload();</script>";
          }
          }
          }
          }
          return $this->render('BrasaRecursoHumanoBundle:Movimientos/Creditos:cargarCredito.html.twig', array(
          'form' => $form->createView()
          ));
          } */        