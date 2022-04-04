<?php
class viaje
{
    //atributos
    private $codViaje;
    private $destinoViaje;
    private $cantPasajerosMax;
    private $arrayPasajeros = [];

    //Construct
    public function __construct($codigo, $destino, $cantMaxima)
    {
        $this->codViaje = $codigo;
        $this->destinoViaje = $destino;
        $this->cantPasajerosMax = $cantMaxima;
    }

    //Get y set

    //codViaje
    public function getcodViaje()
    {
        return $this->codViaje;
    }
    public function setcodViaje($codViaje)
    {
        $this->codViaje = $codViaje;
    }
    //destinoViaje
    public function getdestinoViaje()
    {
        return $this->destinoViaje;
    }
    public function setdestinoViaje($destinoViaje)
    {
        $this->destinoViaje = $destinoViaje;
    }
    //cantPasajerosMax
    public function getcantPasajerosMax()
    {
        return $this->cantPasajerosMax;
    }
    public function setcantPasajerosMax($cantPasajerosMax)
    {
        $this->cantPasajerosMax = $cantPasajerosMax;
    }
    //arrayPasajeros
    public function getarrayPasajeros()
    {
        return $this->arrayPasajeros;
    }
    public function setarrayPasajeros($arrayPasajeros)
    {
        $this->arrayPasajeros = $arrayPasajeros;
    }

    //funcion que agregar pasajeros
    /**
     * @param $pasajero = ['DNI'=> ;'nombre'=> ;'apellido'=> ;]
     * @return string
     */
    public function agregarPasajeros($pasajero)
    {
        $arraySecundario = $this->getarrayPasajeros();
        $booleano = false;
        if (in_array($pasajero, $this->getarrayPasajeros())) {
            $booleano = false;
        } else {
            array_push($arraySecundario, $pasajero);
            $booleano = true;
        }
        return $booleano;
    }

    //funcion que modifica los datos de los pasajeros

    public function modificarPasajeros($pasajero, $pasajeroDos)
    {
        $arrayModificable = $this->getarrayPasajeros();
        $booleano = false;
        if (in_array($pasajero, $arrayModificable)) {
            $key = array_search($pasajero, $arrayModificable);
            $arrayModificable[$key] = $pasajeroDos;
            $this->setarrayPasajeros($arrayModificable);
            $booleano = true;
        }
        return $booleano;
    }
    public function lugarPasajeros()
    {
        $booleano = true;
        if ($this->getcantPasajerosMax() <= (count($this->getarrayPasajeros()))) {
            $booleano = false;
        }
        return $booleano;
    }
    /** funcion privada que muestra los datos de los pasajeros
     * @param void
     * @return string
     */
    private function datosPasajerosStr()
    {
        $pasajeroStr = "";
        foreach ($this->getarrayPasajeros() as $key => $value) {
            $nombre = $value['nombre'];
            $apellido = $value['apellido'];
            $dni = $value['DNI'];
            $pasajeroStr = "
            Nombre: $nombre\n
            Apellido: $apellido\n
            DNI: $dni\n";
        }
        return $pasajeroStr;
    }

    //funcion que muestra todos los datos pedidos, incluido el de los pasajeros
    public function __toString()
    {
        $pasajero = $this->datosPasajerosStr();
        $arrayPasajeros = $this->getArrayPasajeros();
        $cantidad = count($arrayPasajeros);
        $varStr = "
        Viaje: {$this->getcodViaje()} -\n
        Destino: {$this->getdestinoViaje()} -\n
        Cantidad de Asientos: {$this->getcantPasajerosMax()} -\n
        Asientos ocupados por pasajeros: $cantidad -\n 
        Datos de Pasajeros: \n 
        $pasajero";
        return $varStr;
    }
}
