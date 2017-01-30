<?php

namespace ArdidBundle\Controller\Ayuda;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class AyudaController extends Controller
{
    /**
     * @Route("/ayuda", name="ayuda")
     */
    public function indexAction()
    {
        return $this->render('ArdidBundle:Ayuda:Ayuda.html.twig');
    }
    
 
}
