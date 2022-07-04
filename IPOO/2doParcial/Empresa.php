<?php
class Empresa
{
    private $identificacion;
    private $nombre;
    private $colViajes;

    public function __construct($identificacion, $nombre, $colViajes)
    {
        $this->identificacion = $identificacion;
        $this->nombre = $nombre;
        $this->colViajes = $colViajes;
    }

    public function getIdentificacion()
    {
        return $this->identificacion;
    }

    public function setIdentificacion($identificacion)
    {
        $this->identificacion = $identificacion;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function getColViajes()
    {
        return $this->colViajes;
    }

    public function setColViajes($colViajes)
    {
        $this->colViajes = $colViajes;
    }

    public function __toString()
    {
        return "Identificacion: " . $this->getIdentificacion() .
            "\nNombre: " . $this->getNombre() .
            "\nColeccion de viajes: " . $this->mostrarViajes() . "\n";
    }

    /**
     * Funcion auxiliar que arma un String con los datos de los viajes
     * @return String
     */
    private function mostrarViajes()
    {
        $texto = "";
        $viajes = $this->getColViajes();
        $cantidadViajes = sizeof($viajes);
        for ($i = 0; $i < $cantidadViajes; $i++) {
            $texto = $texto . $viajes[$i];
        }
        return $texto;
    }

    /**
     * Implementar el método buscarViaje(codViaje) que dado un código de viaje que se recibe por parámetro,
     *retorna el objeto viaje correspondiente a ese código
     * @param int $codViaje
     * @return Viaje
     */
    public function buscarViaje($codViaje){
        $encontrado = false;
        $viajes = $this->getColViajes;
        $cantidadViajes = sizeof($viajes);
        $i = 0;
        $viajeBuscado = null;
        while($i<$cantidadViajes && !$encontrado){
            if($viajes[$i]->getNumero() == $codViaje){
                $encontrado = true;
                $viajeBuscado = $viajes[$i];
            } else {
                $i++;
            }
        }
        return $viajeBuscado;
    }

    /**
     * Implementar el método darCostoViaje(codViaje) que dado un código de viaje retorna el importe
     * correspondiente a ese viaje.
     * @param int $codViaje
     * @return int
     */
    public function darCostoViaje($codViaje){
        $viaje = $this->buscarViaje($codViaje);
        $importe = $viaje->calcularImporteViaje();
        return $importe;
    }

    /**
     * Funcion que recorre el arreglo de viajes y retorna el de menor valor
     * @return Array
     */
    public function viajeMenorValor(){
        $viajes = $this->getColViajes();
        $viajeMenorValor = $viajes[0];
        $cantidadViajes = sizeof($viajes);
        for($i=1; $i<$cantidadViajes; $i++){
            $viajeActual = $viajes[$i];
            if($viajeActual->calcularImporteViaje()<$viajeMenorValor->calcularImporteViaje()){
                $viajeMenorValor = $viajeActual;
            }
        }
        return $viajeMenorValor;
    }
}
