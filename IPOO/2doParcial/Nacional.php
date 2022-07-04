<?php
class Nacional extends Viaje
{
    private $descuento;

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
        parent::__construct(
            $destino,
            $horaPartida,
            $horaLlegada,
            $numero,
            $importe,
            $fecha,
            $cantAsientosTotales,
            $cantAsientosDisponibles,
            $refResponsable
        );
        $this->descuento = 10;
    }

    public function getDescuento()
    {
        return $this->descuento;
    }

    public function setDescuento($descuento)
    {
        $this->descuento = $descuento;
    }

    public function __toString()
    {
        return parent::__toString() .
        "Descuento: " . $this->getDescuento() . "%\n------------------\n";
    }

    /**
     * Funcion redefinida que calcula el importe de un viaje restandole al monto total el descuento
     * @return int
     */
    public function calcularImporteViaje()
    {
        $montoBase = parent::calcularImporteViaje();
        $descuento = ($montoBase*$this->getDescuento())/100;
        $total = $montoBase-$descuento;
        return $total;
    }
}
