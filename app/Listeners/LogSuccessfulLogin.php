<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\entrance_logs as Entrance;
use Carbon\Carbon;
class LogSuccessfulLogin
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
  * @param  Login  $event
  * @return void
  */
  public function handle(Login $event)
  {
    $time = Carbon::now('Africa/Cairo'); // get the time zone
    $userLog = new Entrance();
    $userLog->user_id = $event->user->id; // save the data
    $userLog->login_at = $time; // save the data
    $userLog->save();
  }
}
