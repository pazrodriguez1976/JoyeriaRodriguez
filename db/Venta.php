<?php


class Venta {
    static int $ultimoId = 0; // Para generar IDs únicos para Ventas

    private int $id;
    private int $idJoya; // El ID del Anillo o Pulsera vendido
    private int $idCliente; // El ID del Cliente que realizó la compra
    private int $cantidad;
    private float $precioTotal; // Precio total de esta venta particular (cantidad * precio_unitario_joya)
    private DateTime $fecha;

   
    public function __construct(int $idJoya, int $idCliente, int $cantidad, float $precioUnitarioJoya) {
        $this->id = ++Venta::$ultimoId;
        $this->idJoya = $idJoya;
        $this->idCliente = $idCliente;
        $this->cantidad = $cantidad;
        $this->precioTotal = $cantidad * $precioUnitarioJoya;
        $this->fecha = new DateTime();
    }

    // Getters
    public function getId(): int { return $this->id; }
    public function getIdJoya(): int { return $this->idJoya; }
    public function getIdCliente(): int { return $this->idCliente; }
    public function getCantidad(): int { return $this->cantidad; }
    public function getPrecioTotal(): float { return $this->precioTotal; }
    public function getFecha(): DateTime { return $this->fecha; }

    /**
     * Representación de cadena del objeto Venta.
     */
    public function __toString(): string {
        return "ID Venta: " . $this->getId() .
               " | Joya ID: " . $this->getIdJoya() .
               " | Cliente ID: " . $this->getIdCliente() .
               " | Cantidad: " . $this->getCantidad() .
               " | Total: $" . number_format($this->getPrecioTotal(), 2) .
               " | Fecha: " . $this->getFecha()->format('d/m/Y');
    }
}