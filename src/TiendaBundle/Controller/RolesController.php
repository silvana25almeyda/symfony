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
//                $params = array('roles' => $roles);
//        
//        return $this->render('Roles/index.html.twig', $params);

    }
        /**
     * @Route("/roles/registrar/")
     */
    public function registrarAction(){
        
        if($this->getRequest()->isMethod('POST')){
            $rol = new Rol();
            $rol->setNombre($this->getRequest()->get('nombre'));
            
            $em = $this->getDoctrine()->getManager();
            $em->persist($rol);
            $em->flush();
            
            $this->addFlash('notice', 'Registro guardado satisfactoriamente');
            return $this->redirect('../');
        }
        
        return $this->render('Roles/registrar.html.twig');
        
    }
    
    /**
     * @Route("/roles/editar/{id}/")
     */
    public function editarAction($id){
        
        $repository = $this->getDoctrine()->getRepository('AppBundle:Rol');
        $rol = $repository->find($id);
        
        if($this->getRequest()->isMethod('POST')){
            
            $rol->setNombre($this->getRequest()->get('nombre'));
            
            $em = $this->getDoctrine()->getManager();
            $em->flush();
            
            $this->addFlash('notice', 'Registro actualizado satisfactoriamente');
            return $this->redirect('../../');
        }
        
        $params = array('rol' => $rol);
        return $this->render('Roles/editar.html.twig', $params);
        
    }
    
    /**
     * @Route("/roles/eliminar/{id}/")
     */
    public function eliminarAction($id){
        
        $repository = $this->getDoctrine()->getRepository('AppBundle:Rol');
        $rol = $repository->find($id);
        
        $em = $this->getDoctrine()->getManager();
        $em->remove($rol);
        $em->flush();

        $this->addFlash('notice', 'Registro eliminado satisfactoriamente');
        return $this->redirect('../../');
        
    }
    
}


