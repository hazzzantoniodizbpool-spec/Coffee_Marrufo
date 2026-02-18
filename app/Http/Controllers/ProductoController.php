<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Producto;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\DB;
use View;

class ProductoController extends Controller
{
    function producto()
    {
        $datos=array();
        $datos['lista']=Producto::all();
        return view('producto.listado',$datos);
    }

     function formulario($id=0)
    {
        $datos=array();
        if ($id==0){
            $datos['producto']= new Producto();
            $datos['operacion']='Agregar';
        }
        else{
            $datos['producto']=Producto::find($id);
            $datos['operacion']='Modificar';
        }


        //recupero la informacion del jugador a partir del id
        //$c=Jugador::find($id);
        return view('producto.formulario')->with($datos);
    }

    function guardar(Request $datos)
    {
        //Recoge todos los datos del formulario
        //leo el paquete de texto
        $contex=$datos->all();
        $archivo=$datos->file('foto');
        switch($datos['operacion']){
            case 'Agregar':
                $producto=new Producto();
                $producto->nombre=$datos['nombre'];
                $producto->precio=$datos['precio'];
                $producto->categoria=$datos['categoria'];
                $producto->foto='';
                $producto->descripcion=$datos['descripcion'];
                $producto->save();
                //subirlo al filesystem
                if ($datos->hasFile('foto')){
                    $archivo=$datos->file('foto');
                    $nombre_archivo='foto-'.$producto->id.'.'.$archivo->getClientOriginalExtension();
                    $archivo_subido=$archivo->storeAs('foto/producto', $nombre_archivo,'public');
                    $producto->foto=$nombre_archivo;
                    $producto->save();
                }
            break;
            case 'Modificar':
                $producto=Producto::find($datos['id']);
                $producto->nombre=$datos['nombre'];
                $producto->precio=$datos['precio'];
                $producto->categoria=$datos['categoria'];
                $producto->descripcion=$datos['descripcion'];
                $producto->save();
                if ($datos->hasFile('foto')){
                    $archivo=$datos->file('foto');
                    //Eliminar la foto anterior
                    if ($producto->foto!=''){
                        Storage::disk('public')->delete('foto/producto/' . $producto->foto);
                    }
                    //Subir la nueva foto
                    $nombre_archivo='foto-'.$producto->id.'.'.$archivo->getClientOriginalExtension();
                    $archivo_subido=$archivo->storeAs('foto/producto', $nombre_archivo,'public');
                    $producto->foto=$nombre_archivo;
                    $producto->save();
                }
            break;

            case 'Eliminar':
                $producto=Producto::find($datos['id']);
                if ($producto->foto!=''){
                        Storage::disk('public')->delete('foto/producto/' . $producto->foto);
                    }
                $producto->delete();
    

            break;
        }

        return redirect()->route('lista_producto');
       
    }

    function mostrar_foto($foto)
    {
        $ruta_archivo=storage_path('app/public/foto/'.$foto);
        if (!file_exists($ruta_archivo)){
            abort(404);
        }
        $file= File::get($ruta_archivo);
        $type=File::mimeType($ruta_archivo);    
        $response=Response::make($file, 200);
        $response->header("Content-Type", $type);
        return $response;
    }


}