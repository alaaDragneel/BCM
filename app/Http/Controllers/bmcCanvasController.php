<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Html;

use App\TeamWork;

use App\BMC;

use App\KeyActivity;

use App\ValuePorposition;

use DB;

class bmcCanvasController extends Controller
{
  /**
   * Show the canvas Views.
   **/
  public function getCanvas($canvas_id)
  {
    $canvas = BMC::where('id', $canvas_id)->first();
    $KA = KeyActivity::where('bmc_id', $canvas_id)->get();
    $VP = ValuePorposition::where('bmc_id', $canvas_id)->get();
    return view('frontend.users.bmc', compact('canvas', 'KA', 'VP'));
  }

  /**
   * Show the canvas Views.
   **/
  public function postKA(Request $request)
  {
    $this->validate($request, [
      'title'=> 'required|max:255',
      'description'=> 'min:4|max:500',
    ]);
    $success = '';
    $KAStyle = '';
    $canvasId = $request->id;

    $storeCanvas = DB::table('key_activity')->insertGetId([
      'ka_title' => $request->title,
      'ka_desc' => $request->description,
      'bmc_id' => $canvasId,
      'user_id' => $canvasId,
    ]);
    if ($storeCanvas) {
      //success message
      $success = 'the data Addedd Successfully';
      // outputting
      $KAStyle = '<div class="callout callout-info options" data-ka="'. $storeCanvas .'">';
      $KAStyle .= '<div class="card-option">';
      $KAStyle .= '<span class="pull-right deleteKA"><i class="fa fa-close"></i></span>';
      $KAStyle .= '<span class="pull-right editKA"><i class="fa fa-edit"></i></span>';
      $KAStyle .= ' </div>';
      $KAStyle .= '<h4 class="ka_title">'. $request->title .'</h4>';
      $KAStyle .= '<p class="ka_desc">'. $request->description .'</p>';
      $KAStyle .= '</div>';

      return response()->json([
        'success' => $success,
        'outPut' => $KAStyle,
      ], 200);
    }

  }

  /**
  * delete the ka.
  **/
  public function getDeleteKA(Request $request)
  {
    $Ka = KeyActivity::find($request->id)->delete();
    if ($Ka) {
      //success message
      $success = 'the data deleted Successfully';
      return response()->json([
        'successDelete' => $success,
      ], 200);
    }
    return view('frontend.users.bmc', compact('canvas', 'KA'));
  }

  /**
  * update the ka.
  **/
  public function UpdateKA(Request $request)
  {
    $this->validate($request, [
      'title'=> 'required|max:255',
      'description'=> 'min:4|max:500',
    ]);
    $canvas_id = $request->id;
    // dd($canvas_id);
    $success = '';
    $KAUpdate = KeyActivity::find($canvas_id);
    $KAUpdate->ka_title = $request->title;
    $KAUpdate->ka_desc = $request->description;
    $canvasUpdate = $KAUpdate->update();
    if($canvasUpdate){
      $success = 'the data successfully updated';
      return response()->json([
        'successUpdate' => $success,
      ], 200);
    }

  }
  /**
   * Show the canvas Views.
   **/
  public function postVP(Request $request)
  {
    $this->validate($request, [
      'title'=> 'required|max:255',
      'description'=> 'min:4|max:500',
    ]);
    $success = '';
    $VPStyle = '';
    $canvasId = $request->id;

    $storeCanvas = DB::table('value_porposition')->insertGetId([
      'vp_title' => $request->title,
      'vp_desc' => $request->description,
      'BMC_id' => $canvasId,
    ]);
    if ($storeCanvas) {
      //success message
      $success = 'the Valeu Porposition Addedd Successfully';
      // outputting
      $VPStyle = '<div class="callout callout-warning optionsVP" data-vp="'. $storeCanvas .'">';
      $VPStyle .= '<div class="card-optionVP">';
      $VPStyle .= '<span class="pull-right deleteVP"><i class="fa fa-close"></i></span>';
      $VPStyle .= '<span class="pull-right editVP"><i class="fa fa-edit"></i></span>';
      $VPStyle .= ' </div>';
      $VPStyle .= '<h4 class="vp_title">'. $request->title .'</h4>';
      $VPStyle .= '<p class="vp_desc">'. $request->description .'</p>';
      $VPStyle .= '</div>';

      return response()->json([
        'success' => $success,
        'outPut' => $VPStyle,
      ], 200);
    }

  }

  /**
  * delete the ka.
  **/
  public function getDeleteVP(Request $request)
  {
    $vp = ValuePorposition::find($request->id)->delete();
    if ($vp) {
      //success message
      $success = 'the value porposition deleted Successfully';
      return response()->json([
        'successDelete' => $success,
      ], 200);
    }
    return view('frontend.users.bmc', compact('canvas', 'KA', 'vp'));
  }
  /**
  * update the ka.
  **/
  public function UpdateVP(Request $request)
  {
    $this->validate($request, [
      'title'=> 'required|max:255',
      'description'=> 'min:4|max:500',
    ]);
    $canvas_id = $request->id;
    // dd($canvas_id);
    $success = '';
    $VPUpdate = ValuePorposition::find($canvas_id);
    $VPUpdate->vp_title = $request->title;
    $VPUpdate->vp_desc = $request->description;
    $canvasUpdate = $VPUpdate->update();
    if($canvasUpdate){
      $success = 'the value porposition successfully updated';
      return response()->json([
        'successUpdate' => $success,
      ], 200);
    }

  }
}
