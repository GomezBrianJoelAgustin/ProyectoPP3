<!DOCTYPE html>
<html>
<head>
    <title>¡Nueva Alerta de Mantenimiento!</title>
    <style>
        body { font-family: sans-serif; line-height: 1.6; color: #333; margin: 0; padding: 0; background-color: #f4f4f4; }
        .container { max-width: 600px; margin: 20px auto; padding: 20px; background-color: #ffffff; border-radius: 8px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); }
        h1 { color: #d9534f; /* Un rojo para indicar alerta */ }
        h2 { color: #555; }
        ul { list-style-type: none; padding: 0; }
        ul li { margin-bottom: 8px; }
        strong { color: #333; }
        .highlight { background-color: #ffeeba; padding: 5px; border-radius: 4px; display: inline-block; }
        .footer { margin-top: 30px; font-size: 0.8em; color: #666; text-align: center; border-top: 1px solid #eee; padding-top: 15px; }
        .button {
            display: inline-block;
            padding: 10px 20px;
            margin-top: 15px;
            background-color: #007bff;
            color: #ffffff;
            text-decoration: none;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>¡Alerta de Mantenimiento Requerido!</h1>
        <p>Se ha detectado que una máquina necesita mantenimiento.</p>

        <h2>Detalles de la Máquina:</h2>
        <ul>
            <li><strong>ID de Máquina:</strong> <span class="highlight">{{ $machine->id }}</span></li>
            <li><strong>Número de Serie:</strong> <span class="highlight">{{ $machine->serial_number }}</span></li>
            <li><strong>Modelo:</strong> <span class="highlight">{{ $machine->model }}</span></li>
            <li><strong>Tipo:</strong> <span class="highlight">{{ $machine->typeRelation->name ?? 'N/A' }}</span></li>
        </ul>

        <h2>Mantenimiento Pendiente:</h2>
        <ul>
            <li><strong>Tipo de Mantenimiento:</strong> <span class="highlight">{{ $maintenanceTypeName }}</span></li>
            <li><strong>Kilómetros desde Último Mantenimiento:</strong> <span class="highlight">{{ number_format($kmSinceLastMaintenance, 0, ',', '.') }} km</span></li>
            <li><strong>Umbral de Mantenimiento:</strong> <span class="highlight">{{ number_format($maintenanceThreshold, 0, ',', '.') }} km</span></li>
        </ul>

        <p>La máquina ha superado el kilometraje recomendado para este tipo de mantenimiento. ¡Actúa pronto para evitar problemas!</p>

        {{-- Puedes añadir un enlace directo al sistema para gestionar el mantenimiento --}}
        {{-- <a href="{{ route('machines.edit', $machine->id) }}" class="button">Ver Detalles en el Sistema</a> --}}

        <p>Por favor, revisa el sistema para más detalles y agenda el mantenimiento necesario.</p>

        <div class="footer">
            <p>Saludos cordiales,<br>El equipo de {{ config('app.name') }}</p>
            <p>Este es un mensaje automático, por favor no respondas a este correo.</p>
        </div>
    </div>
</body>
</html>