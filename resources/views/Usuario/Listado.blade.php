@extends('app.master') 

@section('titulo')
Usuarios
@endsection

@section('contenido')
 <div class="col-md-12">
<a class="btn btn-info" href="{{ action([App\Http\Controllers\UsuarioController::class, 'formulario']) }}">Agregar</a>

        <table class="table">
                <tr>
                    <td>Id</td>
                    <td>Email</td>
                    <td>Idrol</td>
                </tr>
                @foreach($lista as $elemento)
                <tr>
                    <td>{{ $elemento->id }}</td>
                    <td>
                        
                        <a href="{{ route('usuario.formulario', ['id' => $elemento->id]) }}">
                            {{ $elemento->email }}
                        </a>
                    </td>
                    <td>{{ $elemento->idrol }}</td>    
                </tr>
                @endforeach

        </table>
    </div>

@endsection