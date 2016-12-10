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
    $checklUser = $this->findOrCreate($provider, $user->id, $user->email, $user);

    Auth::login($checklUser);
    return redirect()->route('dashboard');
  }

  public function findOrCreate($type, $id, $email,$userObj)
  {
    if ($type === 'twitter') {
      $user = User::where('account_type', $type)
      ->where('sns_account_id', $id)
      ->first();
    } else {
      $user = User::where('account_type', $type)
      ->where('sns_account_id', $id)
      ->where('email', $email)
      ->first();
    }
    // dd($user);
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

    $user = User::create($userData);
    $this->userDirs($user);
    return $user;
  }
  
  /**
  * Create a fresh directories for the registered user.
  *
  * @param  Object  $user
  * @var make the main and nested dirs
  * @var Main directory => contain all the users Directories and files
  * @var files directory => contain all the files
  * @var img directory => contain all the image files
  */
  protected function userDirs($user)
  {
    if ($user) {
      // main directory path
      $path = '/home7/deziquec/public_html/ilgudi/src/users/user@'.$user->id;
      // files directory path
      $pathFiles = '/home7/deziquec/public_html/ilgudi/src/users/user@'.$user->id.'/files';
      // image directory path
      $pathImg = '/home7/deziquec/public_html/ilgudi/src/users/user@'.$user->id.'/img';
      if (!file_exists($path)) {
        // create the main directory
        $oldmask = umask(0);
        $dir = mkdir($path, 0777);
        umask($oldmask);
      }
      if (!file_exists($pathFiles)) {
        // make the files directory
        $oldmask = umask(0);
        $file = mkdir($pathFiles, 0777);
        umask($oldmask);
      }
      if (!file_exists($pathImg)) {
        // make the img directory
        $oldmask = umask(0);
        $img = mkdir($pathImg, 0777);
        umask($oldmask);
      }
    }
  }

}
