<?php
class Opcion {
    private string $nombre;
    private string $funcion;


    public function __construct(string $nombre, string $funcion)
    {
        $this->nombre = $nombre;
        $this->funcion = $funcion;
    }

  
    public function getNombre(): string
    {
            return $this->nombre;
    }

   
    public function getFuncion(): string
    {
            return $this->funcion;
    }
}