<?php

namespace CampusBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/campus/")
     */
    public function indexAction()
    {
        return $this->render('CampusBundle:Default:index.html.twig');
    }
}
