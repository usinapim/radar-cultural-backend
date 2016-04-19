<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Agenda
 *
 * @ORM\Table(name="agendas")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\AgendaRepository")
 */
class Agenda
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
     * @ORM\Column(name="titulo", type="string", length=255, unique=true)
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
     * @var \DateTime
     *
     * @ORM\Column(name="visible_desde", type="datetime", nullable=true)
     */
    private $visibleDesde;

    /**
     * @var string
     *
     * @ORM\Column(name="visible_hasta", type="datetime", nullable=true)
     */
    private $visibleHasta;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_evento_desde", type="datetime")
     */
    private $fechaEventoDesde;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_evento_hasta", type="datetime")
     */
    private $fechaEventoHasta;

    /**
     * @var int
     *
     * @ORM\Column(name="orden", type="integer", nullable=true)
     */
    private $orden;

    /**
     * @var string
     *
     * @ORM\Column(name="creacion", type="string", length=255, nullable=true)
     */
    private $creacion;

    /**
     * @var bool
     *
     * @ORM\Column(name="activo", type="boolean", nullable=true)
     */
    private $activo;

    /**
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\FotoAgenda", mappedBy="agenda", cascade={"persist", "remove"})
     */
    private $fotoAgenda;

    /**
     * @var datetime $creado
     *
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(name="creado", type="datetime")
     */
    private $creado;

    /**
     * @var datetime $actualizado
     *
     * @Gedmo\Timestampable(on="update")
     * @ORM\Column(name="actualizado",type="datetime")
     */
    private $actualizado;

    /**
     * @var integer $creadoPor
     *
     * @Gedmo\Blameable(on="create")
     * @ORM\ManyToOne(targetEntity="UsuariosBundle\Entity\Usuario")
     * @ORM\JoinColumn(name="creado_por", referencedColumnName="id", nullable=true)
     */
    private $creadoPor;

    /**
     * @var integer $actualizadoPor
     *
     * @Gedmo\Blameable(on="update")
     * @ORM\ManyToOne(targetEntity="UsuariosBundle\Entity\Usuario")
     * @ORM\JoinColumn(name="actualizado_por", referencedColumnName="id", nullable=true)
     */
    private $actualizadoPor;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\CategoriaAgenda", inversedBy="agenda")
     * @ORM\JoinColumn(name="categoria_agenda_id", referencedColumnName="id", nullable=true)
     */
    private $categoriaAgenda;

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
     * @return Agenda
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
     * @return Agenda
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
     * @return Agenda
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
     * Set visibleDesde
     *
     * @param \DateTime $visibleDesde
     * @return Agenda
     */
    public function setVisibleDesde($visibleDesde)
    {
        $this->visibleDesde = $visibleDesde;

        return $this;
    }

    /**
     * Get visibleDesde
     *
     * @return \DateTime 
     */
    public function getVisibleDesde()
    {
        return $this->visibleDesde;
    }

    /**
     * Set visibleHasta
     *
     * @param string $visibleHasta
     * @return Agenda
     */
    public function setVisibleHasta($visibleHasta)
    {
        $this->visibleHasta = $visibleHasta;

        return $this;
    }

    /**
     * Get visibleHasta
     *
     * @return string 
     */
    public function getVisibleHasta()
    {
        return $this->visibleHasta;
    }

    /**
     * Set fechaEventoDesde
     *
     * @param \DateTime $fechaEventoDesde
     * @return Agenda
     */
    public function setFechaEventoDesde($fechaEventoDesde)
    {
        $this->fechaEventoDesde = $fechaEventoDesde;

        return $this;
    }

    /**
     * Get fechaEventoDesde
     *
     * @return \DateTime 
     */
    public function getFechaEventoDesde()
    {
        return $this->fechaEventoDesde;
    }

    /**
     * Set fechaEventoHasta
     *
     * @param \DateTime $fechaEventoHasta
     * @return Agenda
     */
    public function setFechaEventoHasta($fechaEventoHasta)
    {
        $this->fechaEventoHasta = $fechaEventoHasta;

        return $this;
    }

    /**
     * Get fechaEventoHasta
     *
     * @return \DateTime 
     */
    public function getFechaEventoHasta()
    {
        return $this->fechaEventoHasta;
    }

    /**
     * Set orden
     *
     * @param integer $orden
     * @return Agenda
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
     * Set creacion
     *
     * @param string $creacion
     * @return Agenda
     */
    public function setCreacion($creacion)
    {
        $this->creacion = $creacion;

        return $this;
    }

    /**
     * Get creacion
     *
     * @return string 
     */
    public function getCreacion()
    {
        return $this->creacion;
    }

    /**
     * Set activo
     *
     * @param boolean $activo
     * @return Agenda
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
     * Constructor
     */
    public function __construct()
    {
        $this->fotoAgenda = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set creado
     *
     * @param \DateTime $creado
     * @return Agenda
     */
    public function setCreado($creado)
    {
        $this->creado = $creado;

        return $this;
    }

    /**
     * Get creado
     *
     * @return \DateTime 
     */
    public function getCreado()
    {
        return $this->creado;
    }

    /**
     * Set actualizado
     *
     * @param \DateTime $actualizado
     * @return Agenda
     */
    public function setActualizado($actualizado)
    {
        $this->actualizado = $actualizado;

        return $this;
    }

    /**
     * Get actualizado
     *
     * @return \DateTime 
     */
    public function getActualizado()
    {
        return $this->actualizado;
    }

    /**
     * Add fotoAgenda
     *
     * @param \AppBundle\Entity\FotoAgenda $fotoAgenda
     * @return Agenda
     */
    public function addFotoAgenda(\AppBundle\Entity\FotoAgenda $fotoAgenda)
    {
        $this->fotoAgenda[] = $fotoAgenda;

        return $this;
    }

    /**
     * Remove fotoAgenda
     *
     * @param \AppBundle\Entity\FotoAgenda $fotoAgenda
     */
    public function removeFotoAgenda(\AppBundle\Entity\FotoAgenda $fotoAgenda)
    {
        $this->fotoAgenda->removeElement($fotoAgenda);
    }

    /**
     * Get fotoAgenda
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getFotoAgenda()
    {
        return $this->fotoAgenda;
    }

    /**
     * Set creadoPor
     *
     * @param \UsuariosBundle\Entity\Usuario $creadoPor
     * @return Agenda
     */
    public function setCreadoPor(\UsuariosBundle\Entity\Usuario $creadoPor = null)
    {
        $this->creadoPor = $creadoPor;

        return $this;
    }

    /**
     * Get creadoPor
     *
     * @return \UsuariosBundle\Entity\Usuario 
     */
    public function getCreadoPor()
    {
        return $this->creadoPor;
    }

    /**
     * Set actualizadoPor
     *
     * @param \UsuariosBundle\Entity\Usuario $actualizadoPor
     * @return Agenda
     */
    public function setActualizadoPor(\UsuariosBundle\Entity\Usuario $actualizadoPor = null)
    {
        $this->actualizadoPor = $actualizadoPor;

        return $this;
    }

    /**
     * Get actualizadoPor
     *
     * @return \UsuariosBundle\Entity\Usuario 
     */
    public function getActualizadoPor()
    {
        return $this->actualizadoPor;
    }

    /**
     * Set categoriaAgenda
     *
     * @param \AppBundle\Entity\CategoriaAgenda $categoriaAgenda
     * @return Agenda
     */
    public function setCategoriaAgenda(\AppBundle\Entity\CategoriaAgenda $categoriaAgenda = null)
    {
        $this->categoriaAgenda = $categoriaAgenda;

        return $this;
    }

    /**
     * Get categoriaAgenda
     *
     * @return \AppBundle\Entity\CategoriaAgenda 
     */
    public function getCategoriaAgenda()
    {
        return $this->categoriaAgenda;
    }
}
