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