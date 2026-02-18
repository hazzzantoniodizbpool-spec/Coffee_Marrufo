<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\CategoriaExtra;
use Illuminate\Support\Facades\DB;
use View;

class CategoriaExtraController extends Controller
{
    function categoriaExtra()
    {
        $datos=array();
        $datos['lista']=CategoriaExtra::all();
        return view('CategoriaExtra.listado',$datos);
    }

    function formulario($id=0)
    {
        $datos=array();
        if ($id==0){
            $datos['categoriaextra']= new CategoriaExtra();
            $datos['operacion']='Agregar';
        }
        else{
            $datos['categoriaextra']=CategoriaExtra::find($id);
            $datos['operacion']='Modificar';
        }


        //recupero la informacion del jugador a partir del id
        //$c=Jugador::find($id);
        return view('CategoriaExtra.formulario')->with($datos);
    }

    function guardar(Request $datos)
    {
        //Recoge todos los datos del formulario
        $contex=$datos->all();
        switch($datos['operacion']){
            case 'Agregar':
                $categoriaextra=new CategoriaExtra();
                $categoriaextra->nombre=$datos['nombre'];
                $categoriaextra->save();
            break;
            case 'Modificar':
                $categoriaextra=CategoriaExtra::find($datos['id']);
                $categoriaextra->nombre=$datos['nombre'];
                $categoriaextra->save();
            break;
            case 'Eliminar':
                $categoriaextra=CategoriaExtra::find($datos['id']);
                $categoriaextra->delete();
            break;
        }

        return redirect()->route('categoriaExtra');
       
    }
}