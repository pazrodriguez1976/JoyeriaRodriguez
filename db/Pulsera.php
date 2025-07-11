<?php
require_once('Joya.php');

class Pulsera extends Joya {
    static int $ultimoId = 0; 

    private string $medida;
    private string $tipoPiedra;
    private float $precioUnitario; 

  
    public function __construct(string $nombre, float $pesoGramos, string $medida, string $tipoPiedra
    , float $precioUnitario) {
        parent::__construct(++Pulsera::$ultimoId, $nombre, $pesoGramos);
        $this->medida = $medida;
        $this->tipoPiedra = $tipoPiedra;
        $this->precioUnitario = $precioUnitario;
    }

    public function getMedida(): string { return $this->medida; }
    public function getTipoPiedra  (): string { return $this->tipoPiedra;}
    public function getPrecioUnitario(): float { return $this->precioUnitario; }

    public function setMedida(string $medida): void { $this->medida = $medida; }
    public function setTipoPiedra(string $tipoPiedra): void { $this->tipoPiedra = $tipoPiedra; }
    public function setPrecioUnitario(float $precioUnitario): void { $this->precioUnitario = $precioUnitario; }


     /* @Override del método abstracto de Joya para representación de cadena.
     */
    public function __toString(): string {
        return "ID: " . $this->getId() . " | Nombre: " . $this->getNombre() .
               " | Tamaño: " . $this->getMedida() . " | Piedra
               : " . $this->getTipoPiedra
               () .
               " | Peso: " . $this->getPesoGramos() . "g | Precio: $" . number_format($this->getPrecioUnitario(), 2);
    }
}