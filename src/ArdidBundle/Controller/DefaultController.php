<?php

namespace ArdidBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="inicio")
     */
    public function indexAction()
    {
        return $this->render('ArdidBundle:Default:index.html.twig');
    }
    
    /**
     * @Route("/admin")
     */
    public function adminAction()
    {
        return $this->render('ArdidBundle:Default:index.html.twig');
    }    
}
