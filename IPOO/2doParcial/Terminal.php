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


    public function getDenominacion()
    {
        return $this->denominacion;
    }

    public function setDenominacion($denominacion)
    {
        $this->denominacion = $denominacion;
    }

    public function getDireccion()
    {
        return $this->direccion;
    }

    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;
    }

    public function getColEmpresas()
    {
        return $this->colEmpresas;
    }

    public function setColEmpresas($colEmpresas)
    {
        $this->colEmpresas = $colEmpresas;
    }

    public function __toString()
    {
        return "Denominacion: " . $this->getDenominacion() .
            "\nDireccion: " . $this->getDireccion() .
            "\nColeccion de empresas: " . $this->mostrarEmpresas() . "\n";
    }

    /**
     * Funcion que arma un String con los datos de las empresas
     * @return String
     */
    private function mostrarEmpresas()
    {
        $texto = "";
        $empresas = $this->getColEmpresas();
        $cantidadEmpresas = sizeof($empresas);
        for ($i = 0; $i < $cantidadEmpresas; $i++) {
            $texto = $texto . $empresas[$i];
        }
        return $texto;
    }

    /**
     * Implementar el método darViajeMenorValor() recorre cada una de las empresas vinculadas a la terminal
     *y retorna una colección de objetos viaje. Cada viaje es el de menor valor dentro de la colección de viajes
     *de esa empresa
     * @return Array
     */
    public function darViajeMenorValor()
    {
        $colViajes = [];
        $empresas = $this->getColEmpresas();
        $cantidadEmpresas = sizeof($empresas);
        for($i=0; $i<$cantidadEmpresas; $i++){
            $colViajes[] = $empresas[$i]->viajeMenorValor();
        }
        return $colViajes;
    }
}
