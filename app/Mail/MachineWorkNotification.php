<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\MachineWork; // ¡Importa tu modelo MachineWork!

class MachineWorkNotification extends Mailable implements ShouldQueue 
{
    use Queueable, SerializesModels;

    public $machineWork; 

    /**
     * Create a new message instance.
     */
    public function __construct(MachineWork $machineWork)
    {
        $this->machineWork = $machineWork;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'New machine work created: ID ' . $this->machineWork->id,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.machine_work_notification', 
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \
     */
    public function attachments(): array
    {
        return [];
    }
}