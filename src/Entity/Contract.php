<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ContractRepository")
 */
class Contract
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    private $vendedor;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $representante_vendedor;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $objeto_contrato;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $precio_cfr;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $precio_sin_inspeccion;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $precio_inspeccion;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $precio_flete;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $moneda;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $tipo_carta_credito;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $puerto_origen;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $cantidad_embarques;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $cantidad_contenedores;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $tiempo_entrega;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $correo_comprador;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $tiempo_garantia;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nombre_vendedor;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $numero;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getVendedor(): ?string
    {
        return rtrim(ltrim($this->vendedor, '<p>'), '</p>') ;
    }

    public function setVendedor(string $vendedor): self
    {
        $this->vendedor = $vendedor;

        return $this;
    }

    public function getRepresentanteVendedor(): ?string
    {
        return rtrim(ltrim($this->representante_vendedor, '<p>'), '</p>') ;
    }

    public function setRepresentanteVendedor(string $representante_vendedor): self
    {
        $this->representante_vendedor = $representante_vendedor;

        return $this;
    }

    public function getObjetoContrato(): ?string
    {
        return $this->objeto_contrato;
    }

    public function setObjetoContrato(string $objeto_contrato): self
    {
        $this->objeto_contrato = $objeto_contrato;

        return $this;
    }

    public function getPrecioCfr(): ?string
    {
        return $this->precio_cfr;
    }

    public function setPrecioCfr(string $precio_cfr): self
    {
        $this->precio_cfr = $precio_cfr;

        return $this;
    }

    public function getPrecioSinInspeccion(): ?string
    {
        return $this->precio_sin_inspeccion;
    }

    public function setPrecioSinInspeccion(string $precio_sin_inspeccion): self
    {
        $this->precio_sin_inspeccion = $precio_sin_inspeccion;

        return $this;
    }

    public function getPrecioInspeccion(): ?string
    {
        return $this->precio_inspeccion;
    }

    public function setPrecioInspeccion(string $precio_inspeccion): self
    {
        $this->precio_inspeccion = $precio_inspeccion;

        return $this;
    }

    public function getPrecioFlete(): ?string
    {
        return $this->precio_flete;
    }

    public function setPrecioFlete(string $precio_flete): self
    {
        $this->precio_flete = $precio_flete;

        return $this;
    }

    public function getMoneda(): ?string
    {
        return $this->moneda;
    }

    public function setMoneda(string $moneda): self
    {
        $this->moneda = $moneda;

        return $this;
    }

    public function getTipoCartaCredito(): ?string
    {
        return $this->tipo_carta_credito;
    }

    public function setTipoCartaCredito(string $tipo_carta_credito): self
    {
        $this->tipo_carta_credito = $tipo_carta_credito;

        return $this;
    }

    public function getPuertoOrigen(): ?string
    {
        return $this->puerto_origen;
    }

    public function setPuertoOrigen(string $puerto_origen): self
    {
        $this->puerto_origen = $puerto_origen;

        return $this;
    }

    public function getCantidadEmbarques(): ?string
    {
        return $this->cantidad_embarques;
    }

    public function setCantidadEmbarques(string $cantidad_embarques): self
    {
        $this->cantidad_embarques = $cantidad_embarques;

        return $this;
    }

    public function getCantidadContenedores(): ?string
    {
        return $this->cantidad_contenedores;
    }

    public function setCantidadContenedores(string $cantidad_contenedores): self
    {
        $this->cantidad_contenedores = $cantidad_contenedores;

        return $this;
    }

    public function getTiempoEntrega(): ?string
    {
        return $this->tiempo_entrega;
    }

    public function setTiempoEntrega(string $tiempo_entrega): self
    {
        $this->tiempo_entrega = $tiempo_entrega;

        return $this;
    }

    public function getCorreoComprador(): ?string
    {
        return $this->correo_comprador;
    }

    public function setCorreoComprador(string $correo_comprador): self
    {
        $this->correo_comprador = $correo_comprador;

        return $this;
    }

    public function getTiempoGarantia(): ?string
    {
        return $this->tiempo_garantia;
    }

    public function setTiempoGarantia(string $tiempo_garantia): self
    {
        $this->tiempo_garantia = $tiempo_garantia;

        return $this;
    }

    public function getNombreVendedor(): ?string
    {
        return $this->nombre_vendedor;
    }

    public function setNombreVendedor(string $nombre_vendedor): self
    {
        $this->nombre_vendedor = $nombre_vendedor;

        return $this;
    }

    public function getNumero(): ?string
    {
        return $this->numero;
    }

    public function setNumero(string $numero): self
    {
        $this->numero = $numero;

        return $this;
    }
}
