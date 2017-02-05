<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace TiendaBundle\Controller;
use \Symfony\Bundle\FrameworkBundle\Controller\Controller;
use \Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use \Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use TiendaBundle\Entity\Categoria;

class CategoriasController  extends Controller{
     
    /**
     * @Route("/categorias/")
     * @Template()
     */
    public function indexAction() { // tienda_roles_index
        
        $categorias = $this->getDoctrine()->getRepository('TiendaBundle:Categoria')->findAll();
        
     
                $params = array('categorias' => $categorias);
        
        return $this->render('TiendaBundle:Categorias:index.html.twig', $params);

    }
        /**
     * @Route("/categorias/registrar/")
     */
    public function registrarAction(){
        
        if($this->getRequest()->isMethod('POST')){
            $cat = new Categoria();
            $cat->setNombre($this->getRequest()->get('nombre'));
            $cat->setOrden(1);
            
            $em = $this->getDoctrine()->getManager();
            $em->persist($cat);
            $em->flush();
            
            $this->addFlash('notice', 'Registro guardado satisfactoriamente');
            return $this->redirect('../');
        }
        
        return $this->render('TiendaBundle:Categorias:registrar.html.twig');
        
    }
    
    /**
     * @Route("/categorias/editar/{id}/")
     */
    public function editarAction($id){
        
        $repository = $this->getDoctrine()->getRepository('TiendaBundle:Categoria');
        $categoria = $repository->find($id);
        
        if($this->getRequest()->isMethod('POST')){
            
            $categoria->setNombre($this->getRequest()->get('nombre'));
            
            $em = $this->getDoctrine()->getManager();
            $em->flush();
            
            $this->addFlash('notice', 'Registro actualizado satisfactoriamente');
            return $this->redirect('../../');
        }
        
        $params = array('categoria' => $categoria);
        return $this->render('TiendaBundle:Categorias:editar.html.twig', $params);
        
    }
    
    /**
     * @Route("/categorias/eliminar/{id}/")
     */
    public function eliminarAction($id){
        
        $repository = $this->getDoctrine()->getRepository('TiendaBundle:Categoria');
        $rol = $repository->find($id);
        
        $em = $this->getDoctrine()->getManager();
        $em->remove($rol);
        $em->flush();

        $this->addFlash('notice', 'Registro eliminado satisfactoriamente');
        return $this->redirect('../../');
        
    }
}
