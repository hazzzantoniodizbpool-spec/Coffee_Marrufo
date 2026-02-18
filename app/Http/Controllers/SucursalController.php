<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Sucursal;
use Illuminate\Support\Facades\DB;
use View;

class SucursalController extends Controller
{
    function sucursal()
    {
        $datos=array();
        $datos['lista']=Sucursal::all();
        return view('sucursal.listado',$datos);
    }

    function formulario($id=0)
    {
        $datos=array();
        if ($id==0){
            $datos['sucursal']= new Sucursal();
            $datos['operacion']='Agregar';
        }
        else{
            $datos['sucursal']=Sucursal::find($id);
            $datos['operacion']='Modificar';
        }


        //recupero la informacion del jugador a partir del id
        //$c=Jugador::find($id);
        return view('sucursal  .formulario')->with($datos);
    }

    function guardar(Request $datos)
    {
        //Recoge todos los datos del formulario
        $contex=$datos->all();
        switch($datos['operacion']){
            case 'Agregar':
                $sucursal=new Sucursal();
                $sucursal->nombre=$datos['nombre'];
                $sucursal->save();
            break;
            case 'Modificar':
                $sucursal=Sucursal::find($datos['id']);
                $sucursal->nombre=$datos['nombre'];
                $sucursal->save();
            break;
            case 'Eliminar':
                $sucursal=Sucursal::find($datos['id']);
                $sucursal->delete();
            break;
        }

        return redirect()->route('sucursal');
       
    }
}