<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewPostAdminEmail extends Mailable
{
    use Queueable, SerializesModels;
    
    // per rendere disponibile $new_post all'interno di build (quindi la view)
    // creo una proprietà
    private $new_post;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    // richiamo $new_post nel construct così che sia disponibile al suo interno
    public function __construct($_new_post)
    {
        
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.new-post-admin-email');
    }
}
