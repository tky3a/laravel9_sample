<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\User;

// クラスにimplements ShouldQueueを記載することでqueueを使うと宣言できる
class NewUserIntroduction extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $subject = '新しいユーザーが追加されました';
    public $toUser;
    public $newUser;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $toUser, User $newUser)
    {
        $this->toUser = $toUser;
        $this->newUser = $newUser;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // return $this->view('email.new_user_introduction');
        // メールをマークダウン形式で送信
        return $this->markdown('email.new_user_introduction');
    }
}
