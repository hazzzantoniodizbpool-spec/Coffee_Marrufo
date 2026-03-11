<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Usuario;
use App\Models\Edades;
use App\Models\Ocupacion;
use App\Models\Producto;
use App\Servicio\ServicioKPI;
use Faker\Factory as Faker;

class DashboardController extends Controller
{
    function index(){
        $datos=array();
        $datos['productos']=Producto::all();
        $datos['generos']=array('Hombre', 'Mujer', 'No aplica');
        $datos['edades']=Edades::all();
        $datos['ocupaciones']=Ocupacion::all();

        return view('Dashboard.index')->with($datos);
    }

    function total_ventas(Request $r){
        $context=$r->all();
        $servicio=new ServicioKPI();
        //dd($context);
        $objeto=new \stdClass();
        if(isset($context['idproducto']))
            $objeto->idproducto=$context['idproducto'];
        $info=$servicio->total_ventas($objeto);

        $objeto1=new \stdClass();
        $objeto1->tendencias=true;
        if(isset($context['idproducto']))
            $objeto1->idproducto=$context['idproducto'];
        $info2=$servicio->total_ventas($objeto1);

        $resultado=new \stdClass();
        $resultado->tendencia=$info2;
        //$resultado->total=$info[0]->total_ventas;
        $resultado->total = !empty($info) ? $info[0]->total_ventas : 0; 


        return response()->json($resultado);
    }

    function total_ventas_canal(){
        $servicio=new ServicioKPI();
        $objeto=new \stdClass();
        $info=$servicio->tendencias_canal($objeto);

        $objeto1=new \stdClass();
        $objeto1->tendencias=true;
        $info2=$servicio->tendencias_canal($objeto1);
        $resultado=new \stdClass();
        $resultado->tendencia=$info2;
        $resultado->canales=$info;

        return response()->json($resultado);

    }

    function total_ventas_producto(){
        $servicio=new ServicioKPI();
        $objeto=new \stdClass();
        $info=$servicio->ventas_productos($objeto);
        $resultado=new \stdClass();
        $resultado->top=$info[0];
        $resultado->bottom=$info[count($info)-1];
        $resultado->productos=$info;

        $objeto1=new \stdClass();
        $objeto1->tendencias=true;
        $objeto1->idproducto=3;
        $info2=$servicio->ventas_productos($objeto1);
        $resultado->tendencias=$info2;

       
        return response()->json($resultado);
    }

    function total_ventas_categoria(Request $r){
        $context=$r->all();
        $servicio=new ServicioKPI();
        $objeto=new \stdClass();
        if(isset($context['genero']))
            $objeto->genero=$context['genero'];
        $resultado=new \stdClass();
        $info=$servicio->total_categorias($objeto);
        $resultado->categorias=$info;
        return response()->json($resultado);
    }

    function demografico_genero(Request $r){
        $context=$r->all();
        $servicio=new ServicioKPI();
        $objeto=new \stdClass();
        if(isset($context['idedad']))
            $objeto->idedad=$context['idedad'];
        if(isset($context['idocupacion']))
            $objeto->idocupacion=$context['idocupacion'];
        $resultado=new \stdClass();
        $resultado=$servicio->demografico_genero($objeto);
        return response()->json($resultado);
    }

    // Agregar este método después de demografico_genero
function demografico_edades(Request $r){
    $context=$r->all();
    $servicio=new ServicioKPI();
    $objeto=new \stdClass();
    if(isset($context['genero']))
        $objeto->genero=$context['genero'];
    if(isset($context['idocupacion']))
        $objeto->idocupacion=$context['idocupacion'];
    $resultado=new \stdClass();
    $resultado=$servicio->demografico_edades($objeto);
    return response()->json($resultado);
}

}