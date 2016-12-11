<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Logout;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\entrance_logs as Entrance;
use App\login_hours as logHours;
use Carbon\Carbon;
use App\Notification;
class LogSuccessfulLogout
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
  * @param  Logout  $event
  * @return void
  */
  public function handle(Logout $event)
  {
    /**
    * Handle the event.
    *
    * @var get the login date by getting the last date and compare them
    * @var where the logout = null
    * @var where user_id == Auth::user
    * @return void
    */
    $userLog = Entrance::where('created_at', '>=', date('Y-m-d H:i:s', time()-86400))
    ->whereNull('logout_at')
    ->where('user_id', '=', $event->user->id)
    ->orderBy('login_at', 'desc')->first();

    if($userLog) { //if isset the user log

      $time = Carbon::now('Africa/Cairo'); // get time Zone

      $userLog->logout_at = $time; // set the logout time

      $startTime = $userLog->login_at; // put the values in var

      $finishTime = $userLog->logout_at; // put the values in var
      $logId = $userLog->id; // put the values in var

      $userLog->save(); // save

      $startTimes = Carbon::parse($startTime); // parse the vlaues
      $finishTimes = Carbon::parse($finishTime); // parse the vlaues

      $totalDuration = $finishTimes->diffInSeconds($startTimes); // calculate the diffrantes

      $hours = gmdate('H:i:s', $totalDuration); //convert the time to get time formates

      $logHours = new logHours();
      $logHours->user_id = $event->user->id; //put the user id

      $logHours->hours = $hours; // put the hours
      $logHours->log_id = $logId; // put the hours
      $logHours->save(); // save

      Notification::create([
        'user_id' =>$event->user->id,
        'action' => 'You Logged Out on ' . $time,
        'type' => 'user',
      ]);
    }
  }
}
