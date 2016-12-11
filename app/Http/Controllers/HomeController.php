<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Html;
use App\TeamWork;
use App\User;
use App\BMC;
use DB;
use Auth;
use App\entrance_logs;
use App\Notification as noty;

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
  * Show the logs.
  **/
  public function logs()
  {
    $userLogs = User::where('id', Auth::user()->id)->get();
    return view('frontend.logsTimer.logs', compact('userLogs'));
  }
  /**
  * view the notification.
  **/
  public function notificationView()
  {
    $userNoty = noty::where('user_id', Auth::user()->id)->get();
    return view('frontend.noty.notyTimeLine', compact('userNoty'));
  }
  /**
  * update the notification status.
  **/
  public function notification(Request $request)
  {
    $this->id = $request->id;
    $noty = noty::findOrFail($this->id);
    $noty->read = 1;
    $noty->update();

    return response()->json(
      [
        'readNoty' => 'readNoty',
        'readAction' => 'notyReadAction',
        'readFrom' => 'notyReadInfo',
      ], 200);
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
  * Show the projects Views.
  **/
  public function getProjects()
  {
    $AuthUser = \Auth::user()->id;
    $projects = BMC::where('user_id', $AuthUser)->orderBy('id', 'DESC')->get();
    return view('frontend.canvas.projects', compact('projects'));
  }

  /**
  * Show the create projects Views.
  **/
  public function getCreateProjects()
  {
    return view('frontend.canvas.createProject');
  }

  /**
  * Show the create projects Views.
  **/
  public function getCreateInfoProjects()
  {
    return view('frontend.canvas.projectInfo');
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
      return redirect()->route('view.canvas', [$this->id => $saveCanvas])->with(['successCanvas' => $success]);
    }
    $fail = 'there are some Errors the canvas Didn\'t created Successfully';
    return redirect()->route('dashboard')->with(['fail' => $fail]);
  }
  /**
  * Update canvas .
  **/
  public function postCanvasUpdate(Request $request)
  {
    $this->validate($request, [
      'name' => 'required|min:4|max:255',
      'desc' => 'required|min:4|max:500',
    ]);
    $success = '';
    $fail = '';
    $canvasId = $request->id;
    $name = $request->name;
    $desc = $request->desc;
    $canvas = BMC::findOrFail($canvasId);
    // add the policy
    $this->authorize('modify', $canvas);
    $canvas->name = $name;
    $canvas->description = $desc;
    $canvas->update();
    if($canvas){
      $success = 'the canvas updated Successfully';
      return response()->json(['success' => $success], 200);
    }
    $fail = 'there are some Errors the canvas Didn\'t created Successfully';
    return redirect()->route('dashboard')->with(['fail' => $fail]);
  }
  /**
  * Delete canvas .
  **/
  public function CanvasDelete(Request $request)
  {

    $canvasId = $request->id;

    $canvas = BMC::findOrFail($canvasId);
    // add the policy
    $this->authorize('modify', $canvas);
    $canvas->delete();
    if($canvas){
      $success = 'the canvas deleted Successfully';
      return response()->json(['success' => $success], 200);
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
  public function profile_update(Request $request)
  {
    // define the fields
    $name              = $request->name;
    $email             = $request->email;
    $firstName         = $request->firstName;
    $lastName          = $request->lastName;
    $password          = $request->password;
    $phoneNo           = $request->phoneNo;
    $userType          = $request->userType;
    $address           = $request->address;
    $job               = $request->job;
    $companyStartFrom  = $request->companyStartFrom;
    $description = $request->description;
    $image = ''; //image var
    $back_image = ''; //image var
    if (isset($request->image)) {
      $image = $this->upload($request->image);
    }
    if (isset($request->back_image)) {
      $back_image = $this->upload($request->back_image);
    }

    $this->validate($request, [
      'name' => 'required|min:4|max:255',
      'firstName' => 'required|min:4|max:255',
      'lastName' => 'required|min:4|max:255',
      'email' => 'required|email|max:255',
      'userType'  =>  'required|numeric',
      'phoneNo'   =>  'required|numeric',
      'job' => 'max:255',
      'companyStartFrom' => 'date',
      'description' => 'min:4',
    ]);


    $user = User::findOrFail(\Auth::user()->id);
    if (!empty($name)) {
      $user->name = $name;
    }
    if (!empty($email)) {
      $user->email = $email;
    }
    if (!empty($firstName)) {
      $user->firstName = $firstName;
    }
    if (!empty($lastName)) {
      $user->lastName = $lastName;
    }
    if (!empty($password)) {
      $user->password = bcrypt($password);
    }
    if (!empty($phoneNo)) {
      $user->phoneNo = $phoneNo;
    }
    if (!empty($image)) {
      if ($user->image === 'src/frontend/dist/img/avatar1.png'
      || $user->image === 'src/frontend/dist/img/avatar2.png'
      || $user->image === 'src/frontend/dist/img/avatar3.png'
      || $user->image === 'src/frontend/dist/img/avatar4.png'
      || $user->image === 'src/frontend/dist/img/avatar5.png') {
        $user->image = $image;
      } else {
        if(Auth::user()->account_type !== 'gudiAcount'){
          $result = substr($user->image, 0, 5);
          if ($result === 'https' || $result === 'HTTPS') {
            $user->image = $image;
          } else {
            if($user->image) {
              unlink($user->image); // remove the old image
            }

            $user->image = $image;
          }

        }

      }
    }
    if (!empty($back_image)) {
      if ($user->back_image === 'src/frontend/dist/img/photo1.png'
      || $user->back_image === 'src/frontend/dist/img/photo2.png') {
        $user->back_image = $back_image;
      } else {
        if(Auth::user()->account_type !== 'gudiAcount'){
          $result = substr($user->back_image, 0, 5);
          if ($result === 'https' || $result === 'HTTPS') {
            $user->back_image = $back_image;
          } else {
            if($user->back_image) {
              unlink($user->back_image); // remove the old image
            }

            $user->back_image = $back_image;
          }

        }


      }
    }
    if (!empty($companyStartFrom)) {
      $user->companyStartFrom = $companyStartFrom;
    }
    if (!empty($description)) {
      $user->description = $description;
    }
    if (!empty($address)) {
      $user->address = $address;
    }
    if (!empty($job)) {
      $user->job = $job;
    }
    if (!empty($companyStartFrom)) {
      $user->companyStartFrom = $companyStartFrom;
    }
    if (!empty($userType)) {
      $user->userType = $userType;
    }
    $user->update();
    if ($user->update() === true) {
      return redirect()->route('profile')->with(['success' => 'the Profile Updated Successfully']);
    } else {
      return redirect()->route('profile')->with(['fail' => 'there are some problem try again later']);
    }
  }  public function info_update(Request $request)
  {
    $user = User::findOrFail(\Auth::user()->id);
    $user->cPanelInfo = 1;
    $user->update();
  }

  public function upload($file)
  {
    $extension = $file->getClientOriginalExtension();
    $sha1 = sha1($file->getClientOriginalName());
    $filename = date('Y-m-d-h-i-s')."_".$sha1.".".$extension;
    $path = public_path("src/users/user@".Auth::user()->id."/img");
    $file->move($path, $filename);
    return "src/users/user@".Auth::user()->id."/img".'/'.$filename;
  }
}
