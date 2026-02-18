<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Usuario;
use App\Models\Edades;
use App\Models\Ocupacion;
use App\Models\Producto;
use App\Servicio\ServicioOrden;
use Faker\Factory as Faker;

class DbUpController extends Controller
{
    var $generos = array('Hombre', 'Mujer', 'No aplica');
    var $canales = array('WEB', 'APP', 'KIOSKO', 'TAQUILLA');

    //clientes 
    function clientes(){
        $faker = Faker::create();
        $edades = Edades::all();
        $ocupaciones = Ocupacion::all();
        
        for($i = 1; $i <= 100; $i++){
            //usuarios
            $usuario = new Usuario();
            $usuario->idrol = 2;
            $usuario->password = bcrypt('123456'); 
            $usuario->email = $faker->email;
            $usuario->nombre = $faker->name;
            $usuario->save(); // ← MOVER ESTO ANTES DE USAR EL ID
            //usuarios

            //clientes
            $nombre = $faker->name;
            $apellido = $faker->lastName;

            $cliente = new Cliente();
            $cliente->idusuario = $usuario->id; // ← AHORA $usuario->id EXISTE
            $cliente->nombre = $nombre . ' ' . $apellido;
            $cliente->idedad = $edades->random()->id;
            $cliente->idocupacion = $ocupaciones->random()->id;
            $cliente->genero = $faker->randomElement($this->generos);
            $cliente->save();
            //clientes
        }
    }
    //clientes

    //ordenes
    function orden(){
        $faker = Faker::create();
       $servicio=new ServicioOrden();
       $clientes = Cliente::all();
       $productos = Producto::all();

       for($i = 1;$i <= 100; $i++){

            $obejto=new \stdClass();
            $obejto->idusuario=0;
            $obejto->idcliente=$clientes->random()->id;
            $obejto->canal=$faker->randomElement($this->canales);
            $obejto->idcanal=0;
            $obejto->fecha=$faker->dateTimeBetween($startDate = '-1 year', $endDate = 'now');
        
             $num_productos=$faker->numberBetween(1,count($productos));
             $lista_productos=$productos->random($num_productos);
             $obejto->productos=array();
             foreach($lista_productos as $p){
                 $obejto->productos[]=["id"=>$p->id,
                                             "cantidad"=>1,
                                             "precio"=>$p->precio,
                                             "extras"=>array()];
             }
             $servicio->registrar($obejto);

       }
    }
    //ordenes

}