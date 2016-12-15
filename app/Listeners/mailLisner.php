<?php

namespace App\Listeners;

use App\Events\mailForRegister;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Mail;
class mailLisner
{
  /**
  * Create the event listener.
  *
  * @return void
  */
  public function __construct()
  {
    //
  }

  /**
  * Handle the event.
  *
  * @param  mailForRegister  $event
  * @return void
  */
  public function handle(mailForRegister $event)
  {
    $name = $event->userName;
    $email = $event->userEmail;
    $token = $event->token;

    Mail::send('mails.emailConfirmation', ['name' => $name, 'token' => $token], function ($m) use($name, $email) {
      $m->from('moaalaa16@gmail.com', 'Ilgudi.com');
      $m->to($email, $name);
      $m->subject('confirm the email address');
    });
  }
}
