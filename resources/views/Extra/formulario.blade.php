@extends('app.master') 

@section('titulo')
Extra
@endsection

@section('contenido')
      <div class="col-md-12">
<form action="{{ route('extra.guardar') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" class="form-control" name="id" value="{{$extra->id}}">
    
  <div class="form-group">
    <label for="exampleInputEmail1">Nombre</label>
    <input type="text" class="form-control" name="nombre" value="{{$extra->nombre}}">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Categoria</label>
    <input type="text" class="form-control" name="idcategoria" value="{{$extra->idcategoria}}">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Precio</label>
    <input type="text" class="form-control" name="precio" value="{{$extra->precio}}">
  </div>

  <input type="submit" class="btn btn-primary" name="operacion" value="{{$operacion}}">
  @if($operacion=='Modificar')
  <input type="submit" class="btn btn-primary" name="operacion" value="Eliminar">
  @endif
</form>
</div>
@endsection