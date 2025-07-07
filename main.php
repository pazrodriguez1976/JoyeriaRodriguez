<?php

    require_once('./librerias/Menu.php');
    require_once('./librerias/Util.php');
    require_once('./db/LoadDatos.php');


    global $db; 


    function obtenerJoyaPorTipoYId(string $tipo, int $id): ?Joya {
        global $db;
        if ($tipo === 'Anillo') {
            return $db->buscarAnilloPorId($id);
        } elseif ($tipo === 'Pulsera') {
            return $db->buscarPulseraPorId($id);
        }
        return null;
    }


    function listarAnillos(): void {
        global $db;
        mostrar("--- Listado de Anillos ---");
        $anillos = $db->getAnillos();
        if (empty($anillos)) {
            mostrar("No hay anillos en el inventario.");
        } else {
            foreach ($anillos as $anillo) {
                mostrar($anillo->__toString());
            }
        }
        leer("\nPresione ENTER para continuar ...");
    }

    function agregarAnillo(): void {
        global $db;
        mostrar("--- Agregar Nuevo Anillo ---");

        $nombre = leer("Nombre/Descripción del anillo: ");
        $pesoGramos = (float) leer("Peso en gramos: ");
        $talle = (int) leer("Talle del anillo (ej. 14, 16, 18): ");
        $material = leer("Material/Tipo (ej. 'Plata 9.25', 'Plata y Piedra Luna'): ");
        $precioUnitario = (float) leer("Precio de venta unitario: $");

        $anillo = new Anillo($nombre, $pesoGramos, $talle, $material, $precioUnitario);
        $db->agregarAnillo($anillo);
        mostrar("Anillo agregado con ID: " . $anillo->getId());
        leer("\nPresione ENTER para continuar ...");
    }
    
    function borrarAnillo(): void {
        global $db;
        mostrar("--- Borrar Anillo ---");
        listarAnillos(); 
        $id = (int) leer("Ingrese el ID del anillo a borrar: ");

        if ($db->borrarAnilloPorId($id)) {
            mostrar("Anillo con ID $id borrado exitosamente.");
        } else {
            mostrar("No se encontró un anillo con ID $id.");
        }
        leer("\nPresione ENTER para continuar ...");
    }

    function modificarAnillo(): void {
        global $db;
        mostrar("--- Modificar Anillo ---");
        listarAnillos();
        $id = (int) leer("Ingrese el ID del anillo a modificar: ");
        $anillo = $db->buscarAnilloPorId($id);

        if ($anillo) {
            mostrar("Anillo encontrado: " . $anillo->__toString());
            $nombre = leer("Nuevo Nombre/Descripción (dejar vacío para no cambiar): ");
            if (!empty($nombre)) $anillo->setNombre($nombre);

            $pesoGramos = leer("Nuevo Peso en gramos (dejar vacío para no cambiar): ");
            if (!empty($pesoGramos)) $anillo->setPesoGramos((float)$pesoGramos);

            $talle = leer("Nuevo Talle (dejar vacío para no cambiar): ");
            if (!empty($talle)) $anillo->setTalle((int)$talle);

            $material = leer("Nuevo Material/Tipo (dejar vacío para no cambiar): ");
            if (!empty($material)) $anillo->setMaterial($material);

            $precioUnitario = leer("Nuevo Precio de venta unitario (dejar vacío para no cambiar): $");
            if (!empty($precioUnitario)) $anillo->setPrecioUnitario((float)$precioUnitario);

            mostrar("Anillo con ID $id modificado exitosamente.");
        } else {
            mostrar("No se encontró un anillo con ID $id.");
        }
        leer("\nPresione ENTER para continuar ...");
    }

     function listarPulseras(): void {
        global $db;
        mostrar("--- Listado de Pulseras ---");
        $pulseras = $db->getPulseras();
        if (empty($pulseras)) {
            mostrar("No hay pulseras en el inventario.");
        } else {
            foreach ($pulseras as $pulsera) {
                mostrar($pulsera->__toString());
            }
        }
        leer("\nPresione ENTER para continuar ...");
    }

    function agregarPulsera(): void {
        global $db;
        mostrar("--- Agregar Nueva Pulsera ---");

        $nombre = leer("Nombre/Descripción de la pulsera: ");
        $pesoGramos = (float) leer("Peso en gramos: ");
        $medida = leer("Medida (ej. '18cm', 'M', 'L'): ");
        $tipoPiedra = leer("Tipo de Piedra (ej. 'Ágata', 'Sin Piedra'): ");
        $precioUnitario = (float) leer("Precio de venta unitario: $");

        $pulsera = new Pulsera($nombre, $pesoGramos, $medida, $tipoPiedra, $precioUnitario);
        $db->agregarPulsera($pulsera);
        mostrar("Pulsera agregada con ID: " . $pulsera->getId());
        leer("\nPresione ENTER para continuar ...");
    }
    
    function borrarPulsera(): void {
        global $db;
        mostrar("--- Borrar Pulsera ---");
        listarPulseras();
        $id = (int) leer("Ingrese el ID de la pulsera a borrar: ");

        if ($db->borrarPulseraPorId($id)) {
            mostrar("Pulsera con ID $id borrada exitosamente.");
        } else {
            mostrar("No se encontró una pulsera con ID $id.");
        }
        leer("\nPresione ENTER para continuar ...");
    }

    function modificarPulsera(): void {
        global $db;
        mostrar("--- Modificar Pulsera ---");
        listarPulseras();
        $id = (int) leer("Ingrese el ID de la pulsera a modificar: ");
        $pulsera = $db->buscarPulseraPorId($id);

        if ($pulsera) {
            mostrar("Pulsera encontrada: " . $pulsera->__toString());
            $nombre = leer("Nuevo Nombre/Descripción (dejar vacío para no cambiar): ");
            if (!empty($nombre)) $pulsera->setNombre($nombre);

            $pesoGramos = leer("Nuevo Peso en gramos (dejar vacío para no cambiar): ");
            if (!empty($pesoGramos)) $pulsera->setPesoGramos((float)$pesoGramos);

            $medida = leer("Nueva Medida (dejar vacío para no cambiar): ");
            if (!empty($medida)) $pulsera->setMedida($medida);

            $tipoPiedra = leer("Nuevo Tipo de Piedra (dejar vacío para no cambiar): ");
            if (!empty($tipoPiedra)) $pulsera->setTipoPiedra($tipoPiedra);

            $precioUnitario = leer("Nuevo Precio de venta unitario (dejar vacío para no cambiar): $");
            if (!empty($precioUnitario)) $pulsera->setPrecioUnitario((float)$precioUnitario);

            mostrar("Pulsera con ID $id modificada exitosamente.");
        } else {
            mostrar("No se encontró una pulsera con ID $id.");
        }
        leer("\nPresione ENTER para continuar ...");
    }
    function agregarCliente(): void {
        global $db; 
        mostrar("--- Agregar Nuevo Cliente ---");
        $nombre = leer("Nombre del cliente: ");
        $apellido = leer("Apellido del cliente: ");
        $telefono = leer("Teléfono del cliente (opcional): ");

        $cliente = new Cliente($nombre, $apellido, $telefono);
        $db->agregarCliente($cliente);
        mostrar("Cliente agregado con ID: " . $cliente->getId());
        leer("\nPresione ENTER para continuar ...");
    }
    
    function borrarCliente(): void {
        global $db;
        mostrar("--- Borrar Cliente ---");
        listarClientes();
        $id = (int) leer("Ingrese el ID del cliente a borrar: ");

        if ($db->borrarClientePorId($id)) {
            mostrar("Cliente con ID $id borrado exitosamente.");
        } else {
            mostrar("No se encontró un cliente con ID $id.");
        }
        leer("\nPresione ENTER para continuar ...");
    }

    function modificarCliente(): void {
        global $db;
        mostrar("--- Modificar Cliente ---");
        listarClientes();
        $id = (int) leer("Ingrese el ID del cliente a modificar: ");
        $cliente = $db->buscarClientePorId($id);

        if ($cliente) {
            mostrar("Cliente encontrado: " . $cliente->__toString());
            $nombre = leer("Nuevo Nombre (dejar vacío para no cambiar): ");
            if (!empty($nombre)) $cliente->setNombre($nombre);

            $apellido = leer("Nuevo Apellido (dejar vacío para no cambiar): ");
            if (!empty($apellido)) $cliente->setApellido($apellido);

            $telefono = leer("Nuevo Teléfono (dejar vacío para no cambiar): ");
            if (!empty($telefono)) $cliente->setTelefono($telefono);

            mostrar("Cliente con ID $id modificado exitosamente.");
        } else {
            mostrar("No se encontró un cliente con ID $id.");
        }
        leer("\nPresione ENTER para continuar ...");
    }

    
    function vender(): void {
        global $db;
        mostrar("--- Realizar Venta ---");

        // Seleccionar Cliente
        listarClientes();
        $idCliente = (int) leer("Ingrese el ID del cliente que realiza la compra: ");
        $cliente = $db->buscarClientePorId($idCliente);
        if (!$cliente) {
            mostrar("Cliente no encontrado.");
            leer("\nPresione ENTER para continuar ...");
            return;
        }



        // Seleccionar Joya (Anillo o Pulsera)
        mostrar("¿Qué tipo de joya desea vender?");
        mostrar("1. Anillo");
        mostrar("2. Pulsera");
        $opcionTipoJoya = (int) leer("Seleccione una opción: ");

        $joya = null;
        $tipoJoyaStr = "";

        if ($opcionTipoJoya === 1) {
            listarAnillos();
            $idJoya = (int) leer("Ingrese el ID del anillo a vender: ");
            $joya = $db->buscarAnilloPorId($idJoya);
            $tipoJoyaStr = "Anillo";
        } elseif ($opcionTipoJoya === 2) {
            listarPulseras();
            $idJoya = (int) leer("Ingrese el ID de la pulsera a vender: ");
            $joya = $db->buscarPulseraPorId($idJoya);
            $tipoJoyaStr = "Pulsera";
        } else {
            mostrar("Opción de tipo de joya inválida.");
            leer("\nPresione ENTER para continuar ...");
            return;
        }

        if (!$joya) {
            mostrar("Joya seleccionada no encontrada.");
            leer("\nPresione ENTER para continuar ...");
            return;
        }

        mostrar("Joya seleccionada: " . $joya->getNombre() . " (Precio: $" . number_format($joya->getPrecioUnitario(), 2) . ")");
        $cantidad = (int) leer("Ingrese la cantidad a vender: ");

        if ($cantidad <= 0) {
            mostrar("La cantidad debe ser un número positivo.");
            leer("\nPresione ENTER para continuar ...");
            return;
        }

        $db->agregarVenta(new Venta($joya->getId(), $cliente->getId(), $cantidad, $joya->getPrecioUnitario()));
        mostrar("Venta de $cantidad x $tipoJoyaStr '" . $joya->getNombre() . "' al cliente '" . $cliente->getNombre() . " " . $cliente->getApellido() . "' registrada exitosamente.");
        leer("\nPresione ENTER para continuar ...");
    }

    function gestionarAnillos(): void { 
        $menu = Menu::getMenuAnillos();
        $opcion = $menu->elegir();
        while ($opcion->getNombre() != 'Volver') { 
            $funcion = $opcion->getFuncion();
            call_user_func($funcion);
            $opcion = $menu->elegir();    
        }
    }

    function gestionarPulseras(): void {
        $menu = Menu::getMenuPulseras();
        $opcion = $menu->elegir();
        while ($opcion->getNombre() != 'Volver') {
            $funcion = $opcion->getFuncion();
            call_user_func($funcion);
            $opcion = $menu->elegir();    
        }
    }

    function gestionarClientes(): void { 
        $menu = Menu::getMenuClientes();
        $opcion = $menu->elegir();
        while ($opcion->getNombre() != 'Volver') {
            $funcion = $opcion->getFuncion();
            call_user_func($funcion);
            $opcion = $menu->elegir();    
        }
    }

    function salirAplicacion(): void {
        mostrar("Saliendo del Sistema de Gestión de Joyería. ¡Hasta pronto!");
        exit();
    }


    mostrar("Sistema de Gestión de Joyería");
    mostrar("==============================");
    mostrar("(C) 2025");

    $menuPrincipal = Menu::getMenuPrincipal();
    $opcionPrincipal = $menuPrincipal->elegir();

    while ($opcionPrincipal->getNombre() != 'Salir') { 
        $funcionACallar = $opcionPrincipal->getFuncion();
        if (function_exists($funcionACallar)) { 
            call_user_func($funcionACallar);
        } else {
            mostrar("ERROR: La función '$funcionACallar' no está definida.");
            leer("\nPresione ENTER para continuar ...");
        }
        $opcionPrincipal = $menuPrincipal->elegir();    
    }
   
?>