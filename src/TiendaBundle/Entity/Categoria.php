<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace TiendaBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="categorias")
 */
class Categoria {
     /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $nombre;
    
       /**
     * @ORM\Column(type="integer")
     */
    protected $orden;
    
    
        /**
     * @ORM\OneToMany(targetEntity="Producto", mappedBy="categoria")
     */
    protected $productos;

    public function __construct()
    {
        $this->productos = new ArrayCollection();
    }

    
    function getId() {
        return $this->id;
    }

    function getNombre() {
        return $this->nombre;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function getOrden() {
        return $this->orden;
    }

    function setOrden($orden) {
        $this->orden = $orden;
    }
    
     function getProductos() {
        return $this->productos;
    }

    function setProductos($productos) {
        $this->productos = $productos;
    }
}
