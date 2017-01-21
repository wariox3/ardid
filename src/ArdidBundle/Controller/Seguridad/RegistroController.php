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
        $mensaje = "";
        if ($form->isSubmitted()) {
            if ($form->isValid()) {
                $arUser = $form->getData();
                $factory = $this->get('security.encoder_factory');
                $encoder = $factory->getEncoder($arUser);
                $password = $encoder->encodePassword($arUser->getPassword(), $arUser->getSalt());
                $arUsuarioValidar = new \ArdidBundle\Entity\User();
                $arUsuarioValidar = $em->getRepository('ArdidBundle:User')->findBy(array('username' => $arUser->getUsername()));
                if($arUsuarioValidar) {
                    $mensaje = "El usuario ya existe, intente restablecer la contraseña";
                } else {
                    $arEmpleado = new \ArdidBundle\Entity\Empleado();
                    $arEmpleado = $em->getRepository('ArdidBundle:Empleado')->findOneBy(array('identificacionNumero' => $arUser->getUsername()));                    
                    if($arEmpleado) {
                        if($arUser->getEmail() == $arEmpleado->getCorreo()) {
                            $an = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ-)(.:,;";
                            $su = strlen($an) - 1;
                            $codigo = substr($an, rand(0, $su), 1) .
                                    substr($an, rand(0, $su), 1) .
                                    substr($an, rand(0, $su), 1) .
                                    substr($an, rand(0, $su), 1) .
                                    substr($an, rand(0, $su), 1) .
                                    substr($an, rand(0, $su), 1); 
                            $arUser->setCodigoVerificacion($codigo);
                            $arUser->setPassword($password);
                            $arUser->setCodigoEmpleadoFk($arEmpleado->getCodigoEmpleadoPk());
                            //$arUser->setIsActive(1);
                            $em->persist($arUser);
                            $em->flush();                            
                            return $this->redirect($this->generateUrl('login'));                                                    
                        } else {
                            $mensaje = "Correo electronico diferente al registrado en empleado: " . $arEmpleado->getCorreo();
                        }
                    } else {
                        $mensaje = "Este numero de identificacion no registra movimientos en la plataforma, no se puede crear el usuario";
                    }
                }                
            } else {
                $mensaje = "Verifique las contraseñas y un correo valido";
            }
        }
        return $this->render('ArdidBundle:Registro:registro.html.twig', array('mensaje' => $mensaje,
                    'form' => $form->createView()
        ));
    }
}
