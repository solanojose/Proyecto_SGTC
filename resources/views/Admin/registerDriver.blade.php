<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/LOGO.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/saveDriver.css">
    <title>Registrar Conductor</title>
</head>
<body>
    <body>
        <header>
            <div class="header-content">
                <div class="logo-container">
                    <img src="../img/LOGO.png" alt="Hermes Transportadora Logo">
                    <div class="logo-text">
                        <h1>Hermes</h1>
                        <span>Transportadora</span>
                    </div>
                </div>
                <nav>
                    <ul>
                        <li><a href="#">¿Quienes Somos?</a></li>
                        <li><a href="#">Servicios</a></li>
                        <li><a href="#">Registrate</a></li>
                        <li><a href="#">Ingresar</a></li>
                    </ul>
                </nav>
            </div>
        </header>
        <main>
            <div class="form-container">
                <h1>Registro de Conductores</h1>
                <form action="{{ route('drivers.store') }}" method="POST">
                    @csrf
                    <div class="form-row">
                        <div>
                            <label for="tipoDocumento">Tipo Documento</label>
                            <select id="id_document_type" name="id_document_type" value="{{ old('id_document_type') }}" required>
                                <option value="" disabled selected>Seleccione una opción</option>
                                @foreach ($documentTypes as $type)
                                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="documento">Documento</label>
                            <input type="text" id="documento" name="document_number" value="{{ old('document_number') }}" placeholder="Ingresa tu N° de documento"  required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div>
                            <label for="nombre">Nombre</label>
                            <input type="text" id="nombre" name="name" value="{{ old('name') }}" placeholder="Ingresa tu nombre" required>
                        </div>
                        <div>
                            <label for="apellido">Apellido</label>
                            <input type="text" id="apellido" name="lastname" value="{{ old('lastname') }}" placeholder="Ingresa tu apellido"  required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div>
                            <label for="celular">Celular</label>
                            <input type="tel" id="celular" name="phone_number" value="{{ old('phone_number') }}" placeholder="Ingresa tu N° de celular"  required>
                        </div>
                        <div>
                            <label for="correo">Correo</label>
                            <input type="email" id="correo" name="email"  value="{{ old('email') }}" placeholder="Ingresa tu correo electronico"  required>
                        </div>
                    </div>
                    <div class="form-row">
                    <div>
                        <label for="password">Contraseña</label>
                        <input type="password" id="password" name="password" placeholder="Ingresa tu contraseña"  required>
                    </div>
                    <div>
                        <label for="password_confirmation">Confirmar Contraseña</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Ingresa tu contraseña" required>
                    </div>
                    </div>
                    <div class="form-row">
                        <div>
                            <label for="tipoLicencia">Tipo Licencia</label>
                            <select id="id_license_type" name="id_license_type" value="{{ old('id_license_type') }}"  required>
                                <option value="" disabled selected>Seleccione una opción</option>
                                @foreach ($licenseTypes as $type)
                                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="noLicencia">No. Licencia</label>
                            <input type="text" id="noLicencia" name="license_number" value="{{ old('license_number') }}" placeholder="Ingresa tu N° de licencia" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div>
                            <label for="fechaExpedicion">Fecha Expedición</label>
                            <input type="date" id="fechaExpedicion" name="f_exp_license" value="{{ old('f_exp_license') }}" required>
                        </div>
                        <div>
                            <label for="fechaVencimiento">Fecha Vencimiento</label>
                            <input type="date" id="fechaVencimiento" name="f_ven_license" value="{{ old('f_ven_license') }}" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div>
                            <label for="experiencia">Experiencia</label>
                            <input type="text" id="experiencia" name="experiencia" value="{{ old('experiencia') }}" placeholder="Ingresa tu experiencia en años" required>
                        </div>
                        <div>
                            <label for="estado">Estado</label>
                            <select id="estado" name="id_status_drive" value="{{ old('id_status_drive') }}" required>
                                <option value="" disabled selected>Seleccione una opción</option>
                                @foreach ($statusDrivers as $status)
                                    <option value="{{ $status->id }}">{{ $status->status }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <button type="submit">Guardar</button>
                </form>
                @if (session('success'))
                    <p style="color: green; text-align: center; font-weight: bold; font-size: 18px;">{{ session('success') }}</p>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <p style="color: red; text-align: center; font-weight: bold; font-size: 18px;">{{ $error }}</p>
                        @endforeach
                    </div>
                @endif
            </div>
        </main>
        <footer>
            <div class="footer-content">
                <div class="footer-section">
                    <h3>Algunas Ciudades</h3>
                    <div class="ciudad"><span>Bogota:</span> Calle 85 # 15-50, Barrio Chico Norte</div>
                    <div class="ciudad"><span>Medellin:</span> Carrera 33 # 40-30, Barrio Cabecera del Llano</div>
                    <div class="ciudad"><span>Barranquilla:</span> Calle 72 # 45-42, Barrio Alto Prado</div>
                    <div class="ciudad"><span>Tunja:</span> Calle 19 # 10-45, Barrio Centro</div>
                </div>
                <div class=".social-icons">
                    <h3>Contactos</h3>
                    <div>
                        <img src="../img/Instagram2.png" alt="Instagram">
                        <img src="../img/Twitter2.png" alt="x">
                    </div>
                    <div>
                        <img src="../img/Whatsapp2.png" alt="WhatsApp">
                        <img src="../img/Facebook2.png" alt="Facebook">
                    </div>
                </div>
                <div class="footer-section horarios">
                    <h3>Horarios</h3>
                    <p><span class="blue-text">LUNES - VIERNES</span></p>
                    <p>08:00 AM - 06:00 PM</p>
                    <p><span class="blue-text">SÁBADOS - FESTIVOS</span></p>
                    <p>09:00 AM - 01:00 PM</p>
                </div>
                
            </div>
            <div class="vigilado">
                <p>Vigilado y Controlado por</p>
                <div class="logos">
                    <img src="../img/mintic.png" alt="mintic" class="logo">
                    <img src="../img/Industria.png" alt="Industria y Comercio" class="logo">
                    <img src="../img/supertransporte.png" alt="supertransporte" class="logo">
                </div>
            </div>
        </footer>
    </body>
</html>
