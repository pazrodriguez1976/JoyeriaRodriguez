<?php
require_once ('Opcion.php'); 

class Menu {
    private string $titulo;
    private array $opciones = [];

    public function __construct(string $titulo)
    {
        $this->titulo = $titulo;
    }

    public function addOpcion (Opcion $opcion): void {
        $this->opciones[] = $opcion;
    }

    private function mostrar(): void {
        system('cls');
        mostrar($this->titulo);
        mostrar(str_pad('', strlen($this->titulo), '-'));

        foreach ($this->opciones as $key => $opcion) {
            mostrar("\033[1;31m".$key."\033[0m"."-".$opcion->getNombre());
        }
        mostrar("");
    }

    public function elegir(): Opcion {
        $this->mostrar();
        $opcionSeleccionada = null;
        do {
            $entrada = leer("Seleccione una opción:\n"); 
            if (isset($this->opciones[$entrada])) {
                $opcionSeleccionada = $this->opciones[$entrada];
            } else {
                mostrar("Opción inválida. Intente de nuevo.");
            }
        } while ($opcionSeleccionada === null);

        return $opcionSeleccionada;        
    }

    static function getMenuPrincipal(): Menu {
        $menu = new Menu('Menu Principal - Joyería');
        $menu->addOpcion( new Opcion('Salir', 'salirAplicacion')); 
        $menu->addOpcion( new Opcion('Gestionar Anillos', 'gestionarAnillos')); 
        $menu->addOpcion( new Opcion('Gestionar Pulseras', 'gestionarPulseras')); 
        $menu->addOpcion( new Opcion('Gestionar Clientes', 'gestionarClientes')); 
        $menu->addOpcion( new Opcion('Gestionar Ventas', 'gestionarVentas')); 
        return $menu;
    }

    static function getMenuAnillos(): Menu {
        $menu = new Menu('Menu Anillos');
        $menu->addOpcion( new Opcion('Volver', 'Volver')); 
        $menu->addOpcion( new Opcion('Listar Anillos', 'listarAnillos'));
        $menu->addOpcion( new Opcion('Agregar Anillo', 'agregarAnillo'));
        $menu->addOpcion( new Opcion('Borrar Anillo', 'borrarAnillo'));
        $menu->addOpcion( new Opcion('Modificar Anillo', 'modificarAnillo'));
        return $menu;
    }

    static function getMenuPulseras(): Menu {
        $menu = new Menu('Menu Pulseras');
        $menu->addOpcion( new Opcion('Volver', 'Volver'));
        $menu->addOpcion( new Opcion('Listar Pulseras', 'listarPulseras'));
        $menu->addOpcion( new Opcion('Agregar Pulsera', 'agregarPulsera'));
        $menu->addOpcion( new Opcion('Borrar Pulsera', 'borrarPulsera'));
        $menu->addOpcion( new Opcion('Modificar Pulsera', 'modificarPulsera'));
        return $menu;
    }

    static function getMenuClientes(): Menu {
        $menu = new Menu('Menu Clientes');
        $menu->addOpcion( new Opcion('Volver', 'Volver'));
        $menu->addOpcion( new Opcion('Listar Clientes', 'listarClientes'));
        $menu->addOpcion( new Opcion('Agregar Cliente', 'agregarCliente'));
        $menu->addOpcion( new Opcion('Borrar Cliente', 'borrarCliente'));
        $menu->addOpcion( new Opcion('Modificar Cliente', 'modificarCliente'));
        return $menu;
    }

    static function getMenuVentas(): Menu {
        $menu = new Menu('Menu Ventas');
        $menu->addOpcion( new Opcion('Volver', 'Volver'));
        $menu->addOpcion( new Opcion('Realizar Nueva Venta', 'realizarVenta')); 
        $menu->addOpcion( new Opcion('Listar Ventas', 'listarVentas'));
        $menu->addOpcion( new Opcion('Borrar Venta', 'borrarVenta')); 
        $menu->addOpcion( new Opcion('Modificar Venta', 'modificarVenta')); 
        return $menu;
    }
}