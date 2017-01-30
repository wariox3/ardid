<?php

namespace ArdidBundle\Controller\Utilidades;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class InformacionEmpresaController extends Controller
{
    /**
     * @Route("/utilidades/informacion/empresa", name="informacion_empresa")
     */
    public function indexAction()
    {
        return $this->render('ArdidBundle:Utilidades:informacionEmpresa.html.twig');
    }
    
     
}
