<?php

namespace ArdidBundle\Controller\Contacto;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class ContactoController extends Controller {

    /**
     * @Route("/contacto", name="contacto")
     */
    public function indexAction() {
        $form = $this->createFormBuilder()
                ->getForm();
        return $this->render('ArdidBundle:Contacto:contacto.html.twig', array(
                    'form' => $form->createView()));
    }

}
