<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Categoria;
use Illuminate\Support\Facades\DB;
use View;

class CategoriaController extends Controller
{
    function categoria()
    {
        $datos=array();
        $datos['lista']=Categoria::all();
        return view('Categorias.listado',$datos);
    }

    function formulario($id=0)
    {
        $datos=array();
        if ($id==0){
            $datos['categoria']= new Categoria();
            $datos['operacion']='Agregar';
        }
        else{
            $datos['categoria']=Categoria::find($id);
            $datos['operacion']='Modificar';
        }


        //recupero la informacion del jugador a partir del id
        //$c=Jugador::find($id);
        return view('Categoria.formulario')->with($datos);
    }

    function guardar(Request $datos)
    {
        //Recoge todos los datos del formulario
        $contex=$datos->all();
        switch($datos['operacion']){
            case 'Agregar':
                $categoria=new Categoria();
                $categoria->nombre=$datos['nombre'];
                $categoria->save();
            break;
            case 'Modificar':
                $categoria=Categoria::find($datos['id']);
                $categoria->nombre=$datos['nombre'];
                $categoria->save();
            break;
            case 'Eliminar':
                $categoria=Categoria::find($datos['id']);
                $categoria->delete();
            break;
        }

        return redirect()->route('categoria');
       
    }
}