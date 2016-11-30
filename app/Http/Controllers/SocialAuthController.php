<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\SocialAccountServices;
use Socialite; //Socialite NameSpace
use App\User;
use Auth;
class SocialAuthController extends Controller
{
  // redirect function
  public function redirectFaceBook($provider)
  {
    return Socialite::driver($provider)->redirect();
  }

  // callback functions
  public function callbackFaceBook($provider)
  {
    $user = Socialite::driver($provider)->user();
    $checklUser = $this->findOrCreate($provider, $user->id, $user);

    Auth::login($checklUser);
    return redirect()->route('dashboard');
  }

  public function findOrCreate($type, $id, $userObj)
  {

    $user = User::where('account_type', $type)
    ->where('sns_account_id', $id)
    ->first();
    // if user existing
    if($user){
      return $user;
    } else { // if user Not existing

      $user = $this->createSocialAuthUser($type, $userObj);
      return $user;
    }
  }

  private function createSocialAuthUser($authType, $userObj)
  {
    $userData = [
      'name' => isset($userObj->name) ? $userObj->name : '',
      'email' => isset($userObj->email) ? $userObj->email : '',
      'image' => isset($userObj->avatar_original) ? $userObj->avatar_original : '',
      'password' => isset($userObj->token) ? $userObj->token : '',
      'sns_account_id' => isset($userObj->id) ? $userObj->id : '',
      'account_type' => $authType,
    ];

    return User::create($userData);
  }

}
