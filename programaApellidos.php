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
        "LOCOS", "GANAR", "MONOS", "REINO", "FAROL",
        "LETRA", "LOCRO", "MATIZ", "SALTO", "TRAPO"
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
    array $coleccion
    */
    $coleccion = [];
    $pa1 = ["palabraWordix" => "SUECO", "jugador" => "kleiton", "intentos" => 0, "puntaje" => 0];
    $pa2 = ["palabraWordix" => "YUYOS", "jugador" => "briba", "intentos" => 0, "puntaje" => 0];
    $pa3 = ["palabraWordix" => "HUEVO", "jugador" => "zrack", "intentos" => 3, "puntaje" => 9];
    $pa4 = ["palabraWordix" => "TINTO", "jugador" => "cabrito", "intentos" => 4, "puntaje" => 8];
    $pa5 = ["palabraWordix" => "RASGO", "jugador" => "briba", "intentos" => 0, "puntaje" => 0];
    $pa6 = ["palabraWordix" => "VERDE", "jugador" => "cabrito", "intentos" => 5, "puntaje" => 7];
    $pa7 = ["palabraWordix" => "CASAS", "jugador" => "kleiton", "intentos" => 5, "puntaje" => 7];
    $pa8 = ["palabraWordix" => "GOTAS", "jugador" => "kleiton", "intentos" => 0, "puntaje" => 0];
    $pa9 = ["palabraWordix" => "ZORRO", "jugador" => "zrack", "intentos" => 4, "puntaje" => 8];
    $pa10 = ["palabraWordix" => "GOTAS", "jugador" => "cabrito", "intentos" => 0, "puntaje" => 0];
    $pa11 = ["palabraWordix" => "FUEGO", "jugador" => "cabrito", "intentos" => 2, "puntaje" => 10];
    $pa12 = ["palabraWordix" => "TINTO", "jugador" => "briba", "intentos" => 0, "puntaje" => 0];

array_push($coleccion, $pa1, $pa2, $pa3, $pa4, $pa5, $pa6, $pa7, $pa8, $pa9, $pa10, $pa11, $pa12);
return $coleccion;
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
    echo "Partida Wordix ". $numPartida. "\n";
    echo "Palabra: ". $colPartidas[$numPartida-1]["palabraWordix"]."\n";
    echo "Jugador: ". $colPartidas[$numPartida-1]["jugador"]."\n";
    echo "Puntaje: ". $colPartidas[$numPartida-1]["puntaje"]. " puntos."."\n";
    if ($colPartidas[$numPartida-1]["puntaje"] == 0) 
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

/**
 * Opcion 1 y 2 del menu: Jugar Wordix
 * Solicita al usuario un nombre de jugador 
 * Si es llamado con $opcion=true, solicita al usuario un numero de palabra para buscar en la lista
 * Si es llamado con $opcion=false, se genera un numero de palabra aleatorio entre 1 y la cantidad de palabras de la lista
 * Se verifica que el jugador no repita la palabra.
 * retorna las estadisticas de la partida ejecutada
 * @param array $partidasAnteriores
 * @param boolean $opcion
 * @param array $palabrasWordix
 * @return array
 */
