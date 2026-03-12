@extends('app.master') 

@section('titulo')
Usuario
@endsection

@section('contenido')

<div class="col-md-12">

<form action="{{ route('usuario.save') }}" method="POST">
    @csrf

    <input type="hidden" class="form-control" name="id" value="{{$usuarios->id}}">

    <div class="form-group">
        <label>Nombre</label>
        <input type="text" class="form-control" name="nombre" value="{{$usuarios->nombre}}">
    </div>

    <div class="form-group">
        <label>Email</label>
        <input type="email" class="form-control" name="email" value="{{$usuarios->email}}">
    </div>

    <div class="form-group">
        <label for="idrol">Rol</label>
        <select class="form-control" name="idrol">
            @foreach($idrol as $rol)
                <option value="{{$rol->id}}"
                    @if($usuarios->idrol == $rol->id) selected @endif>
                    {{$rol->nombre}}
                </option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label>Contraseña</label>
        <input type="password" class="form-control" name="password">
    </div>

    <br>

    <div>
        <input type="submit" class="btn btn-primary" name="operacion" value="{{$operacion}}">

        @if($operacion=='Modificar')
            <input type="submit" class="btn btn-danger" name="operacion" value="Eliminar">
        @endif
    </div>

</form>

</div>

@endsection