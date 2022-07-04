<?php
class Viaje
{
    private $destino;
    private $horaPartida;
    private $horaLlegada;
    private $numero;
    private $importe;
    private $fecha;
    private $cantAsientosTotales;
    private $cantAsientosDisponibles;
    private $refResponsable;

    public function __construct(
        $destino,
        $horaPartida,
        $horaLlegada,
        $numero,
        $importe,
        $fecha,
        $cantAsientosTotales,
        $cantAsientosDisponibles,
        $refResponsable
    ) {
        $this->destino = $destino;
        $this->horaPartida = $horaPartida;
        $this->horaLlegada = $horaLlegada;
        $this->numero = $numero;
        $this->importe = $importe;
        $this->fecha = $fecha;
        $this->cantAsientosTotales = $cantAsientosTotales;
        $this->cantAsientosDisponibles = $cantAsientosDisponibles;
        $this->refResponsable = $refResponsable;
    }
    

    public function getDestino(){
        return $this->destino;
    }

    public function setDestino($destino){
        $this->destino = $destino;
    }

    public function getHoraPartida(){
        return $this->horaPartida;
    }

    public function setHoraPartida($horaPartida){
        $this->horaPartida = $horaPartida;
    }

    public function getHoraLlegada(){
        return $this->horaLlegada;
    }

    public function setHoraLlegada($horaLlegada){
        $this->horaLlegada = $horaLlegada;
    }

    public function getNumero(){
        return $this->numero;
    }

    public function setNumero($numero){
        $this->numero = $numero;
    }

    public function getImporte(){
        return $this->importe;
    }

    public function setImporte($importe){
        $this->importe = $importe;
    }

    public function getFecha(){
        return $this->fecha;
    }

    public function setFecha($fecha){
        $this->fecha = $fecha;
    }

    public function getCantAsientosTotales(){
        return $this->cantAsientosTotales;
    }

    public function setCantAsientosTotales($cantAsientosTotales){
        $this->cantAsientosTotales = $cantAsientosTotales;
    }

    public function getCantAsientosDisponibles(){
        return $this->cantAsientosDisponibles;
    }

    public function setCantAsientosDisponibles($cantAsientosDisponibles){
        $this->cantAsientosDisponibles = $cantAsientosDisponibles;
    }

    public function getRefResponsable(){
        return $this->refResponsable;
    }

    public function setRefResponsable($refResponsable){
        $this->refResponsable = $refResponsable;
    }

    public function __toString()
    {
        return "Destino: " . $this->getDestino() . 
        "\nHora de partida: " . $this->getHoraPartida() . 
        "\nHora de llegada: " . $this->getHoraLlegada() . 
        "\nNumero: " . $this->getNumero() . 
        "\nImporte base: " . $this->getImporte() . 
        "\nFecha: " . $this->getFecha() . 
        "\nCantidad de asientos totales: " . $this->getCantAsientosTotales() . 
        "\nCantidad de asientos dispnibles: " . $this->getCantAsientosDisponibles() . 
        "\nPersona responsable: " . $this->getRefResponsable();
    }

    /**
     * Funcion que calcula de importe de un viaje
     * @return int
     */
    public function calcularImporteViaje(){
        $asientosVendidos = $this->getCantAsientosTotales() - $this->getCantAsientosDisponibles();
        $importe =$this->getImporte() + ($this->getImporte() * $asientosVendidos / $this->getCantAsientosTotales());
        return $importe;
    }
}
