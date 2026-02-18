<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Tamanio;
use Illuminate\Support\Facades\DB;
use View;

class TamanioController extends Controller
{
    function tamanio()
    {
        $datos=array();
        $datos['lista']=Tamanio::all();
        return view('tamanio.listado',$datos);
    }

    function formulario($id=0)
    {
        $datos=array();
        if ($id==0){
            $datos['tamanio']= new Tamanio();
            $datos['operacion']='Agregar';
        }
        else{
            $datos['tamanio']=Tamanio::find($id);
            $datos['operacion']='Modificar';
        }


        //recupero la informacion del jugador a partir del id
        //$c=Jugador::find($id);
        return view('tamanio.formulario')->with($datos);
    }

    function guardar(Request $datos)
    {
        //Recoge todos los datos del formulario
        $contex=$datos->all();
        switch($datos['operacion']){
            case 'Agregar':
                $tamanio=new Tamanio();
                $tamanio->nombre=$datos['nombre'];
                $tamanio->save();
            break;
            case 'Modificar':
                $tamanio=Tamanio::find($datos['id']);
                $tamanio->nombre=$datos['nombre'];
                $tamanio->save();
            break;
            case 'Eliminar':
                $tamanio=Tamanio::find($datos['id']);
                $tamanio->delete();
            break;
        }

        return redirect()->route('tamanio');
       
    }
}