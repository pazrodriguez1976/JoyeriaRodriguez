<?php


function mostrar(string $texto): void {
    echo $texto."\n";
}


function leer(string $mensaje = ""): string {
    echo($mensaje);
    $x = trim(fgets(STDIN));
    return $x;
}
