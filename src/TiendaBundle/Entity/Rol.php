<?php
namespace TiendaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="roles")
 */

class Rol {
    
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=20)
     */
    protected $nombre;
    
    
        /**
     * @ORM\OneToMany(targetEntity="Usuario", mappedBy="rol")
     */
    protected $usuarios;

    public function __construct()
    {
        $this->usuarios = new ArrayCollection();
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

    function getUsuarios() {
        return $this->usuarios;
    }

    function setUsuarios($usuarios) {
        $this->usuarios = $usuarios;
    }

}