function opcion1y2Menu($partidasAnteriores, $palabrasWordix, $opcion)
{
  /*
    string $jugadorActual
    String $palabraActual
    int $nroPalabraActual
    int $limite
    boolean $palabraUsada
    int $indice
    */
  $palabraUsada = false;
  $limite = count($partidasAnteriores);
  $cantPalabras = count($palabrasWordix);
  $jugadorActual = solicitarJugador();
  $indice = 0;
  do 
  {
    if ($opcion) //Si el modulo fue instanciado con $opcion=true, entonces el jugador elige la palabra...
    {
        echo "Ingrese un numero de palabra para jugar!!... 0 salir al menu ";
        $nroPalabraActual = solicitarNumeroEntre(1, $cantPalabras);
        if ($nroPalabraActual == 0){return;}
    } else 
    {   //Si el modulo fue instanciado con $opcion=false, entonces nroPalabra es un numero entre 0 y la cantidad de palabras totales...
        $nroPalabraActual = rand(1, $cantPalabras);
    }
    //Una vez almacenado el valor del nroPalabra, se le asigna esta a la variable string $palabraActual
    $palabraActual = $palabrasWordix[$nroPalabraActual - 1];

    do 
    { //Buscamos si el jugador ya jugo con la palabra elegida, recorriendo el arreglo hasta que encuentre la palabra usada, si no la encontro, $palabraUsada se mantiene false.
        if (($partidasAnteriores[$indice]["jugador"] == $jugadorActual) && ($partidasAnteriores[$indice]["palabraWordix"] == $palabraActual)) 
        {
            echo $partidasAnteriores[$indice]["jugador"];
            echo "  ya jugaste esta palabra. Elegi otra. \n";
            $palabraUsada = true;
        } else 
        {
            $palabraUsada = false;
            $indice++;
        }
    } while (!$palabraUsada && $indice < $limite-1); //El bucle do se ejecutara siempre que la palabra elegida no haya sido encontrada y mientras que $indice sea menor a $limite
  } while ($palabraUsada); //El bucle do se ejecutara siempre que la palabra elegida haya sido usada

  return jugarWordix($palabraActual, $jugadorActual);
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
    $numPart = (solicitarNumeroEntre(1, $cantPartidas)) ;
    if ($numPart == 0){return;}
    resumenPartida($numPart, $colecPartidas);
}

/****************************************************************************** */
/****************************************************************************** */
/**
 * Opcion 4 del menu: mostrar la primera partida ganadora de un jugador
 * Solicita un nombre de jugador 
* @param array $coleccionDePartidas
 */
function opcion4Menu($coleccionDePartidas)
{
  /*
    string $jugador
    Boolean $esJugador
    int $i
    int $cantPart
  */
  $esJugador = false;
  $i = 0;
  $cantPart = count($coleccionDePartidas);
  $jugador = solicitarJugador();
  //Primero se verifica si el jugador ingresado existe en la estructura de jugadas
  do
  {
      $i = 0;
      do
      {
        if (($jugador == $coleccionDePartidas[$i]["jugador"]) && ($coleccionDePartidas[$i]["puntaje"] != 0))
        {
                $esJugador = true;
        }
          $i++;
      }while (!$esJugador && $i<$cantPart);
      if (!$esJugador)
      {
          echo "El jugador no existe o todavia no gano...Ingresa m para volver al menu... \n";
          $jugador = solicitarJugador();
          if ($jugador == "m"){return;}
      }
  }while (!$esJugador);
  //El jugador existe en la estructura de partidas
  //la variable indice $i guarda el numero de la partida
  //caso de no existir partida? o jugador?
  $resumenJugador["jugador"] = $jugador;
  resumenPartida($i, $coleccionDePartidas);
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
    $resumenJugador["jugador"] = solicitarJugador();
    //Primero se verifica si el jugador ingresado existe en la estructura de jugadas
    do
    {
        for ($i=0; $i < $cantPart ; $i++) 
        { 
            if ($resumenJugador["jugador"] == $coleccionDePartidas[$i]["jugador"])
            {
                $esJugador = true;
                $resumenJugador["partidas"]++;
                $resumenJugador["puntaje"] = $resumenJugador["puntaje"] + $coleccionDePartidas[$i]["puntaje"];
                switch ($coleccionDePartidas[$i]["intentos"]) 
                {
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
                    $resumenJugador["intento6"]++;
                    break;           
                }
            }
        }
        if (!$esJugador)
        {
            echo "El jugador no existe...Ingresa m para volver al menu... \n";
            $resumenJugador["jugador"] = solicitarJugador();
            if ($resumenJugador["jugador"] == "m"){return;}
        }    
    }while (!$esJugador);
    
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
//******************************************************************
//******************************************************************
/**
 * Opcion 6 del menu: ordena las partidas por jugador y por palabra
 * @param array $coleccionDePartidas
 */
function opcion6Menu($coleccionDePartidas)
{
    /*
        array copiaDePartidas[]
        int $indice
        int $valor
    */

    uasort ( $coleccionDePartidas , function ($a, $b) {return strcmp($a["palabraWordix"],$b["palabraWordix"]); });
    uasort ( $coleccionDePartidas , function ($a, $b) {return strcmp($a["jugador"],$b["jugador"]);});
    echo "\nPartidas ordenadas por Jugador y luego por palabra: \n
Jugador          Palabra            Intentos     Puntaje\n";

        foreach ($coleccionDePartidas as $indice => $valor) 
        {
            echo $coleccionDePartidas[$indice]["jugador"]."\t\t   ";
            echo $coleccionDePartidas[$indice]["palabraWordix"]."\t         ";
            echo $coleccionDePartidas[$indice]["intentos"]."\t    ";
            echo $coleccionDePartidas[$indice]["puntaje"]."\n";
        } 
}


//******************************************************************
//****************************************************************** 
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
    8) Salir\n";
    escribirVerde("    Ingrese una opción del menú: ");
    $opcionMenu = solicitarNumeroEntre(1,8);
    return $opcionMenu;
}


