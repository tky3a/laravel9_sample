<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DailyTweetCount extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $toUser;
    public $count;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $toUser, int $count)
    {
        $this->toUser = $toUser;
        $this->count = $count;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        echo "よばれてない";
        // ->subject("昨日は{$this->count}件のつぶやきが追加されました！")
        // echo "?????{$this->count}";
        return $this->markdown('email.daily_tweet_count');
    }
}
