<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../img/LOGO.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/login.css">
    <title>Login</title>
</head>
<body>
    <div class="login-container">
        <div class="header">
            <img src="../img/LOGO.png" alt="Hermes Logo" class="logo">
            <div class="title-container">
                <h1>Hermes</h1>
                <p class="subtitle">Transportadora</p>
            </div>
        </div>
        <form  action="{{ route('login') }}" method="POST">
            @csrf
            <div class="input-field">
                <img src="../img/usuario.png" alt="Icono Usuario">
                <input type="email" name="email" placeholder="Correo electronico" required>
            </div>
            <div class="input-field">
                <img src="../img/clave.png" alt="Icono Contraseña">
                <input type="password" name="password" id="password" placeholder="Contraseña" required>
            </div>
            <label>
                <input type="checkbox" id="show-password"> Mostrar contraseña
            </label>
            <a href="#" class="forgot-password">¿Olvidó su contraseña?</a>
            <button type="submit">INGRESAR</button>
            @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <p style="color: red; text-align: center; font-weight: bold; font-size: 18px;">{{ $error }}</p>
                    @endforeach
                </div>
            @endif
        </form>
    </div>
    <script>
        const showPasswordCheckbox = document.getElementById('show-password');
        const passwordInput = document.getElementById('password');

        showPasswordCheckbox.addEventListener('change', function() {
            if (this.checked) {
                passwordInput.setAttribute('type', 'text');
            } else {
                passwordInput.setAttribute('type', 'password');
            }
        });
    </script>
</body>
</html>
