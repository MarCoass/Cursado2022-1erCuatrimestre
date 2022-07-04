<?php
class Terminal
{
    private $denominacion;
    private $direccion;
    private $colEmpresas;

    public function __construct($denominacion, $direccion, $colEmpresas)
    {
        $this->denominacion = $denominacion;
        $this->direccion = $direccion;
        $this->colEmpresas = $colEmpresas;
    }

    //Metodos de acceso

    public function getDenominacion()
    {
        return $this->denominacion;
    }

    public function getDireccion()
    {
        return $this->direccion;
    }

    public function getColEmpresas()
    {
        return $this->colEmpresas;
    }

    public function setDenominacion($denominacion)
    {
        $this->denominacion = $denominacion;
    }

    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;
    }

    public function setColEmpresas($colEmpresas)
    {
        $this->colEmpresas = $colEmpresas;
    }

    //Otros metodos

    public function __toString()
    {
        return "Denominacion: " . $this->getDenominacion() .
            "\nDireccion: " . $this->getDireccion() .
            "\nEmpresas: " . $this->mostrarEmpresas() . "\n";
    }

    private function mostrarEmpresas()
    {
        $coleccion = $this->getColEmpresas();
        if ($coleccion != null) {
            $cantidad = count($coleccion);
            $texto = "";
            for ($i = 0; $i < $cantidad; $i++) {
                $texto = $texto . $coleccion[$i];
            }
        } else {
            $texto = "No se han cargado empresas.\n";
        }
        return $texto;
    }

    /**
     * Implementar el método ventaAutomatica($cantAsientos, $fecha, $destino, $empresa) que recibe por
     *parámetro la cantidad de asientos que se requieren, una fecha, un destino y la empresa con la que se
     *desea viajar. Automáticamente se registra la venta del viaje. (Para la implementación de este método
     *debe utilizarse uno de los métodos implementados en la clase Viaje).
     * @param int $cantAsientos
     * @param String $fecha
     * @param String $destino
     * @param Empresa $empresa
     * @return Viaje
     */
    public function ventaAutomatica($cantAsientos, $fecha, $destino, $empresa)
    {
        $viajeVendido = $empresa->venderViajeADestino($cantAsientos, $destino, $fecha);
        return $viajeVendido;
    }


    /**
     * Implementar el método empresaMayorRecaudacion retorna un objeto de la clase empresa que se corresponde con la de mayor recaudación.
     * @return Empresa
     */
    public function empresaMayorRecaudacion()
    {
        $empresas = $this->getColEmpresas();
        $cantidadEmpresas = count($empresas);
        $empresaMayorRecaudacion = $empresas[0];
        $mayorRecaudacion = 0;
        for ($i = 0; $i < $cantidadEmpresas; $i++) {
            if ($mayorRecaudacion < $empresas[$i]->montoRecaudado()) {
                $empresaMayorRecaudacion = $empresas[$i];
                $mayorRecaudacion = $empresas[$i]->montoRecaudado();
            }
        }
        return $empresaMayorRecaudacion;
    }

    /**
     * Implementar el método responsableViaje($numeroViaje) que recibe por parámetro un número de viaje y retorna el responsable del viaje
     * @param int $numeroViaje
     * @return Responsable
     */
    public function responsableViaje($numeroViaje)
    {
        $responsable = null;
        $empresas = $this->getColEmpresas();
        $cantidadEmpresas = count($empresas);
        $i = 0;
        while ($i < $cantidadEmpresas && $responsable == false) {
            $empresaActual = $empresas[$i];
            $viajes = $empresaActual->getColViajes();
            $cantidadViajes = count($viajes);
            $j = 0;
            while ($j < $cantidadEmpresas && $responsable == false) {
                $viajeActual = $viajes[$i];
                if ($viajeActual->getNumero() == $numeroViaje) {
                    $responsable = $viajeActual->getRefPersonaResponsable();
                } else {
                    $i++;
                }
            }
        }
        return $responsable;
    }
}
