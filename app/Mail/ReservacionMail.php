<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Reservacion;

class ReservacionMail extends Mailable
{
    use Queueable, SerializesModels;
    public $asunto;
    public $cuerpo;
    public $nombreUsuario;

    /**
     * Create a new message instance.
     *
     * @param string $asunto
     * @param string $cuerpo
     * @param string $nombreUsuario
     */
    public function __construct($asunto, $cuerpo, $nombreUsuario)
    {
        $this->asunto = $asunto;
        $this->cuerpo = $cuerpo;
        $this->nombreUsuario = $nombreUsuario;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('reservaciones.correo')
                    ->subject($this->asunto)
                    ->with([
                        'asunto' => $this->asunto,
                        'cuerpo' => $this->cuerpo,
                        'nombreUsuario' => $this->nombreUsuario,
                    ]);
    }
}