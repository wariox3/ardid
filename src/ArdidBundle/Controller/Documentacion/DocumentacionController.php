<?php

namespace ArdidBundle\Controller\Documentacion;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DocumentacionController extends Controller
{
    /**
     * @Route("/documentacion", name="documentacion")
     */
    public function indexAction()
    {
        return $this->render('ArdidBundle:Documentacion:documentacion.html.twig');
    }
    
     
}
