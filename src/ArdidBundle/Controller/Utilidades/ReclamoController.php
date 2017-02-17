<?php

namespace ArdidBundle\Controller\Utilidades;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use ArdidBundle\Form\ReclamoType;
use ArdidBundle\Form\DetalleReclamoType;
use Symfony\Component\HttpFoundation\Request;

class ReclamoController extends Controller {

    /**
     * @Route("/utilidad/reclamo/", name="utilidad_reclamo")
     */
    public function listaAction(Request $request) {
        $em = $this->getDoctrine()->getManager();
        $arUsuario = $this->getUser();
        $arEmpleado = new \ArdidBundle\Entity\Empleado();
        $arEmpleado = $em->getRepository('ArdidBundle:Empleado')->find($arUsuario->getCodigoEmpleadoFk());
        $form = $this->createFormBuilder()
                ->add('BtnEliminar', SubmitType::class, array('label' => 'Eliminar'))
                ->getForm();
        $form->handleRequest($request);
        if ($form->isValid()) {
            if ($form->get('BtnEliminar')->isClicked()) {
                $arrSeleccionados = $request->request->get('ChkSeleccionar');
                foreach ($arrSeleccionados AS $codigoReclamo) {
                    $arReclamo = new \ArdidBundle\Entity\Reclamo();
                    $arReclamo = $em->getRepository('ArdidBundle:Reclamo')->find($codigoReclamo);
                    $em->remove($arReclamo);
                }
                $em->flush();
            }
            return $this->redirect($this->generateUrl('utilidad_reclamo'));
        }
        $arReclamos = new \ArdidBundle\Entity\Reclamo();
        $arReclamos = $em->getRepository('ArdidBundle:Reclamo')->findBy(array('codigoEmpleadoFk' => $arEmpleado->getCodigoEmpleadoPk()));
        return $this->render('ArdidBundle:Utilidad/Reclamo:lista.html.twig', array(
                    'arReclamos' => $arReclamos,
                    'form' => $form->createView()));
    }

    /**
     * @Route("/utilidades/reclamo/nuevo/{codigoReclamo}", name="utilidad_reclamo_nuevo")
     */
    public function nuevoAction(Request $request, $codigoReclamo) {
        $em = $this->getDoctrine()->getManager();
        $arUsuario = $this->getUser();
        if($codigoReclamo == 0){
            $arReclamo = new \ArdidBundle\Entity\Reclamo();
        }else{
          $arReclamo = $em->getRepository('ArdidBundle:Reclamo')->find($codigoReclamo);
        }
        
        $arEmpleado = new \ArdidBundle\Entity\Empleado();
        $arEmpleado = $em->getRepository('ArdidBundle:Empleado')->find($arUsuario->getCodigoEmpleadoFk());
        $nombre = $arEmpleado->getNombreCorto();
        $form = $this->createForm(ReclamoType::class, $arReclamo);
        $form->handleRequest($request);
        if ($form->isValid()) {
            $arReclamo = $form->getData();
            $arReclamo->setEmpleadoRel($arEmpleado);
            if($codigoReclamo == 0){
                   $arReclamo->setFechaSolicitud(new \DateTime('now'));
            }
                $em->persist($arReclamo);
                $em->flush();
                return $this->redirect($this->generateUrl('utilidad_reclamo'));
        }

        return $this->render('ArdidBundle:Utilidad/Reclamo:nuevo.html.twig', array(
                    'arReclamo' => $arReclamo,
                    'nombre' => $nombre,
                    'form' => $form->createView(),
        ));
    }

    /**
     * @Route("/utilidades/reclamo/detalle/{codigoReclamoPk}", name="utilidad_reclamo_detalle")
     */
    Public function detalleAction(Request $request, $codigoReclamoPk) {
        $arUsuario = $this->getUser();
        $em = $this->getDoctrine()->getManager();
        $arReclamo = new \ArdidBundle\Entity\Reclamo();
        $arDetalleReclamo = new \ArdidBundle\Entity\ReclamoSolucion();
        $arReclamo = $em->getRepository('ArdidBundle:Reclamo')->findOneBy(array('codigoReclamoPk' => $codigoReclamoPk));
        $arEmpleado = $em->getRepository('ArdidBundle:Empleado')->findOneBy(array('identificacionNumero' => $arUsuario->getUsername()));
        $arDetalleReclamo = $em->getRepository('ArdidBundle:ReclamoSolucion')->findBy(array('codigoReclamoFk' => $codigoReclamoPk));
        $nombre = $arEmpleado->getNombreCorto();
        $form = $this->createFormBuilder()
                ->getForm();
        $form->handleRequest($request);
         
      

        return $this->render('ArdidBundle:Utilidad/Reclamo:detalle.html.twig', array(
                    'arReclamo' => $arReclamo,
                    'arDetalleReclamo' => $arDetalleReclamo,
                    'nombre' => $nombre,
                    'form' => $form->createView(),
        ));
    }

    /**
     * @Route("/utilidades/reclamo/detalle/nuevo/{codigoReclamoPk}", name="utilidad_reclamo_detalle_nuevo")
     */
    Public function detalleNuevoAction(Request $request, $codigoReclamoPk) {
        $arUsuario = $this->getUser();
        $em = $this->getDoctrine()->getManager();
        $arReclamo = new \ArdidBundle\Entity\Reclamo();
        $arReclamo = $em->getRepository('ArdidBundle:Reclamo')->findOneBy(array('codigoReclamoPk' => $codigoReclamoPk));
        $arDetalleReclamo = new \ArdidBundle\Entity\ReclamoDetalle();
        $form = $this->createForm(DetalleReclamoType::class, $arDetalleReclamo);
        $form->handleRequest($request);

        if ($form->isValid()) {
          
            $arDetalleReclamo->setReclamoDetalleRel($arReclamo);
            $arDetalleReclamo->setFecha(new \DateTime('now'));
            $arDetalleReclamo = $form->getData();
            $em->persist($arDetalleReclamo);
            $em->flush();
            return $this->redirect($this->generateUrl('reclamo_detalle', array(
                                'codigoReclamoPk' => $codigoReclamoPk
            )));
        }

        return $this->render('ArdidBundle:Utilidad/Reclamo:detalleNuevo.html.twig', array(
                    'arReclamo' => $arReclamo,
                    'arDetalleReclamo' => $arDetalleReclamo,
                    'form' => $form->createView()));
    }

}
