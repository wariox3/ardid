<?php

namespace ArdidBundle\Controller\Consulta;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Doctrine\ORM\EntityRepository;
use ArdidBundle\Entity\Empleado;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


class PagoController extends Controller {

    /**
     * @Route("/consulta/pago", name="consulta_pago")
     */
    public function listaAction(Request $request) {
        $em = $this->getDoctrine()->getManager();
        $arUsuario = $this->getUser();
        $arEmpleado = new \ArdidBundle\Entity\Empleado();
        $arEmpleado = $em->getRepository('ArdidBundle:Empleado')->findOneBy(array('identificacionNumero' => $arUsuario->getUsername()));
        $arPagos = $em->getRepository('ArdidBundle:Pago')->findBy(array('codigoEmpleadoFk' => $arEmpleado->getCodigoEmpleadoPk()), array('fechaDesde' => 'DESC'));
        $form = $this->createFormBuilder()
                ->getForm();
        $form->handleRequest($request);
        if ($form->isValid()) {            
            if($request->request->get('opImprimir')) {
                $codigoPago = $request->request->get('opImprimir');
                $objFormatoPago = new \ArdidBundle\Formato\Pago();
                $objFormatoPago->Generar($em, $codigoPago);               
            }
        }
        return $this->render('ArdidBundle:Consulta:pago.html.twig', array(
                    'arPagos' => $arPagos,
                    'form'=> $form->createView()
        ));
    }

    /**
     * @Route("/consulta/pago/detalle/{codigoPago}", name="consulta_pago_detalle")
     */
    public function DetalleAction(Request $request, $codigoPago) {
        $em = $this->getDoctrine()->getManager();
        $arPago = $em->getRepository('ArdidBundle:Pago')->find($codigoPago);        
        $form = $this->createFormBuilder()
                ->add('BtnImprimir', SubmitType::class, array('label' => 'Imprimir',))        
                ->getForm();
        $form->handleRequest($request);
        if ($form->isValid()) {
            if ($form->get('BtnImprimir')->isClicked()) {
                $objFormatoPago = new \ArdidBundle\Formato\Pago();
                $objFormatoPago->Generar($em, $codigoPago);
            }
        }
        $arPagoDetalles = $this->getDoctrine()->getRepository('ArdidBundle:PagoDetalle')->findBy(array('codigoPagoFk' => $codigoPago));
        return $this->render('ArdidBundle:Consulta:pagoDetalle.html.twig', array(
                    'arPago' => $arPago, 
                    'arPagoDetalles' => $arPagoDetalles, 
                    'form' => $form->createView()
        ));
    }

}
