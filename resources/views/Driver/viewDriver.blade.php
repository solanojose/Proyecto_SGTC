<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href={{ asset('img/LOGO.png') }} type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/viewDriver.css') }}">
    <title>Registrar Vehiculo</title>
</head>
    <body>
        <header>
            <div class="header-content">
                <div class="logo-container">
                    <img src={{ asset('img/LOGO.png') }} alt="Hermes Transportadora Logo">
                    <div class="logo-text">
                        <h1>Hermes</h1>
                        <span>Transportadora</span>
                    </div>
                </div>
                <nav>
                    <ul style="display: flex; align-items: center; list-style-type: none; padding: 0;">
                        <li style="margin-right: 30px;" ><a href="">Mi perfil</a></li>
                        <li style="margin-left: auto;">
                            <form action="{{ route('logout') }}" method="POST" style="margin: 0;" onsubmit="return confirm('¿Estás seguro de que quieres cerrar sesión?');">
                                @csrf
                                <button type="submit" style="background:#5085ca; border:none; color:white; cursor:pointer; padding: 10px 15px; border-radius: 5px;">Cerrar Sesión</button>
                            </form>
                        </li>
                    </ul>
                </nav>
            </div>
        </header>
        <main>
                <h1>VISTA DEL CONDUCTOR</h1>
                <h1>Hola, {{ Auth::user()->name }}!</h1>
                {{-- <h1>Hola, {{ session('username') }}!</h1> --}}
        </main>
        <footer>
            <div class="footer-content">
                <div class="footer-section">
                    <h3>Algunas Ciudades</h3>
                    <p class="separador"></p>
                    <div class="ciudad"><span>Bogota:</span> Calle 85 # 15-50, Barrio Chico Norte</div>
                    <div class="ciudad"><span>Medellin:</span> Carrera 33 # 40-30, Barrio Cabecera del Llano</div>
                    <div class="ciudad"><span>Barranquilla:</span> Calle 72 # 45-42, Barrio Alto Prado</div>
                    <div class="ciudad"><span>Tunja:</span> Calle 19 # 10-45, Barrio Centro</div>
                </div>
                <div class=".social-icons">
                    <h3>Contactos</h3>
                    <p class="separador"></p>
                    <div>
                        <img src={{ asset('img/instagram2.png') }} alt="Instagram">
                        <img src={{ asset('img/twitter2.png') }} alt="x">
                    </div>
                    <div>
                        <img src={{ asset('img/whatsapp2.png') }} alt="WhatsApp">
                        <img src={{ asset('img/facebook2.png') }} alt="Facebook">
                    </div>
                </div>
                <div class="footer-section horarios">
                    <h3>Horarios</h3>
                    <p class="separador"></p>
                    <p><span class="blue-text">LUNES - VIERNES</span></p>
                    <p>08:00 AM - 06:00 PM</p>
                    <p class="separador"></p>
                    <p><span class="blue-text">SÁBADOS - FESTIVOS</span></p>
                    <p>09:00 AM - 01:00 PM</p>
                </div>
                
            </div>
            <div class="vigilado">
                <p>Vigilado y Controlado por</p>
                <div class="logos">
                    <img src={{ asset('img/mintic.png') }} alt="mintic" class="logo">
                    <img src={{ asset('img/industria.png') }} alt="Industria y Comercio" class="logo">
                    <img src={{ asset('img/supertransporte.png') }} alt="supertransporte" class="logo">
                </div>
            </div>
        </footer>
    </body>
</html>
