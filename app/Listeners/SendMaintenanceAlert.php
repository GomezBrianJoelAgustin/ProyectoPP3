<?php

namespace App\Listeners;

use App\Events\MaintenanceAlert; // Importa tu Evento
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Mail\MaintenanceAlertNotification; // Importa tu Mailable (asegúrate que este sea el nombre exacto de tu clase Mailable)

class SendMaintenanceAlert implements ShouldQueue
{
    use InteractsWithQueue;

    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\MaintenanceAlert  $event
     * @return void
     */
    public function handle(MaintenanceAlert $event): void
    {
        // Log para depuración, usando los nombres de propiedades correctos de tu evento
        Log::info('LISTENER DEBUG: Datos del evento - Máquina: ' . $event->machine->serial_number . ', KM Viajados: ' . $event->kmSinceLastMaintenance . ', Umbral: ' . $event->maintenanceThreshold . ', Tipo Mantenimiento: ' . $event->maintenanceTypeName);

        // Extraer las propiedades del evento para usarlas de forma más legible
        $machine = $event->machine;
        $kilometersTravelled = $event->kmSinceLastMaintenance;
        $thresholdKm = $event->maintenanceThreshold;
        $maintenanceType = $event->maintenanceTypeName;

        // Define la dirección de correo a la que enviar la alerta
        // ¡CAMBIA ESTO POR UN CORREO REAL DONDE PUEDAS RECIBIR LAS PRUEBAS!
        $recipientEmail = 'juegosagustingomez@gmail.com'; 

        try {
            // Envía el correo usando el Mailable correcto
            Mail::to($recipientEmail)->send(new MaintenanceAlertNotification( // Asegúrate de que este nombre sea el correcto de tu clase Mailable
                $machine,
                $kilometersTravelled,
                $thresholdKm,
                $maintenanceType
            ));
            Log::info('LISTENER DEBUG: Correo de alerta de mantenimiento enviado exitosamente a: ' . $recipientEmail);
        } catch (\Exception $e) {
            Log::error('LISTENER ERROR: Fallo al enviar el correo de alerta: ' . $e->getMessage());
            Log::error('LISTENER ERROR: Stack Trace: ' . $e->getTraceAsString());
        }
    }
}