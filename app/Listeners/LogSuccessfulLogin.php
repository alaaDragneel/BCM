<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\entrance_logs as Entrance;
use Carbon\Carbon;
use App\Notification;
use Auth;
use Schema;
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
    if(null !== Auth::guard('teamWork')->user()) //check whether users table has email column
    {
      // counter logs
    } else {
      $time = Carbon::now('Africa/Cairo'); // get the time zone
      $userLog = new Entrance();
      $userLog->user_id = $event->user->id; // save the data
      $userLog->login_at = $time; // save the data
      $userLog->save();

      $noty = Notification::create([
        'user_id' => $event->user->id,
        'action' => 'Welcome To Ilgudi You Login On ' . $time,
        'type' => 'user',
      ]);
    }
  }
}
