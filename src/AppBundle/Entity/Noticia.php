<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Noticia
 *
 * @ORM\Table(name="noticia")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\NoticiaRepository")
 */
class Noticia
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="titulo", type="string", length=255)
     */
    private $titulo;

    /**
     * @var string
     *
     * @ORM\Column(name="resumen", type="string", length=255, nullable=true)
     */
    private $resumen;

    /**
     * @var string
     *
     * @ORM\Column(name="cuerpo", type="text")
     */
    private $cuerpo;

    /**
     * @var bool
     *
     * @ORM\Column(name="visible", type="boolean", nullable=true)
     */
    private $visible;

    /**
     * @var int
     *
     * @ORM\Column(name="orden", type="integer", nullable=true)
     */
    private $orden;

    /**
     * @var bool
     *
     * @ORM\Column(name="activo", type="boolean")
     */
    private $activo;

    /**
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\FotoNoticia", mappedBy="noticia", cascade={"persist", "remove"})
     */
    private $fotoNoticias;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\CategoriaNoticia", inversedBy="noticia")
     * @ORM\JoinColumn(name="categoria_noticia_id", referencedColumnName="id", nullable=true)
     */
    private $categoriaNoticia;

    public function __toString() {
        return $this->getTitulo();
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->fotoNoticias = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set titulo
     *
     * @param string $titulo
     * @return Noticia
     */
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;

        return $this;
    }

    /**
     * Get titulo
     *
     * @return string 
     */
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * Set resumen
     *
     * @param string $resumen
     * @return Noticia
     */
    public function setResumen($resumen)
    {
        $this->resumen = $resumen;

        return $this;
    }

    /**
     * Get resumen
     *
     * @return string 
     */
    public function getResumen()
    {
        return $this->resumen;
    }

    /**
     * Set cuerpo
     *
     * @param string $cuerpo
     * @return Noticia
     */
    public function setCuerpo($cuerpo)
    {
        $this->cuerpo = $cuerpo;

        return $this;
    }

    /**
     * Get cuerpo
     *
     * @return string 
     */
    public function getCuerpo()
    {
        return $this->cuerpo;
    }

    /**
     * Set visible
     *
     * @param boolean $visible
     * @return Noticia
     */
    public function setVisible($visible)
    {
        $this->visible = $visible;

        return $this;
    }

    /**
     * Get visible
     *
     * @return boolean 
     */
    public function getVisible()
    {
        return $this->visible;
    }

    /**
     * Set orden
     *
     * @param integer $orden
     * @return Noticia
     */
    public function setOrden($orden)
    {
        $this->orden = $orden;

        return $this;
    }

    /**
     * Get orden
     *
     * @return integer 
     */
    public function getOrden()
    {
        return $this->orden;
    }

    /**
     * Set activo
     *
     * @param boolean $activo
     * @return Noticia
     */
    public function setActivo($activo)
    {
        $this->activo = $activo;

        return $this;
    }

    /**
     * Get activo
     *
     * @return boolean 
     */
    public function getActivo()
    {
        return $this->activo;
    }

    /**
     * Add fotoNoticias
     *
     * @param \AppBundle\Entity\FotoNoticia $fotoNoticias
     * @return Noticia
     */
    public function addFotoNoticia(\AppBundle\Entity\FotoNoticia $fotoNoticias)
    {
        $this->fotoNoticias[] = $fotoNoticias;

        return $this;
    }

    /**
     * Remove fotoNoticias
     *
     * @param \AppBundle\Entity\FotoNoticia $fotoNoticias
     */
    public function removeFotoNoticia(\AppBundle\Entity\FotoNoticia $fotoNoticias)
    {
        $this->fotoNoticias->removeElement($fotoNoticias);
    }

    /**
     * Get fotoNoticias
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getFotoNoticias()
    {
        return $this->fotoNoticias;
    }

    /**
     * Set categoriaNoticia
     *
     * @param \AppBundle\Entity\CategoriaNoticia $categoriaNoticia
     * @return Noticia
     */
    public function setCategoriaNoticia(\AppBundle\Entity\CategoriaNoticia $categoriaNoticia = null)
    {
        $this->categoriaNoticia = $categoriaNoticia;

        return $this;
    }

    /**
     * Get categoriaNoticia
     *
     * @return \AppBundle\Entity\CategoriaNoticia 
     */
    public function getCategoriaNoticia()
    {
        return $this->categoriaNoticia;
    }
}
