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

    //Metodos de acceso

    public function getIdentificacion()
    {
        return $this->identificacion;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getColViajes()
    {
        return $this->colViajes;
    }

    public function setIdentificacion($identificacion)
    {
        $this->identificacion = $identificacion;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function setColViajes($colViajes)
    {
        $this->colViajes = $colViajes;
    }

    //Otros metodos
    public function __toString()
    {
        return "Identificacion: " . $this->getIdentificacion() .
            "\nNombre: " . $this->getNombre() .
            "\nViajes: " . $this->mostrarViajes() . "\n";
    }

    private function mostrarViajes()
    {
        $coleccionViajes = $this->getColViajes();
        if ($coleccionViajes != null) {
            $texto = "";
            $cantidad = count($coleccionViajes);
            for ($i = 0; $i < $cantidad; $i++) {
                $texto = $texto . $coleccionViajes[$i];
            }
        } else {
            $texto = "No se han cargado viajes.\n";
        }
        return $texto;
    }

    /**
     * Implementar el método darViajeADestino($elDestino) que recibe por parámetro un destino junto a una 
     * cantidad de asientos y retorna una colección con todos los viajes disponibles a ese destino. 
     * @param String $elDestino
     * @param int $cantAsientos
     * @return Array
     */
    public function darViajeADestino($elDestino, $cantAsientos)
    {
        $coleccionViajes = $this->getColViajes();
        $cantidadViajes = count($coleccionViajes);
        $viajesAlDestino = [];
        for ($i = 0; $i < $cantidadViajes; $i++) {
            $viajeActual = $coleccionViajes[$i];
            //Si el viaje tiene mismo destino y alcanzan los asientos disponibles 
            if ($viajeActual->getDestino() == $elDestino  && ($viajeActual->getCantAsientosTotales() - $viajeActual->getCantAsientosOcupados() >= $cantAsientos)) {
                $viajesAlDestino[] = $viajeActual;
            }
        }
        return $viajesAlDestino;
    }

    /**
     * Implementar el método incorporarViaje que recibe como parámetro un viaje, verifica que no se encuentre registrado 
     * ningún otro viaje al mismo destino, en la misma fecha y con el mismo horario de partida. Elmétodo retorna verdadero si 
     * la incorporación del viaje se realizó correctamente y falso en caso contrario.
     * @param Viaje $nuevoViaje
     * @return boolean
     */
    public function incorporarViaje($nuevoViaje)
    {

        $coleccionViajes = $this->getColViajes();
        $cantidadViajes = count($coleccionViajes);
        $exito = true;
        $i = 0;
        while ($i < $cantidadViajes && $exito) {
            $viajeActual = $coleccionViajes[$i];
            if (
                $viajeActual->getDestino() == $nuevoViaje->getDestino() &&
                $viajeActual->getFecha() == $nuevoViaje->getFecha() &&
                $viajeActual->getHoraPartida() == $nuevoViaje->getHoraPartida()
            ) {
                //Existe un viaje con los mismos valores
                $exito = false;
            }
        }
        //Si exito sigue siendo true, es porque no se encontro un viaje con los mismos valores, entonces se agrega a la coleccion de viajes
        if($exito){
            $coleccionViajes[] = $viajeActual;
            $this->setColViajes($coleccionViajes);
        }
        return $exito;
    }

    /**
     * Implementar el método venderViajeADestino($cantAsientos, $destino) método que recibe por parámetro la cantidad de asientos 
     * y el destino y se registra la asignación del viaje en caso de ser posible. 
     * (invocar al método asignarAsientosDisponibles ). El método retorna la instancia del viaje asignado o null encaso contrario.
     * @param int $cantAsientos
     * @param String $destino
     * @param String $fecha
     * @return Viaje
     */
    public function venderViajeADestino($cantAsientos, $destino, $fecha){
        $coleccionViajes = $this->getColViajes();
        $cantidadViajes = count($coleccionViajes);
        $i = 0;
        $viajeAsignado = null;
        while($i<$cantidadViajes && $viajeAsignado==null){
            $viajeActual = $coleccionViajes[$i];
            if($viajeActual->getDestino()==$destino && $viajeActual->getCantAsientosTotales()-$viajeActual->getCantAsientosOcupados()>=$cantAsientos && $viajeActual->getFecha() == $fecha){
                $viajeAsignado = $viajeActual;
                $viajeAsignado->asignarLugaresDisponibles($cantAsientos);
            } else {
                $i++;
            }
        }
        return $viajeAsignado;
    }

    /**
     * Implementar el método montoRecaudado que retorna el monto recaudado por la Empresa.
     * (tener en cuenta los asientos vendidos y el importe del viaje)
     * @return int
     */
    public function montoRecaudado(){
        $totalRecaudado = 0;
        $coleccionViajes = $this->getColViajes();
        $cantidadViajes = count($coleccionViajes);
        for ($i = 0; $i<$cantidadViajes; $i++){
            $viajeActual = $coleccionViajes[$i];
            $totalRecaudado = $totalRecaudado + $viajeActual->getImporte() * $viajeActual->getCantAsientosOcupados();
        }
        return $totalRecaudado;
    }

    
}
