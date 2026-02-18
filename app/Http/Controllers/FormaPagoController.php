<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\FormaPago;
use Illuminate\Support\Facades\DB;
use View;

class FormaPagoController extends Controller
{
    function formaPago()
    {
        $datos=array();
        $datos['lista']=FormaPago::all();
        return view('formapago.listado',$datos);
    }

    function formulario($id=0)
    {
        $datos=array();
        if ($id==0){
            $datos['formapago']= new FormaPago();
            $datos['operacion']='Agregar';
        }
        else{
            $datos['formapago']=FormaPago::find($id);
            $datos['operacion']='Modificar';
        }


        //recupero la informacion del jugador a partir del id
        //$c=Jugador::find($id);
        return view('formapago.formulario')->with($datos);
    }

    function guardar(Request $datos)
    {
        //Recoge todos los datos del formulario
        $contex=$datos->all();
        switch($datos['operacion']){
            case 'Agregar':
                $formapago=new FormaPago();
                $formapago->nombre=$datos['nombre'];
                $formapago->save();
            break;
            case 'Modificar':
                $formapago=FormaPago::find($datos['id']);
                $formapago->nombre=$datos['nombre'];
                $formapago->save();
            break;
            case 'Eliminar':
                $formapago=FormaPago::find($datos['id']);
                $formapago->delete();
            break;
        }

        return redirect()->route('formapago');
       
    }
}