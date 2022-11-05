<?php
include_once("wordix.php");

/**************************************/
/***** DATOS DE LOS INTEGRANTES *******/
/**************************************/

/* Ferreyra, Mauricio. Legajo: 53722. Carrera: TUDW. mail:afinmortu@gmail.com . Usuario Github: afinmortu 
   Insua, Francisco. Legajo: 3013. Carrera: TUDW. mail:franinsua7@gmail.com . Usuario Github: frankitobienslow
   Alexis Casimiro** - legajo 4224 - mail: exequielcasimiro@gmail.com - Github: AlexisCasimiro
   Matias Riveiro - Legajo FAI-4438 - mail: matias.riveiro@est.fi.uncoma.edu.ar - Github Matias-Ignacio 
*/
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
/**
 * Inicia una estructura de datos con ejemplos de partidas
 * No recibe parametros formales y devuelve un array con las partidas
 * @return array
 */
//-----------------------------------------------------------------------------------------------
function cargarPartidas ()
{
    /*
    string $coleccionPartidas[0]["palabraWordix"]
    string $coleccionPartidas[0]["jugador"]
    int $coleccionPartidas[0]["intentos"]
    int $coleccionPartidas[0]["puntaje"]
    */
    $coleccionPartidas[0] = ["palabraWordix"=>"QUESO","jugador"=>"majo","intentos"=>0,"puntaje"=>0];
    $coleccionPartidas[1] = ["palabraWordix"=>"CASAS","jugador"=>"tito","intentos"=>0,"puntaje"=>0];
    $coleccionPartidas[2] = ["palabraWordix"=>"QUESO","jugador"=>"pepe","intentos"=>0,"puntaje"=>0];
    $coleccionPartidas[3] = ["palabraWordix"=>"TINTO","jugador"=>"atilio","intentos"=>0,"puntaje"=>0];
    $coleccionPartidas[4] = ["palabraWordix"=>"MUJER","jugador"=>"chino21","intentos"=>0,"puntaje"=>0];
    $coleccionPartidas[5] = ["palabraWordix"=>"GOTAS","jugador"=>"marx","intentos"=>0,"puntaje"=>0];
    $coleccionPartidas[6] = ["palabraWordix"=>"REINO","jugador"=>"chino21","intentos"=>0,"puntaje"=>0];
    $coleccionPartidas[7] = ["palabraWordix"=>"GANAR","jugador"=>"pinky","intentos"=>0,"puntaje"=>0];
    $coleccionPartidas[8] = ["palabraWordix"=>"MELON","jugador"=>"atilio","intentos"=>0,"puntaje"=>0];
    $coleccionPartidas[9] = ["palabraWordix"=>"VERDE","jugador"=>"atilio","intentos"=>0,"puntaje"=>0];
    return $coleccionPartidas;
}
//----------------------------------------------------------------------------------------------------------
/**
 * Recibe un numero de partida y muestra en pantalla los datos de la partida,
 * Recibe el array con las partidas guardadas
 * Recibe un numero de partida existente
 *  no tiene retorno :)
 * @param int $numPartida
 * @param array $colPartidas[]
 */
function resumenPartida($numPartida, $colPartidas)
{

    echo "***********************************";
    echo "Partida Wordix ". $numPartida. ": palabra ". $colPartidas[$numPartida-1]["palabraWordix"];
    echo "Jugador: ". $colPartidas[$numPartida-1]["jugador"];
    echo "Puntaje: ". $colPartidas[$numPartida-1]["puntaje"]. " puntos.";
    if ($colPartidas[$numPartida-1]["puntaje"] = 0) 
    {
        echo "No adivinó la palabra.";
    }else
    {
        echo "Adivinó la palabra en ". $colPartidas[$numPartida-1]["intentos"];
    }
    echo "***********************************";
}

/**
 * Opcion 3 del menu: Mostrar partida
 * Solicita un numero de partida, verifica que la partida exista y sino vuelve a solicitarlo
 * llama a la funcion solicitarNumeroEntre()
 * llama a la funcion resumenPartida() para mostrar la partida en pantalla
 * Recibe el array con las partidas guardadas
 * no tiene retorno ;)
 * @param array $colecPartidas[] 
 */
function opcion3Menu($colecPartidas)
{
    /*
    int $cantPartidas   //cantidad de partidas guardadas
    int numPart         //Numero de la partida a mostrar
    */
    $cantPartidas = count($colecPartidas);
    echo "Ingrese un número de partida: ";
    $numPart = solicitarNumeroEntre(0, $cantPartidas+1);
    resumenPartida($numPart, $colecPartidas);
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
