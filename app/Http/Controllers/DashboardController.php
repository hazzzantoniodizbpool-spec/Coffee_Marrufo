<?php

namespace App\Http\Controllers;

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
        return view('Dashboard.index')->with($datos);
    }

    function total_ventas(){
        $servicio=new ServicioKPI();
        $objeto=new \stdClass();
        $info=$servicio->total_ventas($objeto);

        $objeto1=new \stdClass();
        $objeto1->tendencias=true;
        $info2=$servicio->total_ventas($objeto1);

        $resultado=new \stdClass();
        $resultado->tendencia=$info2;
        $resultado->total=$info[0]->total_ventas;

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


}