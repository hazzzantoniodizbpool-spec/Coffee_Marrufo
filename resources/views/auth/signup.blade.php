<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('bootstrap.min4b.css') }}">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header text-center">
                    <h3>Crear cuenta</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('signup.register') }}">
                        @csrf

                        <!-- Nombre -->
                        <div class="mb-3">
                            <input type="text" name="nombre" class="form-control" placeholder="Nombre completo" value="{{ old('nombre') }}" required>
                            @error('nombre')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div class="mb-3">
                            <input type="email" name="email" class="form-control" placeholder="Correo electrónico" value="{{ old('email') }}" required>
                            @error('email')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- Contraseña -->
                        <div class="mb-3">
                            <input type="password" name="password" class="form-control" placeholder="Contraseña" required>
                            @error('password')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- Confirmar contraseña -->
                        <div class="mb-3">
                            <input type="password" name="password_confirmation" class="form-control" placeholder="Confirmar contraseña" required>
                        </div>

                        <!-- Botón -->
                        <button type="submit" class="btn btn-primary w-100">Registrar</button>
                    </form>
                </div>
                <div class="card-footer text-center">
                    <small>¿Ya tienes cuenta? <a href="{{ route('login') }}">Inicia sesión</a></small>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS (opcional, para componentes interactivos) -->
<script src="{{ asset('jquery.slim.min4b.js') }}"></script>
<script src="{{ asset('bootstrap.bundle.min4b.js') }}"></script>
</body>
</html>


