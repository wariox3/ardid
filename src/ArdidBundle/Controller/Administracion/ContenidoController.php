<?php

namespace ArdidBundle\Controller\Administracion;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use ArdidBundle\Form\ContenidoType;

class ContenidoController extends Controller {

    /**
     * @Route("/administracion/contenido/lista", name="contenido_lista")
     */
    public function listaAction(Request $request) {
        $em = $this->getDoctrine()->getManager();
        $arUsuario = $this->getUser();
        $arContenido = new \ArdidBundle\Entity\Contenido();
        $arContenido = $em->getRepository('ArdidBundle:Contenido')->findBy(array('codigoEmpresaFk' => $arUsuario->getCodigoEmpresaFk()));
        $form = $this->createFormBuilder()
                ->getForm();
        $form->handleRequest($request);

        return $this->render('ArdidBundle:Administracion/Contenido:lista.html.twig', array(
                    'arContenido' => $arContenido,
                    'form' => $form->createView()));
    }

    /**
     * @Route("/administracion/contenido/editar{codigoContenido}", name="contenido_editar")
     */
    public function editarAction(Request $request, $codigoContenido) {
        $em = $this->getDoctrine()->getManager();
        $arUsuario = $this->getUser();
        
        $arContenido = $em->getRepository('ArdidBundle:Contenido')->find($codigoContenido);
        $arContenidoTipo = new \ArdidBundle\Entity\ContenidoTipo();
        $arContenidoTipo = $em->getRepository('ArdidBundle:ContenidoTipo')->find($arContenido->getCodigoContenidoTipoFk());
        $form = $this->createForm(ContenidoType::class, $arContenido);
        $form->handleRequest($request);
        if ($form->isValid()) {
            $arContenido = $form->getData();
            $em->persist($arContenido);
            $em->flush();
            return $this->redirect($this->generateUrl('contenido_lista'));
        }

        return $this->render('ArdidBundle:Administracion/Contenido:editar.html.twig', array(
                    'arContenido' => $arContenido,
                    'arContenidoTipo'=> $arContenidoTipo,
                    'form' => $form->createView()));
    }

}
