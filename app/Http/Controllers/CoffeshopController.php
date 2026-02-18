<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Producto;
use App\Models\Tamanio;
use App\Models\Extra;
use App\Models\CategoriaExtra;
use App\Servicio\ServicioOrden;


class CoffeshopController extends Controller{

        function venta(){
            $datos=array();
            // $c1=new \stdClass();
            // $c1->id=1;
            // $c1->nombre="Espresso Drinks";
            // $c2=new \stdClass();
            // $c2->id=2;
            // $c2->nombre="Brewed Coffe";
            // $c3=new \stdClass();
            // $c3->id=3;
            // $c3->nombre="Teas";
            // $datos['categorias']=array();
            // $datos['categorias'][]=$c1;
            // $datos['categorias'][]=$c2;
            // $datos['categorias'][]=$c3;
            $datos['categorias']=Categoria::all();
            $datos['extra']=Extra::all();
            $datos['categoria_extras']=CategoriaExtra::all();

            return view('venta')->with($datos);
        }

        function productos(){
            // $productos=array();

            // $p1=new \stdClass();
            // $p1->id=1;
            // $p1->nombre='Lattee';
            // $p1->precio='70';
            // $p1->descripcion='Espresso with steamed milk and a thin layer of foam. Customize';
            // $p1->categoria='1';
            // $p1->tamanio='1';
            // $p1->foto='';
            // $p2=new \stdClass();
            // $p2->id=2;
            // $p2->nombre='Cappuccino ';
            // $p2->precio='40';
            // $p2->descripcion='Espresso with steamed milk and a thin layer of foam. Customize';
            // $p2->categoria='2';
            // $p2->tamanio='2';
            // $p2->foto='';

            // $p3=new \stdClass();
            // $p3->id=3;
            // $p3->nombre='Cappuccino ';
            // $p3->precio='40';
            // $p3->descripcion='Espresso with steamed milk and a thin layer of foam. Customize';
            // $p3->categoria='3';
            // $p3->tamanio='3';
            // $p3->foto='';

            // $productos[]=$p1;
            // $productos[]=$p2;
            // $productos[]=$p3;

            $productos=Producto::all();

            //Le digo a Laravel que me devuelva en formato JSON
            return response()->json($productos); 

        }

        function categorias(){
            $categorias=array();

            $c1=new \stdClass();
            $c1->id=1;
            $c1->nombre="Espresso Drinks";

            $c2=new \stdClass();
            $c2->id=2;
            $c2->nombre="Brewed Coffe";

            $c3=new \stdClass();
            $c3->id=3;
            $c3->nombre="Teas";

            $categorias[]=$c1;
            $categorias[]=$c2;
            $categorias[]=$c3;

           //Le digo a Laravel que me devuelva en formato JSON
            return response()->json($categorias); 

        }

         function tamanios(){
        //     $tamanios=array();

        //     $c1=new \stdClass();
        //     $c1->id=1;
        //     $c1->nombre="Mediano";

        //     $c2=new \stdClass();
        //     $c2->id=2;
        //     $c2->nombre="Large";

        //     $c3=new \stdClass();
        //     $c3->id=3;
        //     $c3->nombre="Venti";

        //     $tamanios[]=$c1;
        //     $tamanios[]=$c2;
        //     $tamanios[]=$c3;

            $tamanios=Tamanio::all();
            //Le digo a Laravel que me devuelva en formato JSON
            return response()->json($tamanios ); 

        }

        function guardar_orden(Request $r){
            $context=$r->all();
            
            $s=new ServicioOrden();

            $x=new \StdClass();
            $x->idcliente=1;
            $x->idusuario=1;
            $x->productos= $context;
            $s->registrar($x);
            
            return response()->json($context);
        }
    }   
?>