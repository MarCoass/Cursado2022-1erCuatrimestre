<?php

/**
 * Primer parcial IPOO
 * Coassin-Fernandez, Martina
 * FAI-2542
 */

include "Responsable.php";
include "Viaje.php";
include "Empresa.php";
include "Terminal.php";

//1)Se crea una coleccion con un minimo de 2 empresas, ejemplo Metrovias y Tren Patagonico

$empresas = [
    new Empresa("1", "Metrovias", []),
    new Empresa("2", "Tren Patagonico", [])
];

//2)A cada empresa se le incorporan 2 instancias de la clase viaje
$personaA = new Responsable("Juan", "Peres", 99999999, "Calle n°1", "mail@mail.com", "299333222");
$viajesA = [
    new Viaje("Mendoza", 8, 20, 1, 1000, "27/05/2022", 50, 0, $personaA),
    new Viaje("Buenos Aires", 8, 21, 2, 1500, "04/05/2022", 50, 0, $personaA)
];
$personaB = new Responsable("Pedro", "Juarez", 99999999, "Calle n°1", "mail@mail.com", "299333222");
$viajesB = [
    new Viaje("Las Grutas", 8, 20, 3, 900, "27/05/2022", 50, 0, $personaB),
    new Viaje("Buenos Aires", 8, 21, 4, 1500, "04/05/2022", 50, 0, $personaB),
    new Viaje("Buenos Aires", 9, 22, 5, 1500, "05/05/2022", 50, 0, $personaB)
];

$empresas[0]->setColViajes($viajesA);
$empresas[1]->setColViajes($viajesB);

//3)Se crea un objeto terminal con la coleccion de empresas creadas en el punto 1.
$terminal = new Terminal("Teminal", "Ruta 22", $empresas );

//4)Invocar y visualizar el resultado del metodo ventaAutomatica con cantidad de asientos 3 y como destino alguno de los destinos de vviaje creados en 2

echo "--------------Punto 4----------------\n".$terminal->ventaAutomatica(3, "27/05/2022", "Mendoza", $empresas[0]);

//5)Invocar y visualizar el resultado del método empresaMayorRecaudacion.
echo "-------------Punto 5-----------------\n".$terminal->empresaMayorRecaudacion();

//6)Invocar y visualizar el resultado del método responsableViaje correspondiente a uno de los números de viajes del punto 2.
echo "-------------Punto 6-----------------\n". $terminal->responsableViaje(2);
