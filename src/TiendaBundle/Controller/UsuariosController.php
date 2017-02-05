<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace TiendaBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use TiendaBundle\Entity\Usuario;

class UsuariosController extends Controller{
    
    /**
     * @Route("/usuarios/")
     */
    public function indexAction(){
        
        $usuarios = $this->getDoctrine() ->getRepository('TiendaBundle:Usuario')->findAll();
        
        $params = array('usuarios' => $usuarios);
        
        return $this->render('TiendaBundle:Usuarios:index.html.twig', $params);
        
    }
    
    /**
     * @Route("/usuarios/registrar/")
     */
public function registrarAction(){
        
        $roles = $this->getDoctrine() ->getRepository('TiendaBundle:Rol')->findAll();
        
        if($this->getRequest()->isMethod('POST')){
            
            $usuario = new Usuario();
            $usuario->setUsername($this->getRequest()->get('username'));
            $usuario->setPassword($this->getRequest()->get('password'));
            $usuario->setNombres($this->getRequest()->get('nombres'));
            $usuario->setEmail($this->getRequest()->get('email'));
            
            $rol = $this->getDoctrine()->getRepository('TiendaBundle:Rol')->find($this->getRequest()->get('roles_id'));
            $usuario->setRol($rol);
            
            $em = $this->getDoctrine()->getManager();
            $em->persist($usuario);
            $em->flush();
            
            $this->addFlash('notice', 'Registro guardado satisfactoriamente');
            return $this->redirectToRoute("tienda_usuarios_index"); 
        }
        
        $params = array('roles' => $roles);
        
        return $this->render('TiendaBundle:Usuarios:registrar.html.twig', $params);
        
    }
    
    /**
     * @Route("/usuarios/editar/{id}/")
     */
    public function editarAction($id){
        
        $roles = $this->getDoctrine() ->getRepository('TiendaBundle:Rol')->findAll();
        
        $repository = $this->getDoctrine()->getRepository('TiendaBundle:Usuario');
        $usuario = $repository->find($id);
        
        if($this->getRequest()->isMethod('POST')){
            
            $usuario->setUsername($this->getRequest()->get('username'));
            $usuario->setPassword($this->getRequest()->get('password'));
            $usuario->setNombres($this->getRequest()->get('nombres'));
            $usuario->setEmail($this->getRequest()->get('email'));
            
            $rol = $this->getDoctrine()->getRepository('TiendaBundle:Rol')->find($this->getRequest()->get('roles_id'));
            $usuario->setRol($rol);
            
            $em = $this->getDoctrine()->getManager();
            $em->flush();
            
            $this->addFlash('notice', 'Registro actualizado satisfactoriamente');
            return $this->redirectToRoute("tienda_usuarios_index");
        }
        
        $params = array('roles' => $roles, 'usuario' => $usuario);
        
        return $this->render('TiendaBundle:Usuarios:editar.html.twig', $params);
        
    }
    
    /**
     * @Route("/usuarios/eliminar/{id}/")
     */
    public function eliminarAction($id){
        
        $repository = $this->getDoctrine()->getRepository('TiendaBundle:Usuario');
        $usuario = $repository->find($id);
        
        $em = $this->getDoctrine()->getManager();
        $em->remove($usuario);
        $em->flush();

        $this->addFlash('notice', 'Registro eliminado satisfactoriamente');
        return $this->redirectToRoute("tienda_usuarios_index");
        
    }
    
}


