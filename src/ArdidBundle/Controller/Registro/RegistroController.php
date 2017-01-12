<?php


namespace ArdidBundle\Controller\Registro;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Doctrine\ORM\EntityRepository;


class RegistroController extends Controller
{
    /**
     * @Route("/registro", name="registro")
     */
    public function registroAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $arUser = new \ArdidBundle\Entity\User();
        $arEmpleado = new \ArdidBundle\Entity\Empleado();
        $arController = $request->request->all();
        $arEmpleado = $em->getRepository('ArdidBundle:Empleado')->findOneBy(array('identificacionNumero' => 1));
        $form = $this->createFormBuilder()           
            ->getForm();
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            if($request->request->get('Guardar')){
                if($arController['identificacionNumero']){
                    echo "Lleno";
                }else{
                    echo "Vacio";
                }
            }
        }
        
        return $this->render('ArdidBundle:Registro:registro.html.twig', array(
            'form' => $form->createView()));
       
    }
    }
