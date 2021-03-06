<?php
require_once('Viaje.php');
echo"Bienvenido\n";
echo "Por favor ingrese los siguientes datos que se le mostraran a continuacion:\n";
echo"\n";
echo"Ingrese su codigo de Viaje:\n";
$codigoViaje=trim(fgets(STDIN));
echo"Ahora ingrese su destino:\n";
$destinoViaje=trim(fgets(STDIN));
echo"Y por ultimo ingrese la maxima cantidad de asientos:\n";
$asientosViaje=trim(fgets(STDIN));
$objViaje= new viaje($codigoViaje, $destinoViaje, $asientosViaje);


function menu(){
    return $echo = "MENU:\n
    ----------------------------------------------\n
    1. Ver el estado del viaje\n
    ----------------------------------------------\n
    2. Modificar el codigo del viaje\n
    ----------------------------------------------\n
    3. Modificar el destino del viaje\n
    ----------------------------------------------\n
    4. Modificar la cantidad de asientos del viaje\n
    ----------------------------------------------\n
    5. Modificar un pasajero \n
    ----------------------------------------------\n
    6. Agregar un pasajero \n
    ----------------------------------------------\n
    7. Salir del menu\n
    ----------------------------------------------\n";
}


do{
    echo menu();
    $opciones= trim(fgets(STDIN));
    switch($opciones) {
        case '1':
            echo $objViaje;
            $cierre = true;
            break;

        case '2':
            echo "El viaje tiene el codigo: {$objViaje->getcodViaje()}. \n";
            echo "Ingrese un nuevo codigo: \n";
            $codigo = trim(fgets(STDIN));
            $codigo = intval($codigo);
            $objViaje->setcodViaje($codigo);
            $cierre = true;
            break;
        case '3':
            echo "El destino del viaje actual es: {$objViaje->getdestinoViaje()} \n";
            echo "Ingrese un nuevo destino: \n";
            $destino = trim(fgets(STDIN));
            $objViaje->setdestinoViaje($destino);
            $cierre = true;
            break;
        case '4':
            echo "El viaje tiene {$objViaje->getcantPasajerosMax()} asientos\n";
            echo "Ingrese una nueva cantidad de asientos: \n";
            $cantAsientos = trim(fgets(STDIN));
            $cantAsientos = intval($cantAsientos);
            $objViaje->setcantPasajerosMax($cantAsientos);
            $cierre = true;
            break;
        case '5':
            echo "Ingrese los datos del pasajero a modificar: \n";
            $pasajero = obtenerDatos();
            echo "Ingrese los nuevos datos del pasajero: \n";
            $pasajero2 = obtenerDatos();
            if($objViaje->modificarPasajeros($pasajero, $pasajero2)){
                echo "Se han modificado los datos del pasajero.\n";
            }else{
                echo "No se ha encontrado el pasajero buscado para modificar.\n";
            }
            $cierre = true;
            break;
        case '6': 
            if($objViaje->lugarPasajeros()){
                echo "Ingrese los datos de un pasajero: \n";
                $pasajero= obtenerDatos();
                if($objViaje->agregarPasajeros($pasajero)){
                    echo "El pasajero ha sido agregado con exito.\n";
                }else{
                    echo "El pasajero ya esta en el viaje.\n";
                }
            }else{
                echo "Lo sentimos, pero ya no hay mas lugares en este viaje.\n";
            }   
            $cierre = true;
            break;
        case '7':
            $cierre = false;
            break;
        default:
            $cierre = false;
        break;
    }
} while($cierre);

function obtenerDatos(){
    echo "Nombre: \n";
    $nombre = trim(fgets(STDIN));
    echo "Apellido: \n";
    $apellido = trim(fgets(STDIN));
    echo "DNI: \n";
    $dni = intval(trim(fgets(STDIN)));
    $pasajero = ['nombre'=>$nombre, 'apellido'=>$apellido, 'DNI'=>$dni];
    return $pasajero;
}
