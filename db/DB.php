<?php


class DB {
    private array $anillos = []; 
    private array $pulseras = []; 
    private array $clientes = []; 
    private array $ventas = []; 

    // Métodos para Anillos 
    function agregarAnillo(Anillo $anillo): void {
        $this->anillos[] = $anillo;
    }

    function getAnillos(): array {
        return $this->anillos;
    }

    function buscarAnilloPorId(int $id): ?Anillo {
        foreach ($this->anillos as $anillo) {
            if ($anillo->getId() == $id) {
                return $anillo;
            }
        }
        return null;
    }

    function buscarIndiceAnilloPorId(int $id): ?int {
        foreach ($this->anillos as $indice => $anillo) {
            if ($anillo->getId() == $id) {
                return $indice;
            }
        }
        return null;
    }

    function borrarAnilloPorId(int $id): bool {
        $indice = $this->buscarIndiceAnilloPorId($id);
        if ($indice !== null) { 
            array_splice($this->anillos, $indice, 1);
            return true;
        } else {
            return false;
        }
    }

    // Métodos para Pulseras 
    function agregarPulsera(Pulsera $pulsera): void {
        $this->pulseras[] = $pulsera;
    }

    function getPulseras(): array {
        return $this->pulseras;
    }

    function buscarPulseraPorId(int $id): ?Pulsera {
        foreach ($this->pulseras as $pulsera) {
            if ($pulsera->getId() == $id) {
                return $pulsera;
            }
        }
        return null;
    }

    function buscarIndicePulseraPorId(int $id): ?int {
        foreach ($this->pulseras as $indice => $pulsera) {
            if ($pulsera->getId() == $id) {
                return $indice;
            }
        }
        return null;
    }

    function borrarPulseraPorId(int $id): bool {
        $indice = $this->buscarIndicePulseraPorId($id);
        if ($indice !== null) {
            array_splice($this->pulseras, $indice, 1);
            return true;
        } else {
            return false;
        }
    }

    // Métodos para Clientes 
    function agregarCliente(Cliente $cliente): void {
        $this->clientes[] = $cliente;
    }

    function getClientes(): array {
        return $this->clientes;
    }

    function buscarClientePorId(int $id): ?Cliente {
        foreach ($this->clientes as $cliente) {
            if ($cliente->getId() == $id) {
                return $cliente;
            }
        }
        return null;
    }

    function buscarIndiceClientePorId(int $id): ?int {
        foreach ($this->clientes as $indice => $cliente) {
            if ($cliente->getId() == $id) {
                return $indice;
            }
        }
        return null;
    }

    function borrarClientePorId(int $id): bool {
        $indice = $this->buscarIndiceClientePorId($id);
        if ($indice !== null) {
            array_splice($this->clientes, $indice, 1);
            return true;
        } else {
            return false;
        }
    }

    // Métodos para Ventas (MODIFICADOS para CRUD)
    function agregarVenta(Venta $venta): void {
        $this->ventas[] = $venta;
    }

    function getVentas(): array {
        return $this->ventas;
    }

    function buscarVentaPorId(int $id): ?Venta {
        foreach ($this->ventas as $venta) {
            if ($venta->getId() == $id) {
                return $venta;
            }
        }
        return null;
    }

    function buscarIndiceVentaPorId(int $id): ?int {
        foreach ($this->ventas as $indice => $venta) {
            if ($venta->getId() == $id) {
                return $indice;
            }
        }
        return null;
    }

    function borrarVentaPorId(int $id): bool {
        $indice = $this->buscarIndiceVentaPorId($id);
        if ($indice !== null) {
            array_splice($this->ventas, $indice, 1);
            return true;
        } else {
            return false;
        }
    }
}