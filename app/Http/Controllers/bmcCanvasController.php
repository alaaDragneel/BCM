<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Html;
use App\TeamWork;
use App\BMC;
use App\KeyPartener;
use App\KeyActivity;
use App\ValuePorposition;
use App\CustomerRelation;
use App\KeyResource;
use App\Chaneel;
use App\CostStructure;
use App\RevenueStream;
use DB;

class bmcCanvasController extends Controller
{
  /**
   * Show the canvas Views.
   **/
  public function getCanvas($canvas_id)
  {
    $canvas = BMC::where('id', $canvas_id)->first();
    $KP = KeyPartener::where('bmc_id', $canvas_id)->get();
    $KA = KeyActivity::where('bmc_id', $canvas_id)->get();
    $VP = ValuePorposition::where('bmc_id', $canvas_id)->get();
    $CR = CustomerRelation::where('bmc_id', $canvas_id)->get();
    $KR = KeyResource::where('bmc_id', $canvas_id)->get();
    $CH = Chaneel::where('bmc_id', $canvas_id)->get();
    $CST = CostStructure::where('bmc_id', $canvas_id)->get();
    $RS = RevenueStream::where('bmc_id', $canvas_id)->get();
    return view('frontend.users.bmc', compact('canvas', 'KP', 'KA', 'VP', 'CR', 'KR', 'CH', 'CST', 'RS'));
  }


      public function postKP(Request $request)
      {
           $success = '';
           $KAStyle = '';

        $storeCanvas = DB::table('key_parteners')->insertGetId([
            'kp_name'  =>$request->name,
            'kp_desc' =>$request->desc,
            'BMC_id' => $request->bmc_id,
        ]);
        if ($storeCanvas) {
         //success message
         $success = 'the data Addedd Successfully';
         // outputting
         $KAStyle = '<div class="callout callout-info optionsKP" data-kp="'. $storeCanvas .'">';
         $KAStyle .= '<div class="card-optionKP">';
         $KAStyle .= '<span class="pull-right deleteKP"><i class="fa fa-close"></i></span>';
         $KAStyle .= ' </div>';
         $KAStyle .= '<h4 class="fullName"><i class="fa fa-user"></i>'. $request->name .'</h4>';
         $KAStyle .= '<p class="Desc"><i class="fa fa-black-tie"></i>'. $request->desc .'</p>';
         $KAStyle .= '</div>';

         return response()->json([
           'success' => $success,
           'outPut' => $KAStyle,
         ], 200);
       }

      }

