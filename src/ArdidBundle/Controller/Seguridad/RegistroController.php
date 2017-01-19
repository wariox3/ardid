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
        $arUser = $em->getRepository('ArdidBundle:User')->findOneBy(array('username' => $form->get('username')->getData()));
        $mensaje = "";
        if ($form->isSubmitted()) {
            //$strSql1 = "SELECT id FROM user WHERE id = " . $codigoEmpresa . " AND numero = '" . $numero . "'";

            if ($form->isValid()) {
                $arUser = $form->getData();
                $factory = $this->get('security.encoder_factory');
                $encoder = $factory->getEncoder($arUser);
                $password = $encoder->encodePassword($arUser->getPassword(), $arUser->getSalt());
                // $arUser->setPassword($password);
                $arUsuarios = new \ArdidBundle\Entity\User();
                $arUsuarios = $em->getRepository('ArdidBundle:User')->findAll();
                $validar = true;

                foreach ($arUsuarios as $arUsuarios) {
                    $identificacion = $arUsuarios->getUsername();
                    $email = $arUsuarios->getEmail();
                    if ($arUsuarios->getUsername() == $form->get('username')->getData()) {
                        $validar = false;
                        $mensaje = "Este numero de identificacion ya existe";
                    }
                    if ($arUsuarios->getEmail() == $form->get('email')->getData()) {
                        $validar = false;
                        $mensaje = "Este correo electronico ya existe";
                    }
                }
                if ($validar == true) {
                    $em->persist($arUser);
                    $em->flush();
                    return $this->redirect($this->generateUrl('login'));
                }
            }
        }
        return $this->render('ArdidBundle:Registro:registro.html.twig', array('mensaje' => $mensaje,
                    'form' => $form->createView()
        ));
    }

}
