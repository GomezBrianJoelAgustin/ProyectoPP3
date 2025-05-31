{{-- resources/views/emails/machine_work_notification.blade.php --}}
<!DOCTYPE html>
<html>
<head>
    <title>Notificación de Nuevo Trabajo de Máquina</title>
    <style>
        body { font-family: sans-serif; line-height: 1.6; color: #333; margin: 0; padding: 0; background-color: #f4f4f4; }
        .container { max-width: 600px; margin: 20px auto; padding: 20px; background-color: #ffffff; border-radius: 8px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); }
        h1 { color: #333; }
        ul { list-style-type: none; padding: 0; }
        ul li { margin-bottom: 8px; }
        .footer { margin-top: 30px; font-size: 0.8em; color: #666; text-align: center; }
    </style>
</head>
<body>
    <div class="container">
        <h1>¡Nuevo Trabajo de Máquina Creado!</h1>
        <p>Se ha registrado un nuevo trabajo de máquina con los siguientes detalles:</p>
        <ul>
            <li><strong>ID del Trabajo:</strong> {{ $machineWork->id }}</li>
            <li><strong>Fecha de Inicio:</strong> {{ $machineWork->date_start }}</li>
            {{-- Puedes acceder a las relaciones si están definidas en tu modelo MachineWork --}}
            @if($machineWork->machine)
                <li><strong>Máquina:</strong> {{ $machineWork->machine->serial_number ?? 'N/A' }}</li>
            @endif
            @if($machineWork->work)
                <li><strong>Tipo de Trabajo:</strong> {{ $machineWork->work->name ?? 'N/A' }}</li>
            @endif
            {{-- Añade aquí cualquier otro campo relevante de MachineWork que quieras mostrar --}}
            {{-- Por ejemplo: <li><strong>Kilómetros Recorridos:</strong> {{ $machineWork->km_travel ?? 'N/A' }}</li> --}}
        </ul>
        <p>Por favor, revisa el sistema para más detalles.</p>
        <div class="footer">
            <p>Saludos cordiales,<br>El equipo de {{ config('app.name') }}</p>
        </div>
    </div>
</body>
</html>