<?php

namespace ArdidBundle\Controller\Seguridad;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use ArdidBundle\Form\UserType;
use ArdidBundle\Entity\User;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
class SeguridadController extends Controller
{
    /**
     * @Route("/login", name="login")
     */
    public function loginAction(Request $request)
    {
        $authenticationUtils = $this->get('security.authentication_utils');

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();

        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('ArdidBundle:Seguridad:login.html.twig', array(
            'last_username' => $lastUsername,
            'error'         => $error,
        ));
    }

    /**
     * @Route("/login", name="logout")
     */
    public function logoutAction(Request $request)
    {
       
    } 

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
                $password = $encoder->encodePassword($arUser->getUsername(), $arUser->getSalt());
                $arUsuarioValidar = new \ArdidBundle\Entity\User();
                $arUsuarioValidar = $em->getRepository('ArdidBundle:User')->findBy(array('username' => $arUser->getUsername()));
                if($arUsuarioValidar) {
                    $mensaje = "El usuario ya existe, intente restablecer la contraseña";
                } else {
                    $arEmpleado = new \ArdidBundle\Entity\Empleado();
                    $arEmpleado = $em->getRepository('ArdidBundle:Empleado')->findOneBy(array('identificacionNumero' => $arUser->getUsername()));
                    if($arEmpleado) {
                        $arUser->setPassword($password);
                        $arUser->setCodigoEmpleadoFk($arEmpleado->getCodigoEmpleadoPk());
                        $arUser->setNombreCorto($arEmpleado->getNombre1() . " " . $arEmpleado->getNombre2());
                        //$arUser->setIsActive(1);
                        $em->persist($arUser);
                        $em->flush();
                        $this->get('session')->getFlashBag()->add("suceso", "Su registro fue exitoso ingrese con su numero de identificacion y su contraseña que tambien es su numero de identificacion, por su seguridad recuerde cambiarla cuando ingrese al sistema");
                        return $this->redirect($this->generateUrl('login'));                        
                    } else {
                        $mensaje = "Este numero de identificacion no registra movimientos en la plataforma, no se puede crear el usuario";
                    }
                }
            } else {
                $mensaje = "Verifique las contraseñas y un correo valido";
            }
        }
        return $this->render('ArdidBundle:Seguridad:registro.html.twig', array('mensaje' => $mensaje,
                    'form' => $form->createView()
        ));
    }

    /**
     * @Route("/recuperar", name="recuperar_clave")
     */
    public function recuperarClaveAction(Request $request) {
        $em = $this->getDoctrine()->getManager();
        $form = $this->createFormBuilder()
            ->add('TxtNumeroIdentificacion', TextType::class)            
            ->add('BtnRecuperar', SubmitType::class, array('label'  => 'Recuperar',))
            ->getForm();
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            if ($form->isValid()) {
                $numeroIdentificacion = $form->get('TxtNumeroIdentificacion')->getData();
                $arUsuario = new User();
                $arUsuario = $em->getRepository('ArdidBundle:User')->findOneBy(array('username' => $numeroIdentificacion));
                if($arUsuario) {
                    $an = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
                    $su = strlen($an) - 1;
                    $codigo = substr($an, rand(0, $su), 1) .
                            substr($an, rand(0, $su), 1) .
                            substr($an, rand(0, $su), 1) .
                            substr($an, rand(0, $su), 1) .
                            substr($an, rand(0, $su), 1) .
                            substr($an, rand(0, $su), 1); 
                    $arRegistroSeguridad = new \ArdidBundle\Entity\RegistroSeguridad();
                    $arRegistroSeguridad->setFecha(new \DateTime('now'));
                    $arRegistroSeguridad->setCodigo($codigo);
                    $arRegistroSeguridad->setCodigoUsuarioFk($arUsuario->getId());
                    $arRegistroSeguridad->setUsername($arUsuario->getUsername());
                    $em->persist($arRegistroSeguridad);
                    $em->flush();
                    $strMensaje = "Para cambiar la clave ingrese a la direccion: http://www.elempleado.co/ardid/web/app.php/cambiar/clave/" . $codigo;
                    $message = \Swift_Message::newInstance()
                        ->setSubject('Solicitud cambio clave')
                        ->setFrom('sogainformacion@gmail.com', "ArdidApp" )
                        ->setTo(strtolower('maestradaz3@gmail.com'))
                        ->setBody($strMensaje,'text/html');
                    $this->get('mailer')->send($message); 
                    $this->get('session')->getFlashBag()->add("suceso", "Se envio un correo a la direccion " . $arUsuario->getEmail() . " con un enlace para cambiar su clave, puede cerrar esta pestaña y abrir su buzon de correo para seguir el proceso");                      
                } else {
                    $this->get('session')->getFlashBag()->add("suceso", "El usuario no existe");                      
                }
            }
        }
        return $this->render('ArdidBundle:Seguridad:recuperarClave.html.twig', array(
            'form' => $form->createView()
        ));
    }

    /**
     * @Route("/cambiar/clave/{codigo}", name="cambiar_clave")
     */
    public function cambiarClaveAction(Request $request, $codigo) {
        $em = $this->getDoctrine()->getManager();
        $form = $this->createFormBuilder()
            ->add('TxtClave', RepeatedType::class, array(
                'type' => PasswordType::class,
                'first_options'  => array('label' => 'Password'),
                'second_options' => array('label' => 'Repeat Password'),
            ))           
            ->add('BtnCambiar', SubmitType::class, array('label'  => 'Cambiar',))
            ->getForm();
        $form->handleRequest($request);        
        if($codigo) {
            $arRegistroSeguridad = new \ArdidBundle\Entity\RegistroSeguridad();
            $arRegistroSeguridad = $em->getRepository('ArdidBundle:RegistroSeguridad')->findOneBy(array('codigo' => $codigo));
            if(!$arRegistroSeguridad) {                
                $this->get('session')->getFlashBag()->add("suceso", "El codigo de verificacion no existe o caduco");                      
            }            
        }
        if ($form->isSubmitted()) {
            if ($form->isValid()) {
                if($codigo) {
                    $arRegistroSeguridad = new \ArdidBundle\Entity\RegistroSeguridad();
                    $arRegistroSeguridad = $em->getRepository('ArdidBundle:RegistroSeguridad')->findOneBy(array('codigo' => $codigo));
                    if($arRegistroSeguridad) {  
                        $arUsuario = new User();
                        $arUsuario = $em->getRepository('ArdidBundle:User')->find($arRegistroSeguridad->getCodigoUsuarioFk());                        
                        if($arUsuario) {
                            $arUsuarioAct = new User();
                            $arUsuarioAct = $em->getRepository('ArdidBundle:User')->find($arUsuario->getId());                            
                            $clave = $form->get('TxtClave')->getData();
                            $factory = $this->get('security.encoder_factory');
                            $encoder = $factory->getEncoder($arUsuario);
                            $password = $encoder->encodePassword($clave, $arUsuario->getSalt());
                            $arUsuarioAct->setPassword($password);
                            $em->persist($arUsuarioAct);
                            $em->flush();
                            $this->get('session')->getFlashBag()->add("suceso", "La contraseña fue cambiada con exito");                                                  
                            return $this->redirect($this->generateUrl('login'));
                        }                        
                    }            
                }                                
            } else {
                $this->get('session')->getFlashBag()->add("suceso", "Las claves deben ser identicas ");                                                  
            }
        }
        return $this->render('ArdidBundle:Seguridad:cambiarClave.html.twig', array(            
            'form' => $form->createView()
        ));
    }    
    
}
