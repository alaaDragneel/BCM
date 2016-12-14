<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
  /*
  |--------------------------------------------------------------------------
  | Registration & Login Controller
  |--------------------------------------------------------------------------
  |
  | This controller handles the registration of new users, as well as the
  | authentication of existing users. By default, this controller uses
  | a simple trait to add these behaviors. Why don't you explore it?
  |
  */

  use AuthenticatesAndRegistersUsers, ThrottlesLogins;

  /**
  * Where to redirect users after login / registration.
  *
  * @var string
  */
  protected $redirectTo = '/users/dashboard';

  /**
  * Create a new authentication controller instance.
  *
  * @return void
  */
  public function __construct()
  {
    $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
  }

  /**
  * Get a validator for an incoming registration request.
  *
  * @param  array  $data
  * @return \Illuminate\Contracts\Validation\Validator
  */
  protected function validator(array $data)
  {
    return Validator::make($data, [
    'firstName' => 'required|min:4|max:255',
    'lastName' => 'required|min:4|max:255',
    'email' => 'required|email|max:255|unique:users',
    'password' => 'required|min:6|confirmed',
    ]);
  }

  /**
  * Create a new user instance after a valid registration.
  *
  * @param  array  $data
  * @return User
  */
  protected function create(array $data)
  {
    $user = User::create([
    'firstName' => $data['firstName'],
    'lastName' => $data['lastName'],
    'name' => $data['firstName'] .' '. $data['lastName'],
    'email' => $data['email'],
    'image' => 'src/frontend/dist/img/avatar'.rand(1,5).'.png',
    'back_image' => 'src/frontend/dist/img/photo'.rand(1,2).'.png',
    'password' => bcrypt($data['password']),
    ]);
    $this->userDirs($user); // run the userrs directiry function
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
      $mainPath = public_path() . '/src/users';
      // main directory path
      $path = public_path() . '/src/users/user@'.$user->id;
      // files directory path
      $pathFiles = public_path() . '/src/users/user@'.$user->id.'/files';
      // image directory path
      $pathImg = public_path() . '/src/users/user@'.$user->id.'/img';
      // image directory path
      $pathMember = public_path() . '/src/users/user@'.$user->id.'/members';

      if (!file_exists($mainPath)) {
        // create the users directory
        $oldmask = umask(0);
        $dir = mkdir($mainPath, 0777);
        umask($oldmask);
      }
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
      if (!file_exists($pathMember)) {
        // make the member directory
        $oldmask = umask(0);
        $img = mkdir($pathMember, 0777);
        umask($oldmask);
      }
    }
  }
}