        /**
        * delete the kp.
        **/
        public function getDeleteKP(Request $request)
        {
          $Kp = KeyPartener::find($request->id)->delete();
          if ($Kp) {
            //success message
            $success = 'the data deleted Successfully';
            return response()->json([
              'successDelete' => $success,
            ], 200);
          }
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

  /**
   * Show the canvas Views.
   **/
  public function postCR(Request $request)
  {
    $this->validate($request, [
      'title'=> 'required|max:255',
      'description'=> 'min:4|max:500',
    ]);
    $success = '';
    $CRStyle = '';
    $canvasId = $request->id;

    $storeCanvas = DB::table('customer_relation')->insertGetId([
      'cr_title' => $request->title,
      'cr_desc' => $request->description,
      'BMC_id' => $canvasId,
    ]);
    if ($storeCanvas) {
      //success message
      $success = 'the Customer Relation Addedd Successfully';
      // outputting
      $CRStyle = '<div class="callout callout-success optionsCR" data-vp="'. $storeCanvas .'">';
      $CRStyle .= '<div class="card-optionCR">';
      $CRStyle .= '<span class="pull-right deleteCR"><i class="fa fa-close"></i></span>';
      $CRStyle .= '<span class="pull-right editCR"><i class="fa fa-edit"></i></span>';
      $CRStyle .= ' </div>';
      $CRStyle .= '<h4 class="cr_title">'. $request->title .'</h4>';
      $CRStyle .= '<p class="cr_desc">'. $request->description .'</p>';
      $CRStyle .= '</div>';

      return response()->json([
        'success' => $success,
        'outPut' => $CRStyle,
      ], 200);
    }

  }

  /**
  * delete the ka.
  **/
  public function getDeleteCR(Request $request)
  {
    $cr = CustomerRelation::find($request->id)->delete();
    if ($cr) {
      //success message
      $success = 'the Customer Relation deleted Successfully';
      return response()->json([
        'successDelete' => $success,
      ], 200);
    }
  }
  /**
  * update the ka.
  **/
  public function UpdateCR(Request $request)
  {
    $this->validate($request, [
      'title'=> 'required|max:255',
      'description'=> 'min:4|max:500',
    ]);
    $canvas_id = $request->id;
    // dd($canvas_id);
    $success = '';
    $CRUpdate = CustomerRelation::find($canvas_id);
    $CRUpdate->cr_title = $request->title;
    $CRUpdate->cr_desc = $request->description;
    $canvasUpdate = $CRUpdate->update();
    if($canvasUpdate){
      $success = 'the Customer Relation successfully updated';
      return response()->json([
        'successUpdate' => $success,
      ], 200);
    }

  }

  /**
   * Show the canvas Views.
   **/
  public function postKR(Request $request)
  {
    $this->validate($request, [
      'title'=> 'required|max:255',
      'description'=> 'min:4|max:500',
    ]);
    $success = '';
    $KRStyle = '';
    $canvasId = $request->id;

    $storeCanvas = DB::table('key_resources')->insertGetId([
      'kr_title' => $request->title,
      'kr_desc' => $request->description,
      'BMC_id' => $canvasId,
    ]);
    if ($storeCanvas) {
      //success message
      $success = 'the Key Resources Addedd Successfully';
      // outputting
      $KRStyle = '<div class="callout callout-danger optionsKR" data-vp="'. $storeCanvas .'">';
      $KRStyle .= '<div class="card-optionKR">';
      $KRStyle .= '<span class="pull-right deleteKR"><i class="fa fa-close"></i></span>';
      $KRStyle .= '<span class="pull-right editKR"><i class="fa fa-edit"></i></span>';
      $KRStyle .= ' </div>';
      $KRStyle .= '<h4 class="kr_title">'. $request->title .'</h4>';
      $KRStyle .= '<p class="kr_desc">'. $request->description .'</p>';
      $KRStyle .= '</div>';

      return response()->json([
        'success' => $success,
        'outPut' => $KRStyle,
      ], 200);
    }

  }

  /**
  * delete the ka.
  **/
  public function getDeleteKR(Request $request)
  {
    $kr = KeyResource::find($request->id)->delete();
    if ($kr) {
      //success message
      $success = 'the Key Resources deleted Successfully';
      return response()->json([
        'successDelete' => $success,
      ], 200);
    }
  }
  /**
  * update the ka.
  **/
  public function UpdateKR(Request $request)
  {
    $this->validate($request, [
      'title'=> 'required|max:255',
      'description'=> 'min:4|max:500',
    ]);
    $canvas_id = $request->id;
    // dd($canvas_id);
    $success = '';
    $KRUpdate = KeyResource::find($canvas_id);
    $KRUpdate->kr_title = $request->title;
    $KRUpdate->kr_desc = $request->description;
    $canvasUpdate = $KRUpdate->update();
    if($canvasUpdate){
      $success = 'the Key Resources successfully updated';
      return response()->json([
        'successUpdate' => $success,
      ], 200);
    }

  }

  /**
   * Show the canvas Views.
   **/
  public function postCH(Request $request)
  {
    $this->validate($request, [
      'title'=> 'required|max:255',
      'description'=> 'min:4|max:500',
    ]);
    $success = '';
    $CHStyle = '';
    $canvasId = $request->id;

    $storeCanvas = DB::table('chaneels')->insertGetId([
      'ch_title' => $request->title,
      'ch_desc' => $request->description,
      'BMC_id' => $canvasId,
    ]);
    if ($storeCanvas) {
      //success message
      $success = 'the channels Addedd Successfully';
      // outputting
      $CHStyle = '<div class="callout callout-danger optionsCH" data-vp="'. $storeCanvas .'">';
      $CHStyle .= '<div class="card-optionCH">';
      $CHStyle .= '<span class="pull-right deleteCH"><i class="fa fa-close"></i></span>';
      $CHStyle .= '<span class="pull-right editCH"><i class="fa fa-edit"></i></span>';
      $CHStyle .= ' </div>';
      $CHStyle .= '<h4 class="ch_title">'. $request->title .'</h4>';
      $CHStyle .= '<p class="ch_desc">'. $request->description .'</p>';
      $CHStyle .= '</div>';

      return response()->json([
        'success' => $success,
        'outPut' => $CHStyle,
      ], 200);
    }

  }

  /**
  * delete the ka.
  **/
  public function getDeleteCH(Request $request)
  {
    $ch = Chaneel::find($request->id)->delete();
    if ($ch) {
      //success message
      $success = 'the chaneel deleted Successfully';
      return response()->json([
        'successDelete' => $success,
      ], 200);
    }
  }
  /**
  * update the ka.
  **/
  public function UpdateCH(Request $request)
  {
    $this->validate($request, [
      'title'=> 'required|max:255',
      'description'=> 'min:4|max:500',
    ]);
    $canvas_id = $request->id;
    // dd($canvas_id);
    $success = '';
    $CHUpdate = Chaneel::find($canvas_id);
    $CHUpdate->ch_title = $request->title;
    $CHUpdate->ch_desc = $request->description;
    $canvasUpdate = $CHUpdate->update();
    if($canvasUpdate){
      $success = 'the chaneel successfully updated';
      return response()->json([
        'successUpdate' => $success,
      ], 200);
    }
  }

  /**
   * Show the canvas Views.
   **/
  public function postCST(Request $request)
  {
    $this->validate($request, [
      'title'=> 'required|max:255',
      'description'=> 'min:4|max:500',
    ]);
    $success = '';
    $style = '';
    $canvasId = $request->id;

    $storeCanvas = DB::table('cost_structure')->insertGetId([
      'cst_title' => $request->title,
      'cst_desc' => $request->description,
      'BMC_id' => $canvasId,
    ]);
    if ($storeCanvas) {
      //success message
      $success = 'the cost structure  Addedd Successfully';
      // outputting
      $style = '<div class="callout callout-success optionsCST" style="width: 465px;" data-vp="'. $storeCanvas .'">';
      $style .= '<div class="card-optionCST">';
      $style .= '<span class="pull-right deleteCST"><i class="fa fa-close"></i></span>';
      $style .= '<span class="pull-right editCST"><i class="fa fa-edit"></i></span>';
      $style .= ' </div>';
      $style .= '<h4 class="cst_title">'. $request->title .'</h4>';
      $style .= '<p class="cst_desc">'. $request->description .'</p>';
      $style .= '</div>';

      return response()->json([
        'success' => $success,
        'outPut' => $style,
      ], 200);
    }

  }

  /**
  * delete the ka.
  **/
  public function getDeleteCST(Request $request)
  {
    $cst = CostStructure::find($request->id)->delete();
    if ($cst) {
      //success message
      $success = 'the cost structure deleted Successfully';
      return response()->json([
        'successDelete' => $success,
      ], 200);
    }
  }
  /**
  * update the ka.
  **/
  public function UpdateCST(Request $request)
  {
    $this->validate($request, [
      'title'=> 'required|max:255',
      'description'=> 'min:4|max:500',
    ]);
    $canvas_id = $request->id;
    // dd($canvas_id);
    $success = '';
    $update = CostStructure::find($canvas_id);
    $update->cst_title = $request->title;
    $update->cst_desc = $request->description;
    $canvasUpdate = $update->update();
    if($canvasUpdate){
      $success = 'the cost structure successfully updated';
      return response()->json([
        'successUpdate' => $success,
      ], 200);
    }
  }

  /**
   * Show the canvas Views.
   **/
  public function postRS(Request $request)
  {
    $this->validate($request, [
      'title'=> 'required|max:255',
      'description'=> 'min:4|max:500',
    ]);
    $success = '';
    $style = '';
    $canvasId = $request->id;

    $storeCanvas = DB::table('revenue_streams')->insertGetId([
      'rs_title' => $request->title,
      'rs_desc' => $request->description,
      'BMC_id' => $canvasId,
    ]);
    if ($storeCanvas) {
      //success message
      $success = 'the Revenue Streams Addedd Successfully';
      // outputting
      $style = '<div class="callout callout-success optionsRS" style="width: 465px;" data-vp="'. $storeCanvas .'">';
      $style .= '<div class="card-optionRS">';
      $style .= '<span class="pull-right deleteRS"><i class="fa fa-close"></i></span>';
      $style .= '<span class="pull-right editRS"><i class="fa fa-edit"></i></span>';
      $style .= ' </div>';
      $style .= '<h4 class="rs_title">'. $request->title .'</h4>';
      $style .= '<p class="rs_desc">'. $request->description .'</p>';
      $style .= '</div>';

      return response()->json([
        'success' => $success,
        'outPut' => $style,
      ], 200);
    }

  }

  /**
  * delete the ka.
  **/
  public function getDeleteRS(Request $request)
  {
    $rs = RevenueStream::find($request->id)->delete();
    if ($rs) {
      //success message
      $success = 'the Revenue Streams deleted Successfully';
      return response()->json([
        'successDelete' => $success,
      ], 200);
    }
  }
  /**
  * update the ka.
  **/
  public function UpdateRS(Request $request)
  {
    $this->validate($request, [
      'title'=> 'required|max:255',
      'description'=> 'min:4|max:500',
    ]);
    $canvas_id = $request->id;
    // dd($canvas_id);
    $success = '';
    $update = RevenueStream::find($canvas_id);
    $update->rs_title = $request->title;
    $update->rs_desc = $request->description;
    $canvasUpdate = $update->update();
    if($canvasUpdate){
      $success = 'the Revenue Streams successfully updated';
      return response()->json([
        'successUpdate' => $success,
      ], 200);
    }
  }
}
