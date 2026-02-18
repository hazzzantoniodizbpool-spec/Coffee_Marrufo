@extends('app.master')

@section('titulo')
Extras
@endsection

@section('contenido')
      <div class="col-md-12">
        <a class="btn btn-info" href="{{ route ('extra.formulario')}}">Agregar</a>
        <table class="table">
              <tr>
                  <td>Id</td>
                  <td>Nombre</td>
                  <td>Idcategoria</td>
                  <td>Precio</td>
               </tr>
            @foreach($lista as $elemento)
              <tr>
                  <td>{{$elemento->id}}</td>
                  <td>
                      <a href="{{ route ('extra.formulario', $elemento->id)}}">{{$elemento->nombre}}</a>
                  </td>
                  <td>{{$elemento->idcategoria}}</td>
                  <td>{{$elemento->precio}}</td>
              </tr>
            @endforeach
        </table>
      </div>
    </div>
@endsection