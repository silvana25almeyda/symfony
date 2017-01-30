<?php
namespace TiendaBundle\Controller;

use \Symfony\Bundle\FrameworkBundle\Controller\Controller;
use \Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use \Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use TiendaBundle\Entity\Rol;

class RolesController extends Controller{
    
    /**
     * @Route("/roles/")
     * @Template()
     */
    public function indexAction() { // tienda_roles_index
        
        $roles = $this->getDoctrine()->getRepository('TiendaBundle:Rol')->findAll();
        
        return ['roles' => $roles];
    }
    
}
