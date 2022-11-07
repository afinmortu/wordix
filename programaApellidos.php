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
    $coleccionPartidas[1] = ["palabraWordix"=>"CASAS","jugador"=>"tito","intentos"=>5,"puntaje"=>10];
    $coleccionPartidas[2] = ["palabraWordix"=>"QUESO","jugador"=>"pepe","intentos"=>4,"puntaje"=>16];
    $coleccionPartidas[3] = ["palabraWordix"=>"TINTO","jugador"=>"atilio","intentos"=>3,"puntaje"=>20];
    $coleccionPartidas[4] = ["palabraWordix"=>"MUJER","jugador"=>"chino21","intentos"=>5,"puntaje"=>10];
    $coleccionPartidas[5] = ["palabraWordix"=>"GOTAS","jugador"=>"marx","intentos"=>2,"puntaje"=>25];
    $coleccionPartidas[6] = ["palabraWordix"=>"REINO","jugador"=>"chino21","intentos"=>0,"puntaje"=>0];
    $coleccionPartidas[7] = ["palabraWordix"=>"GANAR","jugador"=>"pinky","intentos"=>4,"puntaje"=>16];
    $coleccionPartidas[8] = ["palabraWordix"=>"MELON","jugador"=>"atilio","intentos"=>5,"puntaje"=>10];
    $coleccionPartidas[9] = ["palabraWordix"=>"VERDE","jugador"=>"atilio","intentos"=>2,"puntaje"=>25];
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

    echo "***********************************"."\n";
    echo "Partida Wordix ". $numPartida. ": palabra ". $colPartidas[$numPartida-1]["palabraWordix"]."\n";
    echo "Jugador: ". $colPartidas[$numPartida-1]["jugador"]."\n";
    echo "Puntaje: ". $colPartidas[$numPartida-1]["puntaje"]. " puntos."."\n";
    if ($colPartidas[$numPartida-1]["puntaje"] = 0) 
    {
        echo "No adivinó la palabra."."\n";
    }else
    {
        echo "Adivinó la palabra en ". $colPartidas[$numPartida-1]["intentos"]."\n";
    }
    echo "***********************************"."\n";
}
//************************************************************************************** */

/**
 * Muestra en pantalla un listado de los jugadores que realizaron partidas, asi
 * elegir un nombre de la lista para ver sus partidas
 * @param array $colDePartidas
 */
function listadoJugadores($colDePartidas)
{
    /*array string $listaJugadores[]
      int $i 
      array $partidas
      */  
    $listaJugadores = [];
    $i = 0;
    echo "       Lista de jugadores guardados: \n";
    foreach ($colDePartidas as $i => $partidas) 
    {
        echo "     ".$partidas["jugador"]."\n";
        //$listaJugadores[$i] = $partidas["jugador"];
    }
}
//************************************************************************************* */
//************************************************************************************* */
/**
 * Opcion 1 del menu: Jugar Wordix
 * Solicita al usuario un nombre de jugador y un numero de palabra para buscar en la lista
 * de palabras wordix, verifica que el jugador no repita la palabra.
 * luego de la partida guarda los datos estadisticos en la estructura partidas
 * @param array $partidasAnteriores
 * @param array $palabrasWordix
 * @return array
 */
function opcion1Menu($partidasAnteriores, $palabrasWordix)
{
    /*
    string $jugadorActual
    String $palabraActual
    int $nroPalabraActual
    int $cantPalabras
    array $estadistica[]
    boolean $palabraUsada
    int $indice
    */
    $palabraUsada = false;
    $cantPalabras = count($partidasAnteriores);
    echo "Ingrese jugador : ";
    $jugadorActual = trim(fgets(STDIN));
    //$jugadorActual = solicitarJugador();
    do
    {
        $indice = 0;
        if (!$palabraUsada)
        {
            echo "Ingrese un numero de palabra para jugar!: ";
        }else{    
            $palabraUsada = false;
            echo "La palabra ya la usaste jaJaja! ingresa otro numero: ";
        }
        $nroPalabraActual = solicitarNumeroEntre(1,$cantPalabras+1);
        $nroPalabraActual--;
        $palabraActual = $palabrasWordix[$nroPalabraActual];
        do
        {
            if(($partidasAnteriores[$indice]["jugador"] == $jugadorActual) && ($partidasAnteriores[$indice]["palabraWordix"] == $palabraActual))
               {
                    $palabraUsada = true;
               }
            $indice++;
        }while($palabraUsada || $indice<$cantPalabras);
    }while($palabraUsada);
    $estadistica = jugarWordix($palabraActual, $jugadorActual);
    array_push($partidasAnteriores, $estadistica);
    return $partidasAnteriores;
}
//*********************************************************************************************************
//*********************************************************************************************************
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
    $numPart = (solicitarNumeroEntre(0, $cantPartidas+1)) - 1; //resta 1 para no desbordar el array
    resumenPartida($numPart, $colecPartidas);
}

