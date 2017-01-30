<?php

namespace ArdidBundle\Controller\Estadisticas;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class EstadisticasController extends Controller {

    /**
     * @Route("/estadisticas/pago", name="estadisticas_pago")
     */
    public function indexAction() {
        return $this->render('ArdidBundle:Estadisticas:estadisticasPago.html.twig');
    }

}
