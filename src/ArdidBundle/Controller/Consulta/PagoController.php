<?php

namespace ArdidBundle\Controller\Consulta;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class PagoController extends Controller
{
    /**
     * @Route("/consulta/pago", name="consulta_pago")
     */
    public function listaAction()
    {
        $arUsuario = $this->getUser();        
        $arPagos = $this->getDoctrine()->getRepository('ArdidBundle:Pago')->findBy(array('codigoEmpleadoFk' => $arUsuario->getCodigoEmpleadoFk()));

        return $this->render('ArdidBundle:Consulta:pago.html.twig', array(
                    'arPagos' => $arPagos
        ));
    }
    
    
    /**
     * @Route("/consulta/pago/detalle", name="consulta_pago_detalle")
     */
     public function DetalleAction()
    {
        $arUsuario = $this->getUser();        
        $arPagos = $this->getDoctrine()->getRepository('ArdidBundle:Pago')->findBy(array('codigoEmpleadoFk' => $arUsuario->getCodigoEmpleadoFk()));

        return $this->render('ArdidBundle:Consulta:pago.html.twig', array(
                    'arPagos' => $arPagos
        ));
    }
    
    
}