<?php

namespace App\Http\Controllers\TeamWorks;

use App\TeamWork;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Auth;
use Illuminate\Http\Request;

use App\Http\Requests;

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

  protected $guard = 'teamWork';

  protected $loginView = 'teamWork.auth.login';

  /**
  * Where to redirect users after login / registration.
  *
  * @var string
  */
  protected $redirectTo = '/teamwork/dashboard';

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
    // return Validator::make($data, [
    //
    // ]);
  }

  /**
  * Create a new user instance after a valid registration.
  *
  * @param  array  $data
  * @return User
  */
  protected function create(Request $request)
  {
    $this->validate($request, [
      'name' => 'required|min:4|max:255',
      'job' => 'required|min:4|max:255',
      'phoneNo' => 'required|numeric|unique:teamworks',
      'email' => 'required|email|unique:teamworks',
    ]);

    $success = '';
    $member = new TeamWork();
    $member->name = $request->name;
    $member->email = $request->name.'@'.Auth::user()->name.'.gudi';
    $member->job = $request->job;
    $member->phoneNo = $request->phoneNo;
    $member->emailAddress = $request->email;
    $member->password = bcrypt($request->password);
    $member->image = 'src/frontend/dist/img/avatar'.rand(1,5).'.png';
    $member->back_image = 'src/frontend/dist/img/photo'.rand(1,2).'.png';
    $member->user_id = Auth::user()->id;
    $memberSave = $member->save();

    $this->userDirs($memberSave, Auth::user()->id, $member->id); // run the userrs directiry function


    if($memberSave){
      $success .= '<li class="userContainer">';
      $success .= '<div class="patern">';
      $success .= '<i class="fa fa-close deleteMember"></i>';
      $success .= '  </div>';
      $success .= '<img src="'.asset($member->image).'" width="128" alt="User Image">';
      $success .= '<a class="users-list-name" href="#" data-id="'.$member->id.'">'.$member->name.'</a>';
      $success .= '<span class="users-list-date">'.$member->job.'</span>';
      $success .= '</li>';


      return response()->json(['user' => $success], 200);
    }
  }

  protected function editMember(Request $request)
  {
    $member = TeamWork::find($request->id);
    $this->validate($request, [
      'name' => 'required|min:4|max:255',
      'job' => 'required|min:4|max:255',
      'phoneNo' => 'required|numeric',
      'email' => 'required|email',
    ]);
    $success = '';

    $member->name = $request->name;
    $request->name !== '' ? $member->name = $request->name : '';
    $member->job = $request->job;
    $member->phoneNo = $request->phoneNo;
    $member->email = $request->email;
    $member->password = bcrypt($request->password);
    $memberUpdate = $member->update();
    if($memberUpdate){
      $success .= '<div class="alert alert-info">';
      $success .= '<button type="button" aria-hidden="true" class="close">×</button>';
      $success .= '<span><b> Success - </b> the Member Successfully updated </span>';
      $success .= '</div>';

      return response()->json(['successEdit' => $success], 200);
    }
  }

  protected function getTeamWorkDelete(Request $request)
  {
    $id = $request->id;
    $success = '';
    $fail = '';
    $member = TeamWork::find($id);
    if(!$member){
      $fail .= '<div class="alert alert-danger">';
      $fail .= '<button type="button" aria-hidden="true" class="close">×</button>';
      $fail .= '<span><b> Success - </b> this Id not found</span>';
      $fail .= '</div>';
      return response()->json(['fail' => $fail], 200);
    }

    $deleteMember = $member->delete();
    if($deleteMember){
      $success .= '<div class="alert alert-warning">';
      $success .= '<button type="button" aria-hidden="true" class="close">×</button>';
      $success .= '<span><b> Success - </b> the Member Successfully deleted</span>';
      $success .= '</div>';
      return response()->json(['successDelete' => $success], 200);
    }
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
  protected function userDirs($user, $AuthId, $member_id)
  {
    if ($user) {
      // member directory path
      $pathMember = public_path() . '/src/users/user@'.$AuthId.'/members/member@'.$member_id.'';
      // file directory path
      $pathMemberFiles = public_path() . '/src/users/user@'.$AuthId.'/members/member@'.$member_id.'/files';
      // image directory path
      $pathMemberImg = public_path() . '/src/users/user@'.$AuthId.'/members/member@'.$member_id.'/img';

      if (!file_exists($pathMember)) {
        // create the member directory
        $oldmask = umask(0);
        $dir = mkdir($pathMember, 0777);
        umask($oldmask);
      }
      if (!file_exists($pathMemberFiles)) {
        // create the member files directory
        $oldmask = umask(0);
        $dir = mkdir($pathMemberFiles, 0777);
        umask($oldmask);
      }
      if (!file_exists($pathMemberImg)) {
        // create the member image directory
        $oldmask = umask(0);
        $dir = mkdir($pathMemberImg, 0777);
        umask($oldmask);
      }
    }
  }
}
