<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Orden;
use Illuminate\Support\Facades\DB;
use View;

class OrdenController extends Controller
{
    function orden()
    {
        $datos=array();
        $datos['lista']=Orden::all();
        return view('orden.listado',$datos);
    }

    function formulario($id=0)
    {
        $datos=array();
        if ($id==0){
            $datos['orden']= new Orden();
            $datos['operacion']='Agregar';
        }
        else{
            $datos['orden']=Orden::find($id);
            $datos['operacion']='Modificar';
        }


        //recupero la informacion del jugador a partir del id
        //$c=Jugador::find($id);
        return view('orden.formulario')->with($datos);
    }

    function guardar(Request $datos)
    {
        //Recoge todos los datos del formulario
        $contex=$datos->all();
        switch($datos['operacion']){
            case 'Agregar':
                $orden=new Orden();
                $orden->nombre=$datos['nombre'];
                $orden->save();
            break;
            case 'Modificar':
                $orden=Orden::find($datos['id']);
                $orden->nombre=$datos['nombre'];
                $orden->save();
            break;
            case 'Eliminar':
                $orden=Orden::find($datos['id']);
                $orden->delete();
            break;
        }

        return redirect()->route('orden');
       
    }
}