/**
* Dada la coleccion de palabras, la funcion pide y agrega una palabra al array $palabras
* y retorna la palabra en mayusculas
* @param array $coleccionPalabras
* @return array
*/

function agregarPalabra($coleccionPalabras)
{
  /*string $palabra;
  int $indice=0;
  boolean $palabraExiste=true;
  int $cantPalabras;*/
  $indice = 0;
  $palabraExiste = false;
  $cantPalabras = count($coleccionPalabras);
  $palabra = leerPalabra5letras();
  do 
  {
    if ($coleccionPalabras[$indice] == $palabra) { //Chequeamos que la palabra no este en la coleccion de palabras original
      $palabraExiste = true;
    } else {
      $palabraExiste = false;
      $indice++;
    }
  } while (!$palabraExiste && $indice > $cantPalabras);
  //Retornamos la palabra en mayusculas
  if ($palabraExiste)
  {
    array_push($coleccionPalabras, $palabra); 
    echo "Se agregó una palabra a la lista\n".$palabra;
  }else{
    echo "La palabra ya existe en la lista...\n".$palabra;
  }
  return $coleccionPalabras;
}
/****************************************************************** */
/**
* Esta función solicita al usuario el nombre de un jugador y retorna el nombre en minúsculas. La función se asegura de
* que el nombre del jugador no comience con un número 
* No tiene parametros formales
* @return string
*/
function solicitarJugador(): string
{
  do 
  {
    echo "Ingrese el nombre del jugador:  ";
    $nombre = trim(fgets(STDIN));

  } while ($nombre == "" || !ctype_alpha($nombre[0])); //Si el primer caracter es numerico, lo pide de vuelta
  return strtolower($nombre); //lo retorna en minusculas
}

/****************************************************************** */


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
/*El ciclo do..while repite el menu, al elegir una opcion, esta se ejecuta y luego vuelve al menu
para seleccionar otra opcion. La opcion 8 (la ultima) rompe el ciclo while
 */

do{
$opcion = seleccionarOpcion();
    switch ($opcion) {
        case 1:
            //Opcion 1: Jugar wordix
            //Se ejecuta la funcion opcion1y2 con la entrada true para que el jugador eliga la palabra y el retorno de esta, se agrega a $partidasGuardadas.
            array_push($partidasGuardadas, opcion1y2Menu($partidasGuardadas, $palabras, true));
            echo "\nPresione una tecla para ir al menu...";
            $opcion = trim(fgets(STDIN));
            break;
        case 2:
            //Se ejecuta la funcion opcion1y2 con la entrada false para que el numero de partida sea aleatorio y el retorno de esta, se agrega a $partidasGuardadas.
            array_push($partidasGuardadas, opcion1y2Menu($partidasGuardadas, $palabras, false));
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
            //Mostrar la primera partida ganada por un jugador
            listadoJugadores($partidasGuardadas);
            opcion4Menu($partidasGuardadas);
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
            //Muestra las partidas ordenadas por jugador y por palabra
            opcion6Menu($partidasGuardadas);
            echo "\nPresione una tecla para ir al menu...";
            $opcion = trim(fgets(STDIN));
            break;
        case 7:
            //Agregamos una nueva palabra a la coleccion.
            $palabras = agregarPalabra($palabras); 
            echo "\nPresione una tecla para ir al menu...";
            $opcion = trim(fgets(STDIN));
             break;
        case 8:
            //completar qué secuencia de pasos ejecutar si el usuario elige la opción 3
            echo "\nGracias por jugar wordix...\n";
            break; 
        default:
            //Opcion si no se reconoce la opcion :)
            escribirRojo("Ingrese un numero entero entre 1 y 8");    
    }
} while ($opcion != 8);

