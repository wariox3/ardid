<?php

namespace ArdidBundle\Controller\Seguridad;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Doctrine\ORM\EntityRepository;
use ArdidBundle\Form\UserType;
class RegistroController extends Controller {

    /**
     * @Route("/registro", name="registro")
     */
    public function registroAction(Request $request) {
        $em = $this->getDoctrine()->getManager();
        $arUser = new \ArdidBundle\Entity\User();       
        $form = $this->createForm(UserType::class, $arUser);      
        $form->handleRequest($request);        
        if ($form->isSubmitted()) {
            if ($form->isValid()) {                
                $arUser = $form->getData();
                $factory = $this->get('security.encoder_factory');                        
                $encoder = $factory->getEncoder($arUser);            
                $password = $encoder->encodePassword($arUser->getPassword(), $arUser->getSalt());                
                $arUser->setPassword($password);
                $em->persist($arUser);
                $em->flush();
                return $this->redirect($this->generateUrl('login'));                
            } else {
                echo "Las contraseñas no coinciden o el correo electronico no es valido";
            }
        } 
        return $this->render('ArdidBundle:Registro:registro.html.twig', array(
                    'form' => $form->createView()));
    }

}
