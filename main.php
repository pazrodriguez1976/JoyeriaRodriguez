<?php
    
    require_once('./librerias/Menu.php');
    require_once('./librerias/Util.php');
    require_once('./db/LoadDatos.php'); 
    
    
    global $db; 

    
    // --- Funciones para la Gestión de Anillos ---
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


    // --- Funciones para la Gestión de Pulseras ---
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


    // --- Funciones para la Gestión de Clientes ---
    function listarClientes(): void {
        global $db;
        mostrar("--- Listado de Clientes ---");
        $clientes = $db->getClientes();
        if (empty($clientes)) {
            mostrar("No hay clientes registrados.");
        } else {
            foreach ($clientes as $cliente) {
                mostrar($cliente->__toString());
            }
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


    // --- Funciones para la Gestión de Ventas (CRUD) ---

    // Realiza una nueva venta
    function realizarVenta(): void {
        global $db;
        mostrar("--- Realizar Nueva Venta ---");

        
        listarClientes();
        $idCliente = (int) leer("Ingrese el ID del cliente que realiza la compra: ");
        $cliente = $db->buscarClientePorId($idCliente);
        if (!$cliente) {
            mostrar("Cliente no encontrado.");
            leer("\nPresione ENTER para continuar ...");
            return;
        }

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
        
       
        $nuevaVenta = new Venta($joya->getId(), $tipoJoyaStr, $idCliente, $cantidad, $joya->getPrecioUnitario());
        $db->agregarVenta($nuevaVenta);
        
        mostrar("Venta de $cantidad x $tipoJoyaStr '" . $joya->getNombre() . "' al cliente '" . $cliente->getNombre() . " " . $cliente->getApellido() . "' registrada exitosamente.");
        mostrar("Fecha de Venta: " . $nuevaVenta->getFecha()->format('d/m/Y H:i:s')); 
        mostrar("ID de la Venta Creada: " . $nuevaVenta->getId());
        
        leer("\nPresione ENTER para continuar ...");
    }

    
    function listarVentas(): void {
        global $db;
        mostrar("--- Listado de Ventas ---");
        $ventas = $db->getVentas();
        if (empty($ventas)) {
            mostrar("No hay ventas registradas.");
        } else {
            foreach ($ventas as $venta) {
                
                $joyaVendida = null;
                if ($venta->getTipoJoya() === 'Anillo') {
                    $joyaVendida = $db->buscarAnilloPorId($venta->getIdJoya());
                } elseif ($venta->getTipoJoya() === 'Pulsera') {
                    $joyaVendida = $db->buscarPulseraPorId($venta->getIdJoya());
                }

                $clienteVenta = $db->buscarClientePorId($venta->getIdCliente());

                $nombreJoya = $joyaVendida ? $joyaVendida->getNombre() : "Joya Desconocida";
                $nombreCliente = $clienteVenta ? $clienteVenta->getNombre() . " " . $clienteVenta->getApellido() : "Cliente Desconocido";

                mostrar("ID Venta: " . $venta->getId() .
                        " | Fecha: " . $venta->getFecha()->format('d/m/Y H:i:s') .
                        " | Joya: " . $nombreJoya . " (ID: " . $venta->getIdJoya() . ", Tipo: " . $venta->getTipoJoya() . ")" . // Mostrar el tipo de joya de la venta
                        " | Cliente: " . $nombreCliente . " (ID: " . $venta->getIdCliente() . ")" .
                        " | Cantidad: " . $venta->getCantidad() .
                        " | Total: $" . number_format($venta->getPrecioTotal(), 2));
            }
        }
        leer("\nPresione ENTER para continuar ...");
    }

   
    function borrarVenta(): void {
        global $db;
        mostrar("--- Borrar Venta ---");
        listarVentas();
        $idVenta = (int) leer("Ingrese el ID de la venta a borrar: ");

        if ($db->borrarVentaPorId($idVenta)) { 
            mostrar("Venta con ID $idVenta borrada exitosamente.");
        } else {
            mostrar("No se encontró una venta con ID $idVenta.");
        }
        leer("\nPresione ENTER para continuar ...");
    }

    
    function modificarVenta(): void {
        global $db;
        mostrar("--- Modificar Venta ---");
        listarVentas();
        $idVenta = (int) leer("Ingrese el ID de la venta a modificar: ");
        $venta = $db->buscarVentaPorId($idVenta); 

        if ($venta) {
            mostrar("Venta encontrada: " . $venta->__toString());
            mostrar("\n--- Ingrese los nuevos datos para la Venta ID " . $venta->getId() . " ---");
            mostrar("   (Dejar vacío para texto o '0' para números si no desea cambiar)");

            $joyaActual = null;
            if ($venta->getTipoJoya() === 'Anillo') { 
                $joyaActual = $db->buscarAnilloPorId($venta->getIdJoya());
            } elseif ($venta->getTipoJoya() === 'Pulsera') {
                $joyaActual = $db->buscarPulseraPorId($venta->getIdJoya());
            }
            $nombreJoyaActual = $joyaActual ? $joyaActual->getNombre() : "Desconocida";
            $tipoJoyaActual = $venta->getTipoJoya(); 
            
            $clienteActual = $db->buscarClientePorId($venta->getIdCliente());
            $nombreClienteActual = $clienteActual ? $clienteActual->getNombre() . " " . $clienteActual->getApellido() : "Desconocido";

            $joyaCambiada = false;
            $cantidadCambiada = false;

            
            mostrar("\n--- Modificar Joya y Cantidad ---");
            listarAnillos(); 
            listarPulseras();

            $tipoJoyaStrInput = leer("Nuevo tipo de joya (Anillo/Pulsera, actual: $tipoJoyaActual): ");
            $nuevaIdJoyaInput = leer("Nuevo ID de la joya (actual: " . $venta->getIdJoya() . "): ");
            $nuevaCantidadInput = leer("Nueva cantidad (actual: " . $venta->getCantidad() . "): ");

            if (!empty($tipoJoyaStrInput) && !empty($nuevaIdJoyaInput)) {
                $nuevaIdJoya = (int) $nuevaIdJoyaInput;
                $nuevaJoya = null;
                
                if (strtolower($tipoJoyaStrInput) === 'anillo') {
                    $nuevaJoya = $db->buscarAnilloPorId($nuevaIdJoya);
                } elseif (strtolower($tipoJoyaStrInput) === 'pulsera') {
                    $nuevaJoya = $db->buscarPulseraPorId($nuevaIdJoya);
                } else {
                    mostrar("Tipo de joya inválido ('$tipoJoyaStrInput'). No se modificó la joya.");
                }

                if ($nuevaJoya) {
                    $venta->setIdJoya($nuevaJoya->getId());
                    $venta->setTipoJoya(ucfirst(strtolower($tipoJoyaStrInput))); 
                    mostrar("Joya de venta ID " . $venta->getId() . " cambiada a: " . $nuevaJoya->getNombre());
                    $joyaCambiada = true;
                } else if ($nuevaIdJoya !== 0) { 
                    mostrar("Joya con ID $nuevaIdJoya y tipo '$tipoJoyaStrInput' no encontrada. No se modificó la joya.");
                }
            } else if (!empty($tipoJoyaStrInput) || !empty($nuevaIdJoyaInput)) {
                mostrar("Para cambiar la joya, debe especificar AMBOS: el nuevo tipo y el nuevo ID. No se modificó la joya.");
            }


            if (!empty($nuevaCantidadInput) && (int)$nuevaCantidadInput > 0) {
                $nuevaCantidad = (int) $nuevaCantidadInput;
                $venta->setCantidad($nuevaCantidad);
                mostrar("Cantidad de venta ID " . $venta->getId() . " cambiada a: " . $nuevaCantidad);
                $cantidadCambiada = true;
            } else if (!empty($nuevaCantidadInput) && (int)$nuevaCantidadInput <= 0) {
                mostrar("Cantidad inválida (debe ser mayor a 0). No se modificó la cantidad.");
            }

            if ($joyaCambiada || $cantidadCambiada) {
                
                $joyaActualParaCalculo = null;
                if ($venta->getTipoJoya() === 'Anillo') {
                    $joyaActualParaCalculo = $db->buscarAnilloPorId($venta->getIdJoya());
                } elseif ($venta->getTipoJoya() === 'Pulsera') {
                    $joyaActualParaCalculo = $db->buscarPulseraPorId($venta->getIdJoya());
                }

                if ($joyaActualParaCalculo) {
                    $venta->setPrecioTotal($venta->getCantidad() * $joyaActualParaCalculo->getPrecioUnitario());
                    mostrar("Precio total de la venta ID " . $venta->getId() . " recalculado a: $" . number_format($venta->getPrecioTotal(), 2));
                } else {
                    mostrar("Advertencia: No se pudo recalcular el precio total (joya original no encontrada para el cálculo).");
                }
            }

            
            mostrar("\n--- Modificar Cliente ---");
            listarClientes();
            $nuevaIdClienteInput = leer("Nuevo ID del cliente (actual: " . $venta->getIdCliente() . ", '$nombreClienteActual'): ");

            if (!empty($nuevaIdClienteInput) && (int)$nuevaIdClienteInput !== 0) {
                $nuevaIdCliente = (int) $nuevaIdClienteInput;
                $nuevoCliente = $db->buscarClientePorId($nuevaIdCliente);

                if ($nuevoCliente) {
                    $venta->setIdCliente($nuevoCliente->getId());
                    mostrar("Cliente de venta ID " . $venta->getId() . " cambiado a: " . $nuevoCliente->getNombre() . " " . $nuevoCliente->getApellido());
                } elseif ($nuevaIdCliente !== 0) {
                    mostrar("Cliente con ID $nuevaIdCliente no encontrado. No se modificó el cliente.");
                }
            } else if ((int)$nuevaIdClienteInput === 0) {
                mostrar("ID de cliente 0 no válido para cambio. No se modificó el cliente.");
            }

            mostrar("\nVenta con ID " . $idVenta . " modificada exitosamente.");
            mostrar("Estado final de la venta: " . $venta->__toString());


        } else {
            mostrar("No se encontró una venta con ID $idVenta.");
        }
        leer("\nPresione ENTER para continuar ...");
    }


    // --- Funciones de navegación de Menú ---

    function gestionarAnillos(): void { 
        $menu = Menu::getMenuAnillos();
        $opcion = $menu->elegir();
        while ($opcion->getNombre() != 'Volver') { 
            $funcion = $opcion->getFuncion();
            if (function_exists($funcion)) { 
                call_user_func($funcion);
            } else {
                mostrar("ERROR: La función '$funcion' no está definida globalmente.");
                leer("\nPresione ENTER para continuar ...");
            }
            $opcion = $menu->elegir();    
        }
    }

    function gestionarPulseras(): void {
        $menu = Menu::getMenuPulseras();
        $opcion = $menu->elegir();
        while ($opcion->getNombre() != 'Volver') {
            $funcion = $opcion->getFuncion();
            if (function_exists($funcion)) {
                call_user_func($funcion);
            } else {
                mostrar("ERROR: La función '$funcion' no está definida globalmente.");
                leer("\nPresione ENTER para continuar ...");
            }
            $opcion = $menu->elegir();    
        }
    }

    function gestionarClientes(): void {
        $menu = Menu::getMenuClientes();
        $opcion = $menu->elegir();
        while ($opcion->getNombre() != 'Volver') {
            $funcion = $opcion->getFuncion();
            if (function_exists($funcion)) {
                call_user_func($funcion);
            } else {
                mostrar("ERROR: La función '$funcion' no está definida globalmente.");
                leer("\nPresione ENTER para continuar ...");
            }
            $opcion = $menu->elegir();    
        }
    }

    function gestionarVentas(): void { 
        $menu = Menu::getMenuVentas(); 
        $opcion = $menu->elegir();
        while ($opcion->getNombre() != 'Volver') {
            $funcion = $opcion->getFuncion();
            if (function_exists($funcion)) { 
                call_user_func($funcion);
            } else {
                mostrar("ERROR: La función '$funcion' no está definida globalmente.");
                leer("\nPresione ENTER para continuar ...");
            }
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
            mostrar("ERROR: La función principal '$funcionACallar' no está definida o no es accesible.");
            leer("\nPresione ENTER para continuar ...");
        }
        $opcionPrincipal = $menuPrincipal->elegir();    
    }
?>