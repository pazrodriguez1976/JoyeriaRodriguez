<?php

abstract class Joya {
    protected int $id;
    protected string $nombre;
    protected float $pesoGramos; 
   
    public function __construct(int $id, string $nombre, float $pesoGramos) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->pesoGramos = $pesoGramos;
    }

    // Getters comunes
    public function getId(): int { return $this->id; }
    public function getNombre(): string { return $this->nombre; }
    public function getPesoGramos(): float { return $this->pesoGramos; }

    // Setters básicos
    public function setNombre(string $nombre): void { $this->nombre = $nombre; }
    public function setPesoGramos(float $pesoGramos): void { $this->pesoGramos = $pesoGramos; }

    // Método __toString para facilitar la visualización
    abstract public function __toString(): string;
}