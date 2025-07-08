<?php

require_once('Joya.php'); 
require_once('Cliente.php'); 

class Venta {
    static int $ultimoId = 0; 

    private int $id;
    private int $idJoya; // El ID del Anillo o Pulsera vendido
    private string $tipoJoya; //  Tipo de joya vendida (ej. "Anillo", "Pulsera")
    private int $idCliente; 
    private int $cantidad;
    private float $precioTotal; 
    private DateTime $fecha; 

  
    public function __construct(int $idJoya, string $tipoJoya, int $idCliente, int $cantidad, float $precioUnitarioJoya) { // CONSTRUCTOR MODIFICADO
        $this->id = ++Venta::$ultimoId; 
        $this->idJoya = $idJoya;
        $this->tipoJoya = $tipoJoya; 
        $this->idCliente = $idCliente;
        $this->cantidad = $cantidad;
        $this->precioTotal = $cantidad * $precioUnitarioJoya; 
        $this->fecha = new DateTime(); 
    }

    // --- Métodos Getters ---
    public function getId(): int { return $this->id; }
    public function getIdJoya(): int { return $this->idJoya; }
    public function getTipoJoya(): string { return $this->tipoJoya; }
    public function getIdCliente(): int { return $this->idCliente; }
    public function getCantidad(): int { return $this->cantidad; }
    public function getPrecioTotal(): float { return $this->precioTotal; }
    public function getFecha(): DateTime { return $this->fecha; }

    // --- Métodos Setters ---
    public function setIdJoya(int $idJoya): void { $this->idJoya = $idJoya; }
    public function setTipoJoya(string $tipoJoya): void { $this->tipoJoya = $tipoJoya; }
    public function setIdCliente(int $idCliente): void { $this->idCliente = $idCliente; }
    public function setCantidad(int $cantidad): void { $this->cantidad = $cantidad; }
    public function setPrecioTotal(float $precioTotal): void { $this->precioTotal = $precioTotal; }

   
    public function __toString(): string {
        return "ID Venta: " . $this->getId() .
               " | Joya ID: " . $this->getIdJoya() .
               " | Tipo Joya: " . $this->getTipoJoya() . // Mostrar el tipo de joya
               " | Cliente ID: " . $this->getIdCliente() .
               " | Cantidad: " . $this->getCantidad() .
               " | Total: $" . number_format($this->getPrecioTotal(), 2) .
               " | Fecha: " . $this->getFecha()->format('d/m/Y H:i:s');
    }
}