<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use DB;
class MyMail extends Mailable
{
    use Queueable, SerializesModels;
    public $fullname;
    public $subject;
    public $content;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($fullname,$subject,$content)
    {
        $this->fullname = $fullname;
        $this->subject  = $subject;
        $this->content  = $content;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $config = DB::table('config')->where('id',1)->first();
        return $this->from('my@gmail.com')->view('mail.mymail',['config' => $config]);
    }
}
