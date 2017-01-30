<?php

namespace ArdidBundle\Controller\Utilidades;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class LiquidarNominaController extends Controller
{
    /**
     * @Route("/utilidades/liquidar/nomina", name="liquidar_nomina")
     */
    public function indexAction()
    {
        return $this->render('ArdidBundle:Utilidades:liquidarNomina.html.twig');
    }
    
  
}
