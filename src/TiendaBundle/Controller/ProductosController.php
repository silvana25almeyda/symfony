<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace TiendaBundle\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use TiendaBundle\Entity\Producto;

class ProductosController extends Controller{
    
    /**
     * @Route("/productos/")
     */
    public function indexAction(){
        
        $productos = $this->getDoctrine() ->getRepository('TiendaBundle:Producto')->findAll();
        
        $params = array('productos' => $productos);
        
        return $this->render('TiendaBundle:Productos:index.html.twig', $params);
        
    }
    
    /**
     * @Route("/productos/registrar/")
     */
public function registrarAction(){
        
        $categorias = $this->getDoctrine() ->getRepository('TiendaBundle:Categoria')->findAll();
        
        if($this->getRequest()->isMethod('POST')){
            
            $producto = new Producto();
            
            $cat = $this->getDoctrine()->getRepository('TiendaBundle:Categoria')->find($this->getRequest()->get('categorias_id'));
            $producto->setCategoria($cat);
            
            $producto->setNombre($this->getRequest()->get('nombre'));
            $producto->setDescripcion($this->getRequest()->get('descripcion'));
            $producto->setPrecio($this->getRequest()->get('precio'));
            $producto->setStock($this->getRequest()->get('stock'));
            
            $producto->setImagen_nombre($this->getRequest()->get('imagen_nombre'));
            $producto->setImagen_tipo($this->getRequest()->get('imagen_tipo'));
            $producto->setImagen_tamanio($this->getRequest()->get('imagen_tamanio'));
            
            $em = $this->getDoctrine()->getManager();
            $em->persist($producto);
            $em->flush();
            
            $this->addFlash('notice', 'Registro guardado satisfactoriamente');
            return $this->redirectToRoute("tienda_productos_index"); 
        }
        
        $params = array('categorias' => $categorias);
        
        return $this->render('TiendaBundle:Productos:registrar.html.twig', $params);
        
    }
    
    /**
     * @Route("/productos/editar/{id}/")
     */
    public function editarAction($id){
        
        $categorias = $this->getDoctrine() ->getRepository('TiendaBundle:Categoria')->findAll();
        
        $repository = $this->getDoctrine()->getRepository('TiendaBundle:Producto');
        $producto = $repository->find($id);
        
        if($this->getRequest()->isMethod('POST')){
            
            $categoria = $this->getDoctrine()->getRepository('TiendaBundle:Categoria')->find($this->getRequest()->get('categorias_id'));
            $producto->setCategoria($categoria);
            
             $producto->setNombre($this->getRequest()->get('nombre'));
            $producto->setDescripcion($this->getRequest()->get('descripcion'));
            $producto->setPrecio($this->getRequest()->get('precio'));
            $producto->setStock($this->getRequest()->get('stock'));
            
            $producto->setImagen_nombre($this->getRequest()->get('imagen_nombre'));
            $producto->setImagen_tipo($this->getRequest()->get('imagen_tipo'));
            $producto->setImagen_tamanio($this->getRequest()->get('imagen_tamanio'));
            $em = $this->getDoctrine()->getManager();
            $em->flush();
            
            $this->addFlash('notice', 'Registro actualizado satisfactoriamente');
            return $this->redirectToRoute("tienda_productos_index");
        }
        
        $params = array('categorias' => $categorias, 'producto' => $producto);
        
        return $this->render('TiendaBundle:Productos:editar.html.twig', $params);
        
    }
    
    /**
     * @Route("/productos/eliminar/{id}/")
     */
    public function eliminarAction($id){
        
        $repository = $this->getDoctrine()->getRepository('TiendaBundle:Producto');
        $producto = $repository->find($id);
        
        $em = $this->getDoctrine()->getManager();
        $em->remove($producto);
        $em->flush();

        $this->addFlash('notice', 'Registro eliminado satisfactoriamente');
        return $this->redirectToRoute("tienda_productos_index");
        
    }
}
