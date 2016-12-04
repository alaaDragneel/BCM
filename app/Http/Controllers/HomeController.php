<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Html;
use App\TeamWork;
use App\User;
use App\BMC;
use DB;

class HomeController extends Controller
{
  public $id;
  /**
  * Show the application dashboard.
  **/
  public function index()
  {
    return view('frontend.users.index');
  }

  /**
  * Show the teamWorks Views.
  **/
  public function getTeamWork()
  {
    $AuthUser = \Auth::user()->id;
    $members = TeamWork::where('user_id', $AuthUser)->orderBy('id', 'DESC')->get();
    return view('frontend.users.teamworks', compact('members'));
  }

  /**
  * insert the teamWorks.
  **/
  public function NewMember(Request $request)
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
    $member->job = $request->job;
    $member->phoneNo = $request->phoneNo;
    $member->email = $request->email;
    $member->password = bcrypt($request->password);
    $member->image = 'src/frontend/global/img/avatar5.png';
    $member->user_id = \Auth::user()->id;
    $memberSave = $member->save();
    if($memberSave){
      $success .= '<div class="alert alert-success">';
        $success .= '<button type="button" aria-hidden="true" class="close">×</button>';
        $success .= '<span><b> Success - </b> the Member Successfully Join To Your Team A message Will Arrive o Him Mail Soon</span>';
        $success .= '</div>';

      return response()->json(['success' => $success], 200);
    }
  }

  public function editMember(Request $request)
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

  public function getTeamWorkDelete(Request $request)
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
  * Show the projects Views.
  **/
  public function getProjects()
  {
    $AuthUser = \Auth::user()->id;
    $projects = BMC::where('user_id', $AuthUser)->orderBy('id', 'DESC')->get();
    return view('frontend.users.projects', compact('projects'));
  }

  /**
  * Show the create projects Views.
  **/
  public function getCreateProjects()
  {
    return view('frontend.users.createProject');
  }

  /**
  * Show the create projects Views.
  **/
  public function getCreateInfoProjects()
  {
    return view('frontend.users.projectInfo');
  }

  /**
  * store canvas .
  **/
  public function postCanvasStore(Request $request)
  {
    $this->validate($request, [
      'name' => 'required|min:4|max:255',
      'description' => 'required|min:4|max:500',
    ]);
    $success = '';
    $fail = '';
    $userId = \Auth::user()->id;
    $saveCanvas = DB::table('BMCS')->insertGetId([
      'name'        =>  $request->name,
      'description' =>  $request->description,
      'user_id'     =>  $userId
    ]);

    if($saveCanvas){
      $success= 'the canvas created Successfully Do Greate Job';
      return redirect()->route('view.canvas', [$this->id => $saveCanvas])->with(['success' => $success]);
    }
    $fail = 'there are some Errors the canvas Didn\'t created Successfully';
    return redirect()->route('dashboard')->with(['fail' => $fail]);
  }

  public function register_profile()
  {
    if (\Auth::user()->userType === 2 || \Auth::user()->userType === 3) {
      return redirect()->route('dashboard');
    }
    $warning = 'Please Add This information to can Contaniue';
    return view('frontend.users.profileInfo', compact('warning'));
  }
  public function register_profile_update(Request $request)
  {
    $role = [];
    if (isset($request->email)) {
      $role['email']  = 'required|email|max:255|unique:users';
    }
    if (isset($request->userType)) {
      $role['userType'] = 'required|numeric';
    }
    if (isset($request->phoneNo)) {
      $role['phoneNo'] = 'required|numeric|unique:users';
    }
    $this->validate($request, $role);
    // // update the user type
    $user = User::findOrFail(\Auth::user()->id);
    if (isset($request->email)) {
      $user->email = $request->email;
    }
    $user->userType = $request->userType;
    $user->phoneNo = $request->phoneNo;
    $user->update();
    if($user) {
      $msg = 'Welcome With As '.\Auth::user()->name;
    } else {
      $msg = 'something goes wrong try again after few minutes';
    }

    return redirect()->route('dashboard')->with(['msg' => $msg]);
  }

  public function profile()
  {
    return view('frontend.users.profile');
  }
}
