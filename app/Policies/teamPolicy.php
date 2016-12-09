<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\User;
use App\TeamWork;
class teamPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function modifyTeam(User $user, TeamWork $teamWork)
    {
      return $user->id === $teamWork->user_id;
    }
}
