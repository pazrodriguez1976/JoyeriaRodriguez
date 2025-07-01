<?php
class Opcion {
    private string $nombre;
    private string $funcion;

    /**
     * Constructor de la clase Opcion.
     * @param string $nombre El texto que se mostrará en el menú para esta opción.
     * @param string $funcion El nombre de la función a ejecutar cuando se seleccione esta opción.
     */
    public function __construct(string $nombre, string $funcion)
    {
        $this->nombre = $nombre;
        $this->funcion = $funcion;
    }

    /**
     * Get the value of nombre
     */
    public function getNombre(): string
    {
            return $this->nombre;
    }

    /**
     * Get the value of funcion
     */
    public function getFuncion(): string
    {
            return $this->funcion;
    }
}