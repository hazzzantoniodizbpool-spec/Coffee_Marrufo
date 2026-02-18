@extends('app.master') 

@section('titulo')
Productos
@endsection

@section('contenido')
      <div class="col-md-12">
<form action="{{ route('producto.guardar') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" class="form-control" name="id" value="{{$producto->id}}">
    
  <div class="form-group">
    <label for="exampleInputEmail1">Nombre</label>
    <input type="text" class="form-control" name="nombre" value="{{$producto->nombre}}">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Precio</label>
    <input type="text" class="form-control" name="precio" value="{{$producto->precio}}">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Categoria</label>
    <input type="text" class="form-control" name="categoria" value="{{$producto->categoria}}">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Descripcion</label>
    <input type="text" class="form-control" name="descripcion" value="{{$producto->descripcion}}">
  </div>
   <div class="form-group">
    <label for="exampleInputEmail1">Foto</label>
    <input type="file"  name="foto"  class="form-control">
  </div>
  
  <input type="submit" class="btn btn-primary" name="operacion" value="{{$operacion}}">
  @if($operacion=='Modificar')
  <input type="submit" class="btn btn-primary" name="operacion" value="Eliminar">
  @endif
</form>
</div>
@endsection