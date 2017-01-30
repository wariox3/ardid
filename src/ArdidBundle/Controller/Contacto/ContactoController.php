<?php

namespace ArdidBundle\Controller\Contacto;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class ContactoController extends Controller
{
    /**
     * @Route("/contacto", name="contacto")
     */
    public function indexAction()
    {
        return $this->render('ArdidBundle:Contacto:contacto.html.twig');
    }
    
    
}
