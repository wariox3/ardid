<?php

namespace ArdidBundle\Controller\Consulta;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Doctrine\ORM\EntityRepository;
use ArdidBundle\Entity\Empleado;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class certificadoLaboralController extends Controller {

    /**
     * @Route("/consulta/certificadoLaboral", name="certificado_laboral")
     */
    public function laboralAction(Request $request) {
        $em = $this->getDoctrine()->getManager();
        $arUsuario = $this->getUser();
        $arEmpleado = new \ArdidBundle\Entity\Empleado();
        $arEmpleado = $em->getRepository('ArdidBundle:Empleado')->findOneBy(array('identificacionNumero' => $arUsuario->getUsername()));
        $arContratos = $em->getRepository('ArdidBundle:contrato')->findBy(array('codigoEmpleadoFk' => $arEmpleado->getCodigoEmpleadoPk()));
        $form = $this->createFormBuilder()
                ->getForm();
        $form->handleRequest($request);
        if ($form->isValid()) {            
            if($request->request->get('opImprimir')) {
                $codigoContrato = $request->request->get('opImprimir');
                $objFormatoPago = new \ArdidBundle\Formato\FormatoCertificadoLaboral();
                $objFormatoPago->Generar($em, $codigoContrato);               
            }
        }
        return $this->render('ArdidBundle:Consulta:certificadoLaboral.html.twig', array(
                    'arContratos' => $arContratos,
                    'form'=> $form->createView()
        ));
    }
}