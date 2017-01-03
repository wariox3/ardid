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
                $arUsuario = $this->getUser();
                $arEmpresa = new \ArdidBundle\Entity\Empresa();
                $arEmpresa = $em->getRepository('ArdidBundle:Empresa')->find($arUsuario->getCodigoEmpresaFk());
                while (!feof($fp)) {
                    $linea = fgets($fp);
                    if ($linea) {
                        $tipoRegistro = substr($linea, 0, 1);
                        if ($tipoRegistro == 1) {
                            $tipoPago = substr($linea, 1, 2);
                            $arPagoTipo = new \ArdidBundle\Entity\PagoTipo();
                            $arPagoTipo = $em->getRepository('ArdidBundle:PagoTipo')->find($tipoPago);
                            $fechaDesde = substr($linea, 3, 10);
                            $fechaHasta = substr($linea, 13, 10);
                            $numero = substr($linea, 23, 9);
                            $vrDeduccion = substr($linea, 32, 11);
                            $vrNeto = substr($linea, 43, 11);
                            $vrDevengado = substr($linea, 54, 11);
                            $tipoDocumento = substr ($linea, 65, 2);
                            $numeroDocumento = substr ($linea, 67, 16);
                            $fecha1 = date_create($fechaDesde);
                            $fecha2 = date_create($fechaHasta);
                            
                            $arPago = new \ArdidBundle\Entity\Pago();
                            $arPago->setEmpresaRel($arEmpresa);
                            $arPago->setPagoTipoRel($arPagoTipo);
                            $arPago->setFechaDesde($fecha1);
                            $arPago->setFechaHasta($fecha2);
                            $arPago->setNumero($numero);
                            $arPago->setVrDeducciones($vrDeduccion);
                            $arPago->setVrNeto($vrNeto);
                            $arPago->setVrDevengado($vrDevengado);
                            $em->persist($arPago);                          
                        } 
                        if ($tipoRegistro == 2) {
                            $concepto = substr($linea, 1, 80);
                            $vrPago = substr($linea, 81, 11);
                            $operacion = substr($linea, 92, 1);
                            $horas = substr($linea, 93, 10);
                            $porcetaje = substr($linea, 103, 4);
                            $dias = substr($linea, 107, 4);
                            $vrNetoDetalle = substr($linea, 111, 11);
                            $numeroDetalle = substr($linea, 122, 9);

                            $arPagoDetalles = new \ArdidBundle\Entity\PagoDetalle();
                            $arPagoDetalles->setconcepto($concepto);
                            $arPagoDetalles->setVrPago($vrPago);
                            $arPagoDetalles->setEmpresaRel($arEmpresa);
                            $arPagoDetalles->setVrNeto($vrNetoDetalle);
                            $arPagoDetalles->setOperacion($operacion);
                            $arPagoDetalles->setHoras($horas);
                            $arPagoDetalles->setDias($dias);
                            $arPagoDetalles->setPorcentaje($porcetaje);
                            $arPagoDetalles->setNumeroFk($numeroDetalle);
                            $em->persist($arPagoDetalles);
                        }
                        
                    }
                }
                echo($tipoDocumento);
                $em->flush();
            }
        }
        return $this->render('ArdidBundle:Administracion:Carga.html.twig', array(
                    'form' => $form->createView()));
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