<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Extra;
use Illuminate\Support\Facades\DB;
use View;

class ExtraController extends Controller
{
    function extra()
    {
        $datos=array();
        $datos['lista']=Extra::all();
        return view('extra.listado',$datos);
    }

    function formulario($id=0)
    {
        $datos=array();
        if ($id==0){
            $datos['extra']= new Extra();
            $datos['operacion']='Agregar';
        }
        else{
            $datos['extra']=Extra::find($id);
            $datos['operacion']='Modificar';
        }


        //recupero la informacion del jugador a partir del id
        //$c=Jugador::find($id);
        return view('extra.formulario')->with($datos);
    }

    function guardar(Request $datos)
    {
        //Recoge todos los datos del formulario
        $contex=$datos->all();
        switch($datos['operacion']){
            case 'Agregar':
                $extra=new Extra();
                $extra->nombre=$datos['nombre'];
                $extra->save();
            break;
            case 'Modificar':
                $extra=Extra::find($datos['id']);
                $extra->nombre=$datos['nombre'];
                $extra->save();
            break;
            case 'Eliminar':
                $extra=Extra::find($datos['id']);
                $extra->delete();
            break;
        }

        return redirect()->route('extra');
       
    }
}