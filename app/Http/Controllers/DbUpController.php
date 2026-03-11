<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Usuario;
use App\Models\Edades;
use App\Models\Ocupacion;
use App\Models\Producto;
use App\Models\Extra;
use App\Servicio\ServicioOrden;
use Faker\Factory as Faker;

class DbUpController extends Controller
{
    var $generos = array('Hombre', 'Mujer', 'No aplica');
    var $canales = array('WEB', 'APP', 'KIOSKO', 'TAQUILLA');

    function hoy($formato = 'Y-m-d H:i:s') {
        date_default_timezone_set('America/Merida');
        return date($formato);
    }

    function clientes(){
        $faker = Faker::create();
        $edades = Edades::all();
        $ocupaciones = Ocupacion::all();
        
        for($i = 1; $i <= 100; $i++){
            $usuario = new Usuario();
            $usuario->idrol = 2;
            $usuario->password = bcrypt('123456'); 
            $usuario->email = $faker->email;
            $usuario->nombre = $faker->name;
            $usuario->save();

            $nombre = $faker->name;
            $apellido = $faker->lastName;

            $cliente = new Cliente();
            $cliente->idusuario = $usuario->id;
            $cliente->nombre = $nombre . ' ' . $apellido;
            $cliente->idedad = $edades->random()->id;
            $cliente->idocupacion = $ocupaciones->random()->id;
            $cliente->genero = $faker->randomElement($this->generos);
            $cliente->fecha_registro = $this->hoy();
            $cliente->save();
        }
    }

    function orden(){
        $faker = Faker::create();
        $servicio = new ServicioOrden();
        $clientes = Cliente::all();
        $productos = Producto::all();

        for($i = 1; $i <= 100; $i++){
            $objeto = new \stdClass();
            $objeto->idusuario = 0;
            $objeto->idcliente = $clientes->random()->id;
            $objeto->canal = $faker->randomElement($this->canales);
            $objeto->idcanal = 0;
            $objeto->fecha = $faker->dateTimeBetween('-3 months', 'now');
        
            $num_productos = $faker->numberBetween(1, count($productos));
            $lista_productos = $productos->random($num_productos);
            $objeto->productos = array();
            
            foreach($lista_productos as $p){
                $objeto->productos[] = [
                    "id" => $p->id,
                    "cantidad" => 1,
                    "precio" => $p->precio,
                    "extras" => array()
                ];
            }
            $servicio->registrar($objeto);
        }
    }
}