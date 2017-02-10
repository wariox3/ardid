<?php

namespace ArdidBundle\Controller\Utilidades;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use ArdidBundle\Form\ReclamoType;
use Symfony\Component\HttpFoundation\Request;

class ReclamoController extends Controller {

    /**
     * @Route("/utilidades/reclamos/", name="reclamo")
     */
    public function listaAction(Request $request) {
        $arUsuario = $this->getUser();
        $em = $this->getDoctrine()->getManager();
        $arReclamo = new \ArdidBundle\Entity\Reclamo();
        $arEmpleado = new \ArdidBundle\Entity\Empleado();
        $arEmpleado = $em->getRepository('ArdidBundle:Empleado')->findOneBy(array('identificacionNumero' => $arUsuario->getUsername()));
        $arReclamo = $em->getRepository('ArdidBundle:Reclamo')->findBy(array('codigoEmpleadoFk' => $arEmpleado->getCodigoEmpleadoPk()));
        $form = $this->createFormBuilder()
                ->add('BtnEliminar', SubmitType::class, array('label' => 'Eliminar'))
                ->getForm();
        $form->handleRequest($request);
        if ($form->isValid()) {
          if ($form->get('BtnEliminar')->isClicked()) {
                $arrSeleccionados = $request->request->get('ChkSeleccionar');
                foreach ($arrSeleccionados AS $codigoReclamoPk) {
                    $arReclamo = new \ArdidBundle\Entity\Reclamo();
                    $arReclamo = $em->getRepository('ArdidBundle:Reclamo')->find($codigoReclamoPk);
                    $em->remove($arReclamo);
                }
                $em->flush();
            }
                return $this->redirect($this->generateUrl('reclamo'));                
        }
        return $this->render('ArdidBundle:Utilidades:reclamo.html.twig', array(
                    'arReclamo' => $arReclamo,
                    'form' => $form->createView()));
    }

    /**
     * @Route("/utilidades/reclamo/nuevo/", name="reclamo_nuevo")
     */
    public function nuevoAction(Request $request) {
        $arUsuario = $this->getUser();
        $em = $this->getDoctrine()->getManager();
        $arReclamo = new \ArdidBundle\Entity\Reclamo();
        $arEmpleado = new \ArdidBundle\Entity\Empleado();
        $arEmpresa = new \ArdidBundle\Entity\Empresa();
        $arEmpleado = $em->getRepository('ArdidBundle:Empleado')->findOneBy(array('identificacionNumero' => $arUsuario->getUsername()));
        $arEmpresa = $em->getRepository('ArdidBundle:Empresa')->findOneBy(array('codigoEmpresaPk' => $arUsuario->getCodigoEmpresaFk()));
        $nombre = $arEmpleado->getNombreCorto();
        $form = $this->createForm(ReclamoType::class, $arReclamo);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $arReclamo->setEmpleadoRel($arEmpleado);
            $arReclamo->setEmpresaRel($arEmpresa);
            $arReclamo->setFechaGeneracion(new \DateTime('now'));
            $fecha = $arReclamo->getFechaGeneracion();
//            $fechaRespuesta = strtotime( '+2 day' , strtotime("$fecha")) ;   
//            $fechaRespuesta = date ( 'Y-m-j' , $fechaRespuesta );
//            $arReclamo->setFechaRespuesta($fechaRespuesta);

            $arReclamo = $form->getData();

            if ($form->get('reclamoTipoRel')->getData() == null) {
                $objMensaje->Mensaje("error", "Se debe elegir un tipo");
            } else {
                $em->persist($arReclamo);
                $em->flush();
                return $this->redirect($this->generateUrl('reclamo'));
            }
        }


        return $this->render('ArdidBundle:Utilidades:nuevoReclamo.html.twig', array(
                    'arReclamo' => $arReclamo,
                    'nombre' => $nombre,
                    'form' => $form->createView(),
        ));
    }

    /**
     * @Route("/utilidades/reclamo/detalle/{codigoReclamoPk}", name="reclamo_detalle")
     */
    Public function detalleAction(Request $request, $codigoReclamoPk) {
        $arUsuario = $this->getUser();
        $em = $this->getDoctrine()->getManager();
        $arReclamo = new \ArdidBundle\Entity\Reclamo();
        $arReclamo = $em->getRepository('ArdidBundle:Reclamo')->findOneBy(array('codigoReclamoPk' => $codigoReclamoPk));
        $arDetalleReclamo = new \ArdidBundle\Entity\ReclamoDetalle();
        $arEmpleado = new \ArdidBundle\Entity\Empleado();
        $arEmpleado = $em->getRepository('ArdidBundle:Empleado')->findOneBy(array('identificacionNumero' => $arUsuario->getUsername()));
        $nombre = $arEmpleado->getNombreCorto();
        $form = $this->createFormBuilder()
                ->getForm();
        $form->handleRequest($request);
        
        return $this->render('ArdidBundle:Utilidades:detalleReclamo.html.twig', array(
                    'arDetalleReclamo' => $arDetalleReclamo,
                    'arReclamo' => $arReclamo,
                    'nombre' => $nombre,
                    'form' => $form->createView(),
        ));
    }

    /**
     * @Route("/utilidades/reclamo/detalle/nuevo/{codigoReclamoPk}", name="reclamo_detalle_nuevo")
     */
    Public function detalleNuevoAction(Request $request, $codigoReclamoPk) {
        $arUsuario = $this->getUser();
        $em = $this->getDoctrine()->getManager();
        $arDetalleReclamo = new \ArdidBundle\Entity\DetalleReclamo();
        $arDetalleReclamo = $em->getRepository('ArdidBundle:DetalleReclamo')->findOneBy(array('codigoReclamoFk' => $codigoDetalleReclamoPk));
        $form = $this->createForm(ReclamoType::class, $arDetalleReclamo);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $arDetalleReclamo = $form->getData();
            $em->persist($arReclamo);
            $em->flush();
            return $this->redirect($this->generateUrl('reclamo_detalle'));
        }

        return $this->render('ArdidBundle:Utilidades:detalleNuevoReclamo.html.twig', array(
                    'form' => $form->createView()));
    }

}
