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
    $db->agregarAnillo(new Anillo('Anillo Clásico Plata 925', 4.5, 17, 'Plata 9.25', 35.00)); // ID 1
    $db->agregarAnillo(new Anillo('Anillo Luna Cabujon', 5.8, 16, 'Plata y Piedra Luna', 48.50)); // ID 2
    $db->agregarAnillo(new Anillo('Anillo Granate Facetado', 6.0, 18, 'Plata y Granate', 55.00)); // ID 3

    // --- 2. Cargar Pulseras Iniciales ---
    Pulsera::$ultimoId = 0; 
    $db->agregarPulsera(new Pulsera('Pulsera Serpiente Plata', 12.0, '20cm', 'Sin Piedra', 80.00)); // ID 1
    $db->agregarPulsera(new Pulsera('Pulsera Ágata Verde', 15.5, 'M', 'Ágata', 95.00)); // ID 2
    $db->agregarPulsera(new Pulsera('Pulsera Labradorita Esferas', 18.0, 'L', 'Labradorita', 110.00)); // ID 3

    // --- 3. Cargar Clientes Iniciales ---
    Cliente::$ultimoId = 0; 
    $db->agregarCliente(new Cliente('Juan', 'Perez', '1122334455')); // ID 1
    $db->agregarCliente(new Cliente('Maria', 'Gomez', '2233445566')); // ID 2
    $db->agregarCliente(new Cliente('Carlos', 'Rodriguez', '3344556677')); // ID 3

    // --- 4. Cargar Ventas Iniciales ---
    Venta::$ultimoId = 0; 
    
    // Venta 1: Anillo 1 (ID 1) al Cliente 1 (ID 1)
    $anilloEjemplo1 = $db->buscarAnilloPorId(1);
    $clienteEjemplo1 = $db->buscarClientePorId(1);
    if ($anilloEjemplo1 && $clienteEjemplo1) {
        $db->agregarVenta(new Venta($anilloEjemplo1->getId(), 'Anillo', $clienteEjemplo1->getId(), 1, $anilloEjemplo1->getPrecioUnitario())); // Pasar 'Anillo'
    }

    // Venta 2: Pulsera 2 (ID 2) al Cliente 2 (ID 2)
    $pulseraEjemplo2 = $db->buscarPulseraPorId(2);
    $clienteEjemplo2 = $db->buscarClientePorId(2);
    if ($pulseraEjemplo2 && $clienteEjemplo2) {
        $db->agregarVenta(new Venta($pulseraEjemplo2->getId(), 'Pulsera', $clienteEjemplo2->getId(), 1, $pulseraEjemplo2->getPrecioUnitario())); // Pasar 'Pulsera'
    }

    // Venta 3: Anillo 3 (ID 3) al Cliente 1 (ID 1), 2 unidades
    $anilloEjemplo3 = $db->buscarAnilloPorId(3);
    if ($anilloEjemplo3 && $clienteEjemplo1) {
        $db->agregarVenta(new Venta($anilloEjemplo3->getId(), 'Anillo', $clienteEjemplo1->getId(), 2, $anilloEjemplo3->getPrecioUnitario())); // Pasar 'Anillo'
    }

    // Venta 4: Pulsera 1 (ID 1) al Cliente 3 (ID 3)
    $pulseraEjemplo1 = $db->buscarPulseraPorId(1);
    $clienteEjemplo3 = $db->buscarClientePorId(3);
    if ($pulseraEjemplo1 && $clienteEjemplo3) {
        $db->agregarVenta(new Venta($pulseraEjemplo1->getId(), 'Pulsera', $clienteEjemplo3->getId(), 1, $pulseraEjemplo1->getPrecioUnitario())); // Pasar 'Pulsera'
    }
    
    // Venta 5: Anillo 2 (ID 2) al Cliente 2 (ID 2), 1 unidad
    $anilloEjemplo2 = $db->buscarAnilloPorId(2);
    if ($anilloEjemplo2 && $clienteEjemplo2) {
        $db->agregarVenta(new Venta($anilloEjemplo2->getId(), 'Anillo', $clienteEjemplo2->getId(), 1, $anilloEjemplo2->getPrecioUnitario())); // Pasar 'Anillo'
    }
?>