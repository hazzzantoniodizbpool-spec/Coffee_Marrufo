@extends('app.master')

@section('titulo')
Categorias Extras
@endsection

@section('contenido')
      <div class="col-md-12">
        <a class="btn btn-info" href="{{ route ('categoriaExtra.formulario')}}">Agregar</a>
        <table class="table">
              <tr>
                  <td>Id</td>
                  <td>Nombre</td>
               </tr>
            @foreach($lista as $elemento)
              <tr>
                  <td>{{$elemento->id}}</td>
                  <td>
                      <a href="{{ route ('categoriaExtra.formulario', $elemento->id)}}">{{$elemento->nombre}}</a>
                  </td>
              </tr>
            @endforeach
        </table>
      </div>
    </div>
@endsection