//***************************************************************************** */

/**
 * Opcion 5 del menu: Mostrar estadistica del jugador
 * Solicita un nombre de jugador y muestra en pantalla la estadistica de las jugadas
 * llama a la funcion estadisticaJugador() para mostrar la partida en pantalla
 * Recibe el array con las partidas guardadas
 * no tiene retorno ;)
 * @param array $coleccionDePartidas
 */
function opcion5Menu($coleccionDePartidas)
{
    /*
    boolean $esJugador
    int $i, $j
    int $cantPart
    int $porcentajeVictorias
    */
    $resumenJugador = [];
    $resumenJugador["jugador"] = "";
    $resumenJugador["partidas"] = 0;
    $resumenJugador["puntaje"] = 0;
    $resumenJugador["victorias"] = 0;
    $resumenJugador["intento1"] = 0;
    $resumenJugador["intento2"] = 0;
    $resumenJugador["intento3"] = 0;
    $resumenJugador["intento4"] = 0;
    $resumenJugador["intento5"] = 0;
    $resumenJugador["intento6"] = 0;
    $porcentajeVictorias = 0;
    $esJugador = false;
    $i = 0;
    $cantPart = count($coleccionDePartidas);
    echo "Ingrese el nombre del jugador: ";
    $resumenJugador["jugador"] = trim(fgets(STDIN));
    $resumenJugador["jugador"] = strtolower($resumenJugador["jugador"]);
    do
    {
        $i = 0;
        do
        {
            if ($resumenJugador["jugador"] == $coleccionDePartidas[$i]["jugador"])
            {
                $esJugador = true;
            }
            $i++;
        }while (!$esJugador && $i<$cantPart);
        if (!$esJugador)
        {
            echo "El jugador no existe, ingrese otro nombre: ";
            $resumenJugador["jugador"] = trim(fgets(STDIN));
            $resumenJugador["jugador"] = strtolower($resumenJugador["jugador"]);
        }
    }while (!$esJugador);
    for ($i=0; $i < $cantPart ; $i++) 
    { 
        if ($resumenJugador["jugador"] == $coleccionDePartidas[$i]["jugador"])
        {
            $resumenJugador["partidas"]++;
            $resumenJugador["puntaje"] = $resumenJugador["puntaje"] + $coleccionDePartidas[$i]["puntaje"];
            switch ($coleccionDePartidas[$i]["intentos"]) {
                case 1:
                    $resumenJugador["victorias"] ++;
                    $resumenJugador["intento1"]++;
                    break;
                case 2:
                    $resumenJugador["victorias"] ++;
                    $resumenJugador["intento2"]++;
                    break;
                case 3:
                    $resumenJugador["victorias"] ++;
                    $resumenJugador["intento3"]++;
                    break; 
                case 4:
                    $resumenJugador["victorias"] ++;
                    $resumenJugador["intento4"]++;
                    break;                
                case 5:
                    $resumenJugador["victorias"] ++;
                    $resumenJugador["intento5"]++;
                    break;
                case 6:
                    $resumenJugador["victorias"] ++;
                    $resumenJugador["intent6"]++;
                    break;           
            }
        }
    }
    //Calcular el porcentaje de victorias
    if ($resumenJugador["partidas"] == 0)
    {
        echo "No hay partidas";          //para no dividir por cero ;)
    }else
    {
        $porcentajeVictorias = ($resumenJugador["victorias"] * 100) / $resumenJugador["partidas"] ;
    }
    echo "**************************************************
    Jugador: ". $resumenJugador["jugador"]."
    Partidas: ".$resumenJugador["partidas"]."
    Puntaje Total: ". $resumenJugador["puntaje"]."
    Victorias: ". $resumenJugador["victorias"] ."
    Porcentaje Victorias: ". $porcentajeVictorias."
    Adivinadas:
          Intento 1: ". $resumenJugador["intento1"]."
          Intento 2: ". $resumenJugador["intento2"]."
          Intento 3: ". $resumenJugador["intento3"]."
          Intento 4: ". $resumenJugador["intento4"]."
          Intento 5: ". $resumenJugador["intento5"]."
          Intento 6: ". $resumenJugador["intento6"]."\n
    *********************************************************\n";
}

//***************************************************************** */
/**
 * Visualiza el menu de opciones en la pantalla, le solicita al usuario una opcion
 * valida, si la opcion no es valida vuelve a pedirla. Retorna el numero de la opcion
 * No tiene parametros formales
 * @return int
 */
function seleccionarOpcion()
{
    //int $opcionMenu

    echo "\n*****MENU DE OPCIONES*****\n
    1) Jugar al Wordix con una palabra elegida\n
    2) Jugar al Wordix con una palabra aleatoria\n
    3) Mostrar una partida\n
    4) Mostrar la primer partida ganadora\n
    5) Mostrar resumen de Jugador\n
    6) Mostrar listado de partidas ordenadas por jugador y por palabra\n
    7) Agregar una palabra de 5 letras a Wordix\n
    8) Salir\n
       Ingrese una opción del menú: ";
    $opcionMenu = solicitarNumeroEntre(1,8);
    return $opcionMenu;
}

/****************************************************************** */

function ingresarPalabra(): string
{
  //string $palabra;
  do {
    $palabra = trim(fgets(STDIN));
  } while (strlen($palabra) != 5); //Nos aseguramos de que tenga 5 letras
  return $palabra;
}

/****************************************************************** */

function agregarPalabra(array $coleccionDePalabras): array
{   //Agregamos la palabra a la coleccion
  array_push($coleccionDePalabras, strtoupper(ingresarPalabra()));
  return $coleccionDePalabras;
}
/****************************************************************** */

function solicitarJugador(): string
{
  do {
    echo "Ingrese el nombre del jugador";
    $nombre = trim(fgets(STDIN));
  } while (is_numeric($nombre[0])); //Si el primer caracter es numerico, lo pide de vuelta
  return strtolower($nombre); //lo retorna en minusculas
}

/****************************************************************** */


/* ... COMPLETAR ... */



/**************************************/
/*********** PROGRAMA PRINCIPAL *******/
/**************************************/

//Declaración de variables:
/*
   array $partidasGuardadas[]          array con la coleccion de partidas precargadas
   array $palabras[]                   array con las palabras wordix
   int $opcion                             menu de opciones
*/

//Inicialización de variables:
$partidasGuardadas = cargarPartidas();      //Carga el array con las partidas guardadas
$palabras = cargarColeccionPalabras();      //Carga el array con las palabras guardadas para jugar


//Proceso:

//$partida = jugarWordix("MELON", strtolower("MaJo"));
//print_r($partida);
//imprimirResultado($partida);


do{
$opcion = seleccionarOpcion();
    switch ($opcion) {
        case 1:
            //Opcion 1: Jugar wordix
            $partidasGuardadas = opcion1Menu($partidasGuardadas, $palabras);
            echo "\nPresione una tecla para ir al menu...";
            $opcion = trim(fgets(STDIN));
            break;
        case 2:
            //completar qué secuencia de pasos ejecutar si el usuario elige la opción 2
            echo "\nPresione una tecla para ir al menu...";
            $opcion = trim(fgets(STDIN));
            break;
        case 3:
            //Mostrar una partida, pide el numero de partida
            opcion3Menu($partidasGuardadas);
            echo "\nPresione una tecla para ir al menu...";
            $opcion = trim(fgets(STDIN));
            break;
        case 4:
            //completar qué secuencia de pasos ejecutar si el usuario elige la opción 3
            echo "\nPresione una tecla para ir al menu...";
            $opcion = trim(fgets(STDIN));
            break;
        case 5:
            //Mostrar Resumen de jugador, muestra una lista de jugadores para elegir uno
            listadoJugadores($partidasGuardadas);
            opcion5Menu($partidasGuardadas);
            echo "\nPresione una tecla para ir al menu...";
            $opcion = trim(fgets(STDIN));
            break;
        case 6:
            //completar qué secuencia de pasos ejecutar si el usuario elige la opción 3
            echo "\nPresione una tecla para ir al menu...";
            $opcion = trim(fgets(STDIN));
            break;
        case 7:
            //Se actualiza la coleccion de palabras con la palabra ingresada por el usuario
            $coleccionPalabras=agregarPalabra($coleccionPalabras);
            echo "\nPresione una tecla para ir al menu...";
            $opcion = trim(fgets(STDIN));
             break;
        case 8:
            //completar qué secuencia de pasos ejecutar si el usuario elige la opción 3
            echo "\nGracias por jugar wordix...";
            break; 
    }
} while ($opcion != 8);

