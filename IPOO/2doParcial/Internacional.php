<?php
class Internacional extends Viaje{
    private $requiereDocAdicional;
    private $impuesto;

    public function __construct($destino,
    $horaPartida,
    $horaLlegada,
    $numero,
    $importe,
    $fecha,
    $cantAsientosTotales,
    $cantAsientosDisponibles,
    $refResponsable, $requiereDocAdicional)
    {
        parent::__construct($destino,
        $horaPartida,
        $horaLlegada,
        $numero,
        $importe,
        $fecha,
        $cantAsientosTotales,
        $cantAsientosDisponibles,
        $refResponsable);
        $this->requiereDocAdicional = $requiereDocAdicional;
        $this->impuesto = 45;
    }

    

    public function getRequiereDocAdicional(){
        return $this->requiereDocAdicional;
    }

    public function setRequiereDocAdicional($requiereDocAdicional){
        $this->requiereDocAdicional = $requiereDocAdicional;
    }

    public function getImpuesto(){
        return $this->impuesto;
    }

    public function setImpuesto($impuesto){
        $this->impuesto = $impuesto;
    }

    public function __toString()
    {
        $textoRequiere = $this->getRequiereDocAdicional()? "Si." : "No.";
        return parent::__toString() . 
        "Requiere documentacion adicional: " . $textoRequiere . 
        "\nImpuestos: " . $this->getImpuesto() . "%\n------------------\n";
    }

    /**
     * Funcion redefinida que calcula el importe de un viaje sumandole los impuestos al monto
     * @return int
     */
    public function calcularImporteViaje()
    {
        $montoBase = parent::calcularImporteViaje();
        $impuesto = ($montoBase*$this->getImpuesto())/100;
        return $montoBase+$impuesto;
    }
}