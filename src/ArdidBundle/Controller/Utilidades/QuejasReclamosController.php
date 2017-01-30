<?php

namespace ArdidBundle\Controller\Utilidades;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class QuejasReclamosController extends Controller
{
    /**
     * @Route("/utilidades/quejasreclamos", name="quejas_reclamos")
     */
    public function indexAction()
    {
        return $this->render('ArdidBundle:Utilidades:quejasReclamos.html.twig');
    }
    
     
}
