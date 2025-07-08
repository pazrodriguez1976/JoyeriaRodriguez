<?php

require_once('Joya.php'); 

class Anillo extends Joya {
    static int $ultimoId = 0; 

    private int $talle;
    private string $material; 
    private float $precioUnitario; 


    public function __construct(string $nombre, float $pesoGramos, int $talle, string $material, float $precioUnitario) {
        parent::__construct(++Anillo::$ultimoId, $nombre, $pesoGramos);
        $this->talle = $talle;
        $this->material = $material;
        $this->precioUnitario = $precioUnitario;
    }

    public function getTalle(): int { return $this->talle; }
    public function getMaterial(): string { return $this->material; }
    public function getPrecioUnitario(): float { return $this->precioUnitario; }

    public function setTalle(int $talle): void { $this->talle = $talle; }
    public function setMaterial(string $material): void { $this->material = $material; }
    public function setPrecioUnitario(float $precioUnitario): void { $this->precioUnitario = $precioUnitario; }

   
     /* @Override del método abstracto de Joya para representación de cadena.
     */
    public function __toString(): string {
        return "ID: " . $this->getId() . " | Nombre: " . $this->getNombre() .
               " | Talle: " . $this->getTalle() . " | Material: " . $this->getMaterial() .
               " | Peso: " . $this->getPesoGramos() . "g | Precio: $" . number_format($this->getPrecioUnitario(), 2);
    }
}