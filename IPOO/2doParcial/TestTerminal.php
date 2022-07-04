<?php

include "Viaje.php";
include "Empresa.php";
include "Internacional.php";
include "Nacional.php";
include "Responsable.php";
include "Terminal.php";

/**
 * 1) Se crea una colección con un mínimo de 2 empresas, ejemplo Metrovías y Tren Patagónico
 */

$empresa1 = new Empresa(1, "Metrovias", []);
$empresa2 = new Empresa(2, "Tren Patagonico", []);
$empresas = [$empresa1, $empresa2];
/**
 * 2) A cada empresa se le incorporan 2 instancias de la clase viaje Nacionales y 3 instancias de la clase ViajeInternacionales.
 */

$responsable = new Responsable("Martina", "Fernandez", 1111111, "Av. Bs As", "mail@mail", 2994677550);
$viajeNac1 = new Nacional("Mendoza", 12, 00, 1, 1000, "01/06/2022", 50, 20, $responsable);
$viajeNac2 = new Nacional("Mendoza", 12, 00, 2, 1200, "02/06/2022", 50, 20, $responsable);
$viajeNac3 = new Nacional("Cordoba", 12, 00, 3, 1000, "03/06/2022", 50, 20, $responsable);
$viajeNac4 = new Nacional("Rio Negro", 12, 00, 4, 1800, "04/06/2022", 50, 20, $responsable);

$viajeInt1 = new Internacional("Londres", 12, 00, 5, 2000, "01/06/2022", 50, 20, $responsable, false);
$viajeInt2 = new Internacional("Londres", 12, 00, 6, 2200, "01/06/2022", 50, 20, $responsable, true);
$viajeInt3 = new Internacional("Brasil", 12, 00, 7, 100, "01/06/2022", 50, 20, $responsable, false);
$viajeInt4 = new Internacional("España", 12, 00, 8, 2000, "01/06/2022", 50, 20, $responsable, false);
$viajeInt5 = new Internacional("Paris", 12, 00, 9, 2000, "01/06/2022", 50, 20, $responsable, false);
$viajeInt6 = new Internacional("Japom", 12, 00, 10, 3000, "01/06/2022", 50, 20, $responsable, false);

$empresa1->setColViajes([$viajeNac1, $viajeNac2, $viajeInt1, $viajeInt2, $viajeInt3]);
$empresa2->setColViajes([$viajeNac3, $viajeNac4, $viajeInt4, $viajeInt5, $viajeInt6]);


/**
 * 3) Se crea un objeto Terminal con la colección de empresas creadas en el punto1
 */
$terminal = new Terminal("Terminal A", "Av. Bs As", $empresas);

/**
 * 4) Invocar y visualizar el resultado obtenido de invocar al método darViajeMenorValor() a partir de la
 * instancia Aeropuerto creada en el punto 3.
 */

 $viajesMenorValor = $terminal->darViajeMenorValor();
 foreach($viajesMenorValor as $viaje){
     echo $viaje;
 }
