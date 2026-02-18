@extends('app.master')

@section('titulo')
Productos
@endsection

@section('contenido')
      <div class="col-md-12">
        <a class="btn btn-info" href="{{ route ('producto.formulario')}}">Agregar</a>
        <table class="table">
              <tr>
                  <td>Id</td>
                  <td>Nombre</td>
                  <td>Precio</td>
                  <td>Categoria</td>
                  <td>Foto</td>
                  <td>Descripcion</td>

               </tr>
            @foreach($lista as $elemento)
              <tr>
                  <td>{{$elemento->id}}</td>
                  <td>
                      <a href="{{ route ('producto.formulario', $elemento->id)}}">{{$elemento->nombre}}</a>
                  </td>
                  <td>{{$elemento->Precio}}</td>
                  <td>{{$elemento->precio}}</td>
                  <td>{{$elemento->categoria}}</td>
                  <td>
                     @if($elemento->foto)
                        <img width="40" src="{{ asset('storage/foto/producto/' . $elemento->foto) }}" class="img-responsive" alt="foto">
                    @endif
                  </td>
                  <td>{{$elemento->descripcion}}</td>
              </tr>
            @endforeach
        </table>
      </div>
    </div>
@endsection