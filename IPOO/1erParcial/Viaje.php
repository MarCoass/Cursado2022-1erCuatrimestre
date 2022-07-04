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
    private $cantAsientosOcupados;
    private $refPersonaResponsable;

    public function __construct(
        $destino,
        $horaPartida,
        $horaLlegada,
        $numero,
        $importe,
        $fecha,
        $cantAsientosTotales,
        $cantAsientosOcupados,
        $refPersonaResponsable
    ) {
        $this->destino = $destino;
        $this->horaPartida = $horaPartida;
        $this->horaLlegada = $horaLlegada;
        $this->numero = $numero;
        $this->importe = $importe;
        $this->fecha = $fecha;
        $this->cantAsientosTotales = $cantAsientosTotales;
        $this->cantAsientosOcupados = $cantAsientosOcupados;
        $this->refPersonaResponsable = $refPersonaResponsable;
    }

    //metodos de acceso
    

    public function getDestino(){
        return $this->destino;
    }

    public function getHoraPartida(){
        return $this->horaPartida;
    }

    public function getHoraLlegada(){
        return $this->horaLlegada;
    }

    public function getNumero(){
        return $this->numero;
    }

    public function getImporte(){
        return $this->importe;
    }

    public function getFecha(){
        return $this->fecha;
    }

    public function getCantAsientosTotales(){
        return $this->cantAsientosTotales;
    }

    public function getCantAsientosOcupados(){
        return $this->cantAsientosOcupados;
    }

    public function getRefPersonaResponsable(){
        return $this->refPersonaResponsable;
    }

    public function setDestino($destino){
        $this->destino = $destino;
    }

    public function setHoraPartida($horaPartida){
        $this->horaPartida = $horaPartida;
    }

    public function setHoraLlegada($horaLlegada){
        $this->horaLlegada = $horaLlegada;
    }

    public function setNumero($numero){
        $this->numero = $numero;
    }

    public function setImporte($importe){
        $this->importe = $importe;
    }

    public function setFecha($fecha){
        $this->fecha = $fecha;
    }

    public function setCantAsientosTotales($cantAsientosTotales){
        $this->cantAsientosTotales = $cantAsientosTotales;
    }

    public function setCantAsientosOcupados($cantAsientosOcupados){
        $this->cantAsientosOcupados = $cantAsientosOcupados;
    }

    public function setRefPersonaResponsable($refPersonaResponsable){
        $this->refPersonaResponsable = $refPersonaResponsable;
    }

    //Otros metodos
    public function __toString()
    {
        return "Destino: " . $this->getDestino() . 
        "\nHora de partida: " . $this->getHoraPartida() . 
        "\nHora de llegada: " . $this->getHoraLlegada() . 
        "\nNumero: " . $this->getNumero() . 
        "\nImporte: " . $this->getImporte() . 
        "\nFecha: " . $this->getFecha() . 
        "\nCantidad de asientos totales: " . $this->getCantAsientosTotales() . 
        "\nCantidad de asientos ocupados: " . $this->getCantAsientosOcupados() . 
        "\nPersona responsable: " . $this->getRefPersonaResponsable() . "\n";
    }

    /**
     * Metodo que recibe por parametro la cantidad de asientos que desean asignarse.
     * Retorna true en caso de que se pueda realizar la asignacion o false en caso contrario
     * @param int $cantAsientos
     * @return boolean
     */
    public function asignarLugaresDisponibles($cantAsientos){
        $cantAsientosDisponibles = $this->getCantAsientosTotales() - $this->getCantAsientosOcupados();
        if($cantAsientos<=$cantAsientosDisponibles){
            $nuevaCantidad = $this->getCantAsientosOcupados()+$cantAsientos;
            $this->setCantAsientosOcupados($nuevaCantidad);
            $exito = true;
        } else {
            $exito = false;
        }
        return $exito;
    }

}
