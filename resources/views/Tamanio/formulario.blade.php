@extends('app.master') 

@section('titulo')
Tamaños
@endsection

@section('contenido')
      <div class="col-md-12">
<form action="{{ route('tamanio.guardar') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" class="form-control" name="id" value="{{$tamanio->id}}">
    
  <div class="form-group">
    <label for="exampleInputEmail1">Nombre</label>
    <input type="text" class="form-control" name="nombre" value="{{$tamanio->nombre}}">
  </div>
  <input type="submit" class="btn btn-primary" name="operacion" value="{{$operacion}}">
  @if($operacion=='Modificar')
  <input type="submit" class="btn btn-primary" name="operacion" value="Eliminar">
  @endif
</form>
</div>
@endsection