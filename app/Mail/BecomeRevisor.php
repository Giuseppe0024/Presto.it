<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Http\UploadedFile;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class BecomeRevisor extends Mailable
{
    use Queueable, SerializesModels;

    public User $user;

    public string $why;

    public ?string $pastExperience;

    public UploadedFile $curriculum;

    public function __construct(User $user, string $why, ?string $pastExperience, UploadedFile $curriculum)
    {
        $this->user = $user;
        $this->why = $why;
        $this->pastExperience = $pastExperience;
        $this->curriculum = $curriculum;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: "L'utente ".$this->user->name.' vuole diventare revisore.',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mail.become-revisor',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, Attachment>
     */
    public function attachments(): array
    {
        return [
            Attachment::fromPath($this->curriculum->getRealPath())
                ->as($this->curriculum->getClientOriginalName())
                ->withMime($this->curriculum->getClientMimeType()),
        ];
    }
}
