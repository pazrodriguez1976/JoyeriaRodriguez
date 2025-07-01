<?php

class Cliente {
    static int $ultimoId = 0;

    private int $id;
    private string $nombre;
    private string $apellido;
    private string $telefono;

    public function __construct(string $nombre, string $apellido, string $telefono = '') {
        $this->id = ++Cliente::$ultimoId;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->telefono = $telefono;
    }

    // Getters
    public function getId(): int { return $this->id; }
    public function getNombre(): string { return $this->nombre; }
    public function getApellido(): string { return $this->apellido; }
    public function getTelefono(): string { return $this->telefono; }

    // Setters
    public function setNombre(string $nombre): void { $this->nombre = $nombre; }
    public function setApellido(string $apellido): void { $this->apellido = $apellido; }
    public function setTelefono(string $telefono): void { $this->telefono = $telefono; }

    /**
     * Representación de cadena del objeto Cliente.
     */
    public function __toString(): string {
        return "ID: " . $this->getId() . " | Nombre: " . $this->getNombre() .
               " | Apellido: " . $this->getApellido() . " | Teléfono: " . $this->getTelefono();
    }
}