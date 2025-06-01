<!DOCTYPE html>
<html>
<head>
    <title>¡New machine work created notification!</title>
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
        <h1>¡New machine work created!</h1>
        <p>A new machine work has been registered with the following details:</p>
        <ul>
            <li><strong>Work ID:</strong> {{ $machineWork->id }}</li>
            <li><strong>Start Date:</strong> {{ $machineWork->date_start }}</li>
            {{-- You can access relationships if they are defined in your MachineWork model --}}
            @if($machineWork->machine)
                <li><strong>Machine:</strong> {{ $machineWork->machine->serial_number ?? 'N/A' }}</li>
            @endif
            @if($machineWork->work)
                <li><strong>Work Type:</strong> {{ $machineWork->work->name ?? 'N/A' }}</li>
            @endif
            {{-- Add any other relevant MachineWork fields you want to display here --}}
            {{-- For example: <li><strong>Kilometers Traveled:</strong> {{ $machineWork->km_travel ?? 'N/A' }}</li> --}}
        </ul>
        <p>Please check the system for more details.</p>
        <div class="footer">
            <p>Best regards,<br>The {{ config('app.name') }} Team</p>
        </div>
    </div>
</body>
</html>