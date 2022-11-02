<?php
include_once("wordix.php");

/**************************************/
/***** DATOS DE LOS INTEGRANTES *******/
/**************************************/

/* Ferreyra, Mauricio. Legajo: 53722. Carrera: TUDW. mail:afinmortu@gmail.com . Usuario Github: afinmortu 
   Insua, Francisco. Legajo: 3013. Carrera: TUDW. mail:franinsua7@gmail.com . Usuario Github: frankitobienslow*/
/* ... COMPLETAR ... */



/**************************************/
/***** DEFINICION DE FUNCIONES ********/
/**************************************/

/**
 * Obtiene una colección de palabras
 * @return array
 */
function cargarColeccionPalabras()
{
    $coleccionPalabras = [
        "MUJER", "QUESO", "FUEGO", "CASAS", "RASGO",
        "GATOS", "GOTAS", "HUEVO", "TINTO", "NAVES",
        "VERDE", "MELON", "YUYOS", "PIANO", "PISOS",
        "LOCOS", "GANAR", "MONOS", "REINO", "FAROL"
    ];

    return ($coleccionPalabras);
}

/* ... COMPLETAR ... */



/**************************************/
/*********** PROGRAMA PRINCIPAL *******/
/**************************************/

//Declaración de variables:


//Inicialización de variables:


//Proceso:

$partida = jugarWordix("MELON", strtolower("MaJo"));
//print_r($partida);
//imprimirResultado($partida);



echo "\n*****MENU DE OPCIONES*****\n
    1) Jugar al Wordix con una palabra elegida\n
    2) Jugar al Wordix con una palabra aleatoria\n
    3) Mostrar una partida\n
    4) Mostrar la primer partida ganadora\n
    5) Mostrar resumen de Jugador\n
    6) Mostrar listado de partidas ordenadas por jugador y por palabra\n
    7) Agregar una palabra de 5 letras a Wordix\n
    8) Salir\n";

do {
    $opcion = trim(fgets(STDIN));

    switch ($opcion) {
        case 1:
            //completar qué secuencia de pasos ejecutar si el usuario elige la opción 1

            break;
        case 2:
            //completar qué secuencia de pasos ejecutar si el usuario elige la opción 2

            break;
        case 3:
            //completar qué secuencia de pasos ejecutar si el usuario elige la opción 3

            break;
        case 4:
            //completar qué secuencia de pasos ejecutar si el usuario elige la opción 3

            break;
        case 5:
            //completar qué secuencia de pasos ejecutar si el usuario elige la opción 3

            break;
        case 6:
            //completar qué secuencia de pasos ejecutar si el usuario elige la opción 3

            break;
        case 7:
            //completar qué secuencia de pasos ejecutar si el usuario elige la opción 3

            break;
        case 8:
            //completar qué secuencia de pasos ejecutar si el usuario elige la opción 3

            break;
    }
} while (
    $opcion != 1 &&
    $opcion != 2 &&
    $opcion != 3 &&
    $opcion != 4 &&
    $opcion != 5 && 
    $opcion != 6 && 
    $opcion != 7 && 
    $opcion != 8
);
