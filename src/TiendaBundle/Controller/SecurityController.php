<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace TiendaBundle\Controller;

/**
 * Description of SecurityController
 *
 * @author PCC-DOMINGO
 */
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class SecurityController extends Controller{
    
    /**
     * @Route("/login", name="login_route")
     */
    public function loginAction(Request $request){
        
        $authenticationUtils = $this->get('security.authentication_utils');

        $error = $authenticationUtils->getLastAuthenticationError();
        $lastUsername = $authenticationUtils->getLastUsername();

        $params = array('error'  => $error, 'last_username' => $lastUsername);
        
        return $this->render('TiendaBundle:Security:login.html.twig', $params);
    }

    /**
     * @Route("/login_check", name="login_check")
     */
    public function loginCheckAction(){
        
    }
    
}
