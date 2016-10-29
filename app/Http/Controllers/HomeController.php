<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

use App\TeamWork;

class HomeController extends Controller
{

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
      return view('frontend.users.teamworks');
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
}
