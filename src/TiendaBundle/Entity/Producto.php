<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace TiendaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="productos")
 */
class Producto {
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
     * @ORM\Column(type="text")
     */
    protected $descripcion;
    
    /**
     * @ORM\Column(name="precio", type="decimal", precision=10, scale=2, nullable=true)
     */
    protected $precio;
    
     
    /**
     * @ORM\Column(type="integer")
     */
    protected $stock;
    
    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $imagen_nombre;
    
     
    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $imagen_tipo;
    
    /**
     * @ORM\Column(type="integer")
     */
    protected $imagen_tamanio;
    
/**
     * @ORM\ManyToOne(targetEntity="Categoria", inversedBy="productos")
     * @ORM\JoinColumn(name="categorias_id", referencedColumnName="id")
     */
    protected $categoria;
    
    function getId() {
        return $this->id;
    }

    function getCategoria() {
        return $this->categoria;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function getPrecio() {
        return $this->precio;
    }

    function getStock() {
        return $this->stock;
    }

    function getImagen_nombre() {
        return $this->imagen_nombre;
    }

    function getImagen_tipo() {
        return $this->imagen_tipo;
    }

    function getImagen_tamanio() {
        return $this->imagen_tamanio;
    }

    
    function setId($id) {
        $this->id = $id;
    }

    function setCategoria($categoria) {
        $this->categoria = $categoria;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    function setPrecio($precio) {
        $this->precio= $precio;
    }

    function setStock($stock) {
        $this->stock = $stock;
    }
     function setImagen_nombre($imagen_nombre) {
        $this->imagen_nombre= $imagen_nombre;
    }

    function setImagen_tipo($imagen_tipo) {
        $this->imagen_tipo= $imagen_tipo;
    }

    function setImagen_tamanio($imagen_tamanio) {
        $this->imagen_tamanio = $imagen_tamanio;
    }

}
