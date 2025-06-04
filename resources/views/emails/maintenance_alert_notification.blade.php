<!DOCTYPE html>
<html>
<head>
    <title>New Maintenance Alert!</title>
    <style>
        body { font-family: sans-serif; line-height: 1.6; color: #333; margin: 0; padding: 0; background-color: #f4f4f4; }
        .container { max-width: 600px; margin: 20px auto; padding: 20px; background-color: #ffffff; border-radius: 8px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); }
        h1 { color: #d9534f; /* A red to indicate alert */ }
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
        <h1>Maintenance Required Alert!</h1>
        <p>A machine has been detected as needing maintenance.</p>

        <h2>Machine Details:</h2>
        <ul>
            <li><strong>Machine ID:</strong> <span class="highlight">{{ $machine->id }}</span></li>
            <li><strong>Serial Number:</strong> <span class="highlight">{{ $machine->serial_number }}</span></li>
            <li><strong>Model:</strong> <span class="highlight">{{ $machine->model }}</span></li>
            <li><strong>Type:</strong> <span class="highlight">{{ $machine->typeRelation->name ?? 'N/A' }}</span></li>
        </ul>

        <h2>Pending Maintenance:</h2>
        <ul>
            <li><strong>Maintenance Type:</strong> <span class="highlight">{{ $maintenanceTypeName }}</span></li>
            <li><strong>Kilometers Since Last Maintenance:</strong> <span class="highlight">{{ number_format($kmSinceLastMaintenance, 0, ',', '.') }} km</span></li>
            <li><strong>Maintenance Threshold:</strong> <span class="highlight">{{ number_format($maintenanceThreshold, 0, ',', '.') }} km</span></li>
        </ul>

        <p>The machine has exceeded the recommended mileage for this type of maintenance. Act soon to avoid problems!</p>

        {{-- You can add a direct link to the system to manage maintenance --}}
        {{-- <a href="{{ route('machines.edit', $machine->id) }}" class="button">View Details in System</a> --}}

        <p>Please check the system for more details and schedule the necessary maintenance.</p>

        <div class="footer">
            <p>Kind regards,<br>The {{ config('app.name') }} Team</p>
            <p>This is an automated message, please do not reply to this email.</p>
        </div>
    </div>
</body>
</html>