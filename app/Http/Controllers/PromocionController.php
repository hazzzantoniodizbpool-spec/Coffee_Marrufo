<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Promocion;
use Illuminate\Support\Facades\DB;
use View;

class PromocionController extends Controller
{
    function promocion()
    {
        $datos=array();
        $datos['lista']=Promocion::all();
        return view('promocion.listado',$datos);
    }

    function formulario($id=0)
    {
        $datos=array();
        if ($id==0){
            $datos['promocion']= new Promocion();
            $datos['operacion']='Agregar';
        }
        else{
            $datos['promocion']=Promocion::find($id);
            $datos['operacion']='Modificar';
        }


        //recupero la informacion del jugador a partir del id
        //$c=Jugador::find($id);
        return view('promocion.formulario')->with($datos);
    }

    function guardar(Request $datos)
    {
        //Recoge todos los datos del formulario
        $contex=$datos->all();
        switch($datos['operacion']){
            case 'Agregar':
                $promocion=new Promocion();
                $promocion->nombre=$datos['nombre'];
                $promocion->save();
            break;
            case 'Modificar':
                $promocion=Promocion::find($datos['id']);
                $promocion->nombre=$datos['nombre'];
                $promocion->save();
            break;
            case 'Eliminar':
                $promocion=Promocion::find($datos['id']);
                $promocion->delete();
            break;
        }

        return redirect()->route('promocion');
       
    }
}