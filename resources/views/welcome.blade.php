<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Conductor</title>
</head>
<body>
    <h1>Registrar Conductor</h1>

    @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <form action="{{ route('drivers.store') }}" method="POST">
        @csrf
        <label for="name">Nombre:</label>
        <input type="text" id="name" name="name" required>

        <label for="lastname">Apellido:</label>
        <input type="text" id="lastname" name="lastname" required>

        <label for="phone_number">Número de Teléfono:</label>
        <input type="text" id="phone_number" name="phone_number" required>

        <label for="document_number">Número de Documento:</label>
        <input type="number" id="document_number" name="document_number" required>

        <label for="id_document_type">Tipo de Documento:</label>
        <select id="id_document_type" name="id_document_type" required>
            @foreach ($documentTypes as $type)
                <option value="{{ $type->id }}">{{ $type->name }}</option>
            @endforeach
        </select>

        <label for="id_license_type">Tipo de Licencia:</label>
        <select id="id_license_type" name="id_license_type" required>
            @foreach ($licenseTypes as $type)
                <option value="{{ $type->id }}">{{ $type->name }}</option>
            @endforeach
        </select>

        <label for="experiencia">Experiencia:</label>
        <input type="text" id="experiencia" name="experiencia" required>

        <label for="disponibilidad">Disponibilidad:</label>
        <input type="text" id="disponibilidad" name="disponibilidad" required>

        <button type="submit">Registrar Conductor</button>
    </form>
</body>
</html>
