<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('bootstrap.min4b.css') }}">
</head>
<body class="bg-light">
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header text-center">
                    <h3>Iniciar sesión</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('login.perform') }}">
                        @csrf
                        <div class="mb-3">
                            <input type="email" name="email" class="form-control" placeholder="Correo electrónico" value="{{ old('email') }}" required>
                            @error('email')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <input type="password" name="password" class="form-control" placeholder="Contraseña" required>
                            @error('password')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Entrar</button>
                    </form>
                </div>
                <div class="card-footer text-center">
                    <small>¿No tienes cuenta? <a href="{{ route('signup.show') }}">Regístrate aquí</a></small>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>







