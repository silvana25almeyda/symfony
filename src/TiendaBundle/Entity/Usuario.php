<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace TiendaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
/**
 * @ORM\Entity
 * @ORM\Table(name="usuarios")
 */

class Usuario implements UserInterface{
       /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     * @ORM\Column(type="string", length=20 , unique=true)
     */
    protected $username;
    
    /**
     * @ORM\Column(type="string", length=40)
     */
    protected $password;
    
    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $nombres;
    
    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $email;
    
    /**
     * @ORM\ManyToOne(targetEntity="Rol", inversedBy="usuarios")
     * @ORM\JoinColumn(name="roles_id", referencedColumnName="id")
     */
    protected $rol;
    
    function getId() {
        return $this->id;
    }

    function getUsername() {
        return $this->username;
    }

    function getPassword() {
        return $this->password;
    }

    function getNombres() {
        return $this->nombres;
    }

    function getEmail() {
        return $this->email;
    }

    function getRol() {
        return $this->rol;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setUsername($username) {
        $this->username = $username;
    }

    function setPassword($password) {
        $this->password = $password;
    }

    function setNombres($nombres) {
        $this->nombres = $nombres;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setRol($rol) {
        $this->rol = $rol;
    }
    
public function getSalt(){
        return null;
    }
    
    public function getRoles(){
        //return array('ROLE_ADMIN');
        return array(($this->getRol()->getId()==1)?'ROLE_ADMIN':'ROLE_USER');
    }

    public function eraseCredentials(){
        
    }

}
