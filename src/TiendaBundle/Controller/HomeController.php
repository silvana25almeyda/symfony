<?php
namespace TiendaBundle\Controller;

use \Symfony\Bundle\FrameworkBundle\Controller\Controller;
use \Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use \Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class HomeController extends Controller{
    
    /**
     * @Route("/home/{mes}/")
     * @Template() 
     */
    public function indexAction(Request $request, $mes) { // tienda_home_index
        
        $nombre = $request->query->get('nombre');
        
        $params = [
            'nombres' => $nombre,
            'titulo' => 'Tienda Virtual',
            'mes' => $mes,
            'total' => 100,
        ];
        
//        return $this->render('TiendaBundle::home/index.html.twig', $params);
        return $params;
    }
    
    /**
     * @Route("/test/")
     * @Template() 
     */
    public function testAction() {
        
//        return $this->render('TiendaBundle::home/test.html.twig');
        return [];
    }
    
    /**
     * @Route("/grabar/")
     * @Template() 
     */
    public function grabarAction() {
        
        return $this->redirectToRoute('tienda_home_index');
    }
}
