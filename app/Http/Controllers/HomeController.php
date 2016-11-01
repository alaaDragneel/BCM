<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

use Html;

use App\TeamWork;

use App\BMC;

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
        // Validator::make($request, [
        //     'phoneNo' => [
        //     'required',
        //     Rule::unique('teamworks')->ignore($member->id),
        //   ],
        // ]);

        $success = '';

        //  $member = TeamWork::find($request->id);
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
      $canvas = new BMC();
      $canvas->name = $request->name;
      $canvas->description = $request->description;
      $canvas->user_id = $userId;
      $saveCanvas = $canvas->save();
      if($saveCanvas){
        $success= 'the canvas created Successfully Do Greate Job ;)';
        return redirect()->route('projects')->with(['success' => $success]);
      }
      $fail = 'there are some Errors the canvas Didn\'t created Successfully';
        return redirect()->route('user.dashboard')->with(['fail' => $fail]);
    }
}
