<?php
    require_once('DB.php');
    require_once('Joya.php');
    require_once('Anillo.php');
    require_once('Pulsera.php'); 
    require_once('Cliente.php'); 
    require_once('Venta.php'); 

    $db = new DB();

    // --- 1. Cargar Anillos Iniciales ---
    Anillo::$ultimoId = 0; 
    $db->agregarAnillo(new Anillo('Anillo Clásico Plata 925', 4.5, 17, 'Plata 9.25', 35.00));
    $db->agregarAnillo(new Anillo('Anillo Luna Cabujon', 5.8, 16, 'Plata y Piedra Luna', 48.50));
    $db->agregarAnillo(new Anillo('Anillo Granate Facetado', 6.0, 18, 'Plata y Granate', 55.00));
    mostrar("Anillos de ejemplo cargados.");

    // --- 2. Cargar Pulseras Iniciales ---
    Pulsera::$ultimoId = 0;
    $db->agregarPulsera(new Pulsera('Pulsera Serpiente Plata', 12.0, '20cm', 'Sin Piedra', 80.00));
    $db->agregarPulsera(new Pulsera('Pulsera Ágata Verde', 15.5, 'M', 'Ágata', 95.00));
    $db->agregarPulsera(new Pulsera('Pulsera Labradorita Esferas', 18.0, 'L', 'Labradorita', 110.00));
    mostrar("Pulseras de ejemplo cargadas.");

    // --- 3. Cargar Clientes Iniciales ---
    Cliente::$ultimoId = 0; 
    $db->agregarCliente(new Cliente('Juan', 'Perez', '1122334455'));
    $db->agregarCliente(new Cliente('Maria', 'Gomez', '2233445566'));
    $db->agregarCliente(new Cliente('Carlos', 'Rodriguez', '3344556677'));
    mostrar("Clientes de ejemplo cargados.");

    /* --- 4. Cargar Ventas Iniciales (opcional, para probar reportes) ---
    Venta::$ultimoId = 0; // Reiniciar el contador de IDs para pruebas (opcional)
    // Simular algunas ventas:
    // Venta de Anillo 1 (ID 1) al Cliente 1 (ID 1)
    $anilloEjemplo1 = $db->buscarAnilloPorId(1);
    if ($anilloEjemplo1) {
        $db->agregarVenta(new Venta($anilloEjemplo1->getId(), 1, 1, $anilloEjemplo1->getPrecioUnitario()));
    }
    // Venta de Pulsera 2 (ID 2) al Cliente 2 (ID 2)
    $pulseraEjemplo2 = $db->buscarPulseraPorId(2);
    if ($pulseraEjemplo2) {
        $db->agregarVenta(new Venta($pulseraEjemplo2->getId(), 2, 1, $pulseraEjemplo2->getPrecioUnitario()));
    }
    mostrar("Ventas de ejemplo cargadas.");


    mostrar("\nDatos iniciales cargados en DB (Anillos, Pulseras, Clientes, Ventas).");*/

?>