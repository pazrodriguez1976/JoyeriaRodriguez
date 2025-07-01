<?php

/**
 * Muestra un texto en la consola seguido de un salto de línea.
 * @param string $texto El texto a mostrar.
 */
function mostrar(string $texto): void {
    echo $texto."\n";
}

/**
 * Muestra un mensaje y lee una línea de texto desde la consola.
 * @param string $mensaje El mensaje opcional a mostrar antes de leer.
 * @return string La cadena de texto leída desde la entrada estándar, sin espacios en blanco al inicio/final.
 */
function leer(string $mensaje = ""): string {
    echo($mensaje);
    $x = trim(fgets(STDIN));
    return $x;
}
