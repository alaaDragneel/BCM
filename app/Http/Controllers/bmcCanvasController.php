<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Html;

use App\TeamWork;

use App\BMC;

use App\KeyActivity;

use DB;

class bmcCanvasController extends Controller
{
  /**
   * Show the canvas Views.
   **/
  public function getCanvas($canvas_id)
  {

    $canvas = BMC::find($canvas_id)->get();
    $KA = KeyActivity::where('bmc_id', $canvas_id)->get();
    return view('frontend.users.bmc', compact('canvas', 'KA'));
  }

  /**
   * Show the canvas Views.
   **/
  public function postKA(Request $request)
  {
    $success = '';
    $KAStyle = '';
    $canvasId = $request->id;

    $storeCanvas = DB::table('key_activity')->insertGetId([
      'ka_title' => $request->title,
      'ka_desc' => $request->title,
      'bmc_id' => $canvasId,
      'user_id' => $canvasId,
    ]);
    if ($storeCanvas) {
      // dd($id);
      //success message
      $success = 'the data Addedd Successfully';
      // outputting
      $KAStyle = '<div class="callout callout-info">';
      $KAStyle .= ' <span class="pull-right deleteKA" data-kaId="'.$storeCanvas.'"><i class="fa fa-close"></i></span>';
      $KAStyle .= '<h4>'. $request->title .'</h4>';
      $KAStyle .= '<p>'. $request->description .'.</p>';
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
}
