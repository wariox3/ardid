<?php

namespace ArdidBundle\Controller\Seguridad;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Doctrine\ORM\EntityRepository;
use ArdidBundle\Form\UserType;

class RecuperarClaveController extends Controller {

    /**
     * @Route("/recuperar", name="recuperar")
     */
    public function recuperarAction() {
    
       
        return $this->render('ArdidBundle:seguridad:recuperarClave.html.twig', array(
                    'form' => $form->createView(),
        ));
    }

}
