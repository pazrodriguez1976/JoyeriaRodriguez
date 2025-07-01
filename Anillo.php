<?php
require_once 'Joya.php';

class Anillo extends Joya {
    static int $ultimoId = 0; // Para generar IDs únicos para Anillos

    private int $talle;
    private string $material; // Ej: Plata 9.25, Plata y Piedra Luna, Plata y Marquesita
    private float $precioUnitario; // Precio fijo para cada tipo de anillo simple.


    public function __construct(string $nombre, float $pesoGramos, int $talle, string $material, float $precioUnitario) {
        parent::__construct(++Anillo::$ultimoId, $nombre, $pesoGramos);
        $this->talle = $talle;
        $this->material = $material;
        $this->precioUnitario = $precioUnitario;
    }

    // Getters específicos de Anillo
    public function getTalle(): int { return $this->talle; }
    public function getMaterial(): string { return $this->material; }
    public function getPrecioUnitario(): float { return $this->precioUnitario; }

    // Setters específicos de Anillo
    public function setTalle(int $talle): void { $this->talle = $talle; }
    public function setMaterial(string $material): void { $this->material = $material; }
    public function setPrecioUnitario(float $precioUnitario): void { $this->precioUnitario = $precioUnitario; }

    /**
     * @Override del método abstracto de Joya para representación de cadena.
     */
    public function __toString(): string {
        return "ID: " . $this->getId() . " | Nombre: " . $this->getNombre() .
               " | Talle: " . $this->getTalle() . " | Material: " . $this->getMaterial() .
               " | Peso: " . $this->getPesoGramos() . "g | Precio: $" . number_format($this->getPrecioUnitario(), 2);
    }
}