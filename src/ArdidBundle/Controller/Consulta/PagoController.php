<?php

namespace ArdidBundle\Controller\Consulta;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Doctrine\ORM\EntityRepository;
use ArdidBundle\Entity\Empleado;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


class PagoController extends Controller
{
    /**
     * @Route("/consulta/pago", name="consulta_pago")
     */
    public function listaAction(Request $request)
    {  
        $em = $this->getDoctrine()->getManager(); 
        $arUsuario = $this->getUser();  
        $arEmpleado = new  \ArdidBundle\Entity\Empleado();
        $arEmpleado = $em->getRepository('ArdidBundle:Empleado')->findOneBy(array('identificacionNumero'=>$arUsuario->getUsername()));
        $arPagos = $em->getRepository('ArdidBundle:Pago')->findBy(array('codigoEmpleadoFk' => $arEmpleado->getCodigoEmpleadoPk()));
        return $this->render('ArdidBundle:Consulta:pago.html.twig', array(
                    'arPagos' => $arPagos
        ));
    }
    
    
    /**
     * @Route("/consulta/pago/detalle/{codigoPago}", name="consulta_pago_detalle")
     */
     public function DetalleAction(Request $request,$codigoPago)
    {
        $em = $this->getDoctrine()->getManager(); 
        $arUsuario = $this->getUser(); 
        $arPagos= $em->getRepository('ArdidBundle:Pago')->find($codigoPago);
        $arPagoDetalles = $this->getDoctrine()->getRepository('ArdidBundle:PagoDetalle')->findBy(array('numeroFk' => $arPagos->getNumero()));
        $form = $this->createFormBuilder()            
            ->add('BtnImprimir', SubmitType::class, array('label'  => 'Imprimir',))           
            //->add('BtnEnviarCorreo', SubmitType::class, array('label'  => 'Correo',))           
            ->getForm();
        $form->handleRequest($request);
        if($form->isValid()) {
            if ($form->get('BtnImprimir')->isClicked()) {
                $objFormatoPago = new \ArdidBundle\Formato\FormatoPago();
                $objFormatoPago->Generar($em, $codigoPago, $arUsuario->getCodigoEmpresaFk());
            }
        }
        return $this->render('ArdidBundle:Consulta:pagoDetalle.html.twig', array(
                    'arPagos' => $arPagos,  'arPagoDetalles'=>$arPagoDetalles, 'em'=>$em, 'arUsuario'=>$arUsuario,
                    'form' => $form->createView() 
        ));
    }
    
         
    /**
     * @Route("/consulta/pago/detalle/imprimir/{codigoPago}", name="imprimir_pago_detalle")
     */
    /*public function imprimirAction(Request $request, $codigoPago) {

        $em = $this->getDoctrine()->getManager();
        $paginator = $this->get('knp_paginator');
        //$arPagos = new \ardid\ArdidBundle\Entity\Pago();
        $arPagos = $em->getRepository('ArdidBundle:Pago')->find($codigoPago);
        $dql = $em->getRepository('ArdidBundle:PagoDetalle')->listaDql($codigoPagoFk);
        $arPagoDetalles = new \ardid\ArdidBunble\Entity\PagoDetalle();
        $arPagoDetalles = $paginator->paginate($em->createQuery($dql), $request->query->get('page', 1), 50);
        $form = $this->createFormBuilder()            
            ->add('BtnImprimir', SubmitType::class, array('label'  => 'Imprimir',))           
            ->add('BtnEnviarCorreo', SubmitType::class, array('label'  => 'Correo',))           
            ->getForm();
        $form->handleRequest($request);
        if ($form->isValid()) {
            if ($form->get('BtnImprimir')->isClicked()) {
                $objFormatoPago = new \ardid\ArdidBundle\Formato\FormatoPago();
                $objFormatoPago->Generar($em, "", "", $codigoPago);
            }
        }
        return $this->render('ArdidBundle:Consulta:pagoDetalle.html.twig', array(
                    'arPagos' => $arPagos,
                    'arPagoDetalles' => $arPagoDetalles,
                    'form' => $form->createView()                    
        ));
    }*/

}
