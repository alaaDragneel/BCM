<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\TeamWork;
use Auth;

class TeamWorksController extends Controller
{
	/**
	* @return the application dashboard for the team work member.
	**/
	public function index()
	{
		return view('frontend.teamWorks.index');
	}
	/**
	* @return the profile for the team work member.
	**/
	public function profile()
  {
    return view('frontend.teamWorks.profile');
  }

	public function profile_update(Request $request)
  {

		$this->validate($request, [
		'name' => 'required|min:4|max:255|alpha',
		'emailAddress' => 'required|email|max:255',
		'phoneNo'   =>  'required|numeric',
		'job' => 'max:255',
		'description' => 'min:4',
		'image' => 'image|mimes:jpeg,jpg,png',
		'back_image' => 'image|mimes:jpeg,jpg,png',
		]);

		$userName = \Auth::guard('teamWork')->user()->user()->first()->name;

    // define the fields
    $email             =  $request->name.'@'. $userName .'.gudi';
    $emailAddress      = $request->emailAddress;
    $password          = $request->password;
    $phoneNo           = $request->phoneNo;
    $job               = $request->job;
    $description = $request->description;
    $image = ''; //image var
    $back_image = ''; //image var
    if (isset($request->image)) {
      $image = $this->upload($request->image);
    }
    if (isset($request->back_image)) {
      $back_image = $this->upload($request->back_image);
    }

    $user = TeamWork::findOrFail(\Auth::guard('teamWork')->user()->id);
    if (!empty($email)) {
      $user->email = $email;
    }
    if (!empty($emailAddress)) {
      $user->emailAddress = $emailAddress;
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
			    || $user->image === 'src/frontend/dist/img/avatar5.png')
			 	{
        	$user->image = $image;
      	} else {

				unlink($user->image); // remove the old image
        $user->image = $image;
      }
    }
    if (!empty($back_image)) {
      if ($user->back_image === 'src/frontend/dist/img/photo1.png'
      	|| $user->back_image === 'src/frontend/dist/img/photo2.png') {
        $user->back_image = $back_image;
      } else {
				unlink($user->back_image); // remove the old image
				$user->back_image = $back_image;
      }
    }

    if (!empty($description)) {
      $user->description = $description;
    }

    if (!empty($job)) {
      $user->job = $job;
    }


    $user->update();
    if ($user->update() === true) {
      return redirect()->route('team.profile')->with(['success' => 'the Profile Updated Successfully']);
    } else {
      return redirect()->route('team.profile')->with(['fail' => 'there are some problem try again later']);
    }
  }

	public function upload($file)
  {
    $extension = $file->getClientOriginalExtension();
    $sha1 = sha1($file->getClientOriginalName());
    $filename = date('Y-m-d-h-i-s')."_".$sha1.".".$extension;
    $path = public_path("src/users/user@".Auth::guard('teamWork')->user()->user_id."/members/member@".Auth::guard('teamWork')->user()->id."/img");
    $file->move($path, $filename);
    return "src/users/user@".Auth::guard('teamWork')->user()->user_id."/members/member@".Auth::guard('teamWork')->user()->id."/img".'/'.$filename;
  }
}
