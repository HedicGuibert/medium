<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewCommentNotification extends Mailable
{
    use Queueable, SerializesModels;

    protected $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('noreplay@medium.com')
            ->markdown('emails.comment_notification')
            ->with([
                'user_name' => $this->data['user_name'],
                'article_slug' => $this->data['article_slug'],
                'article_name' => $this->data['article_name'],
            ]);
    }
}
