<?php

namespace App\Mail;

use App\Models\Machine;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class MaintenanceAlertNotification extends Mailable implements ShouldQueue // Agregamos 'implements ShouldQueue' si quieres que el envío se haga en segundo plano
{
    use Queueable, SerializesModels;

    // Estas propiedades serán pasadas al constructor y luego a la vista del email
    public $machine; // <-- ¡Ahora es singular! Representa una única máquina
    public $kmSinceLastMaintenance;
    public $maintenanceThreshold;
    public $maintenanceTypeName;

    /**
     * Crea una nueva instancia del mensaje.
     *
     * @param \App\Models\Machine $machine La máquina que necesita mantenimiento.
     * @param float $kmSinceLastMaintenance Los kilómetros recorridos desde el último mantenimiento.
     * @param int $maintenanceThreshold El umbral de kilómetros para este tipo de mantenimiento.
     * @param string $maintenanceTypeName El nombre del tipo de mantenimiento (ej: "Cambio de Aceite").
     */
    public function __construct(Machine $machine, float $kmSinceLastMaintenance, int $maintenanceThreshold, string $maintenanceTypeName)
    {
        $this->machine = $machine;
        $this->kmSinceLastMaintenance = $kmSinceLastMaintenance;
        $this->maintenanceThreshold = $maintenanceThreshold;
        $this->maintenanceTypeName = $maintenanceTypeName;
    }

    /**
     * Obtiene el sobre del mensaje (remitente, asunto).
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            // El asunto es específico para la máquina y el tipo de mantenimiento
            subject: 'Alerta de Mantenimiento Requerido: ' . $this->maintenanceTypeName . ' - Máquina ' . $this->machine->serial_number,
        );
    }

    /**
     * Obtiene la definición del contenido del mensaje.
     */
    public function content(): Content
    {
        return new Content(
            // La vista de Markdown para el contenido del email
            markdown: 'emails.maintenance_alert_notification',
            // Pasa las propiedades a la vista
            with: [
                'machine' => $this->machine,
                'kmSinceLastMaintenance' => $this->kmSinceLastMaintenance,
                'maintenanceThreshold' => $this->maintenanceThreshold,
                'maintenanceTypeName' => $this->maintenanceTypeName,
            ],
        );
    }

    /**
     * Obtiene los adjuntos para el mensaje.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}