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
        $pagos = $this->getDoctrine()
                ->getRepository('ArdidBundle:Pago')
                ->findAll();

        return $this->render('ArdidBundle:Consulta:pago.html.twig', array(
                    'pagos' => $pagos
        ));
    }
    
    
}