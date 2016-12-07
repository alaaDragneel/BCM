<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Html;
use App\TeamWork;
use App\Company;
use App\BMC;
use App\KeyPartener;
use App\KeyActivity;
use App\ValuePorposition;
use App\CustomerRelation;
use App\KeyResource;
use App\Chaneel;
use App\CustomerSegment as CS;
use App\CostStructure;
use App\RevenueStream;
use App\countries as Country;
use DB;

class bmcCanvasController extends Controller
{
  /**
  * Show the canvas Views.
  **/
  public function getCanvas($canvas_id)
  {
    $canvas = BMC::where('id', $canvas_id)->first();
    $this->authorize('modify', $canvas);
    $KP = KeyPartener::where('bmc_id', $canvas_id)->get();
    $KA = KeyActivity::where('bmc_id', $canvas_id)->get();
    $VP = ValuePorposition::where('bmc_id', $canvas_id)->get();
    $CR = CustomerRelation::where('bmc_id', $canvas_id)->get();
    $KR = KeyResource::where('bmc_id', $canvas_id)->get();
    $CH = Chaneel::where('bmc_id', $canvas_id)->get();
    $CS = CS::where('bmc_id', $canvas_id)->get();
    $CST = CostStructure::where('bmc_id', $canvas_id)->get();
    $RS = RevenueStream::where('bmc_id', $canvas_id)->get();
    $contries = Country::all();
    return view('frontend.canvas.bmc', compact('canvas', 'KP', 'KA', 'VP', 'CR', 'KR', 'CH', 'CS', 'contries', 'CST', 'RS'));
  }


  public function postKP(Request $request)
  {
    $this->validate($request, [
      'name'=> 'required|max:255',
      'desc'=> 'min:4|max:500',
    ]);
    $success = '';
    $KAStyle = '';
    /*company table save*/
      $company = new Company();
      $company->name = $request->name;
      $company->description = $request->desc;
      $company->save();
    /*company table save*/
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
      $KAStyle .= '<div class="clearfix"></div>';
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

  public function getTeamWork(Request $request)
  {
    $keyWord = $request->word;
    $membersName = TeamWork::where(function($q) use($keyWord) {
      $q->where('name', 'LIKE', "$keyWord%");
    })->get();

    $members = '';

    foreach($membersName as $member){
      $members .= '<div class="memberInfo">';
      $members .= '<input type="hidden" value="'. $member->id .'"/>';
      $members .= '<img class="img-responsive memberImg pull-left" width="70" src="'.asset( $member->image).'"/>';
      $members .= '<h4 class="pull-left memebrName"><i class="fa fa-user"></i>'. $member->name .'</h4>';
      $members .= '<div class="clearfix"></div>';
      $members .= '<p class="pull-left memebrJob"><i class="fa fa-briefcase"></i>'. $member->job .'</p>';
      $members .= '<div class="clearfix"></div>';
      $members .= '</div>';
    }

    return response()->json(['membersName' => $members]);
  }

  /**
  * Show the canvas Views.
  **/
  public function postKA(Request $request)
  {
    $this->validate($request, [
      'memberName'=> 'required',
      'job'=> 'required',
      'ka_title'=> 'required',
    ]);
    $success = '';
    $KAStyle = '';
    // info
    $id         = $request->id;
    $memberName = $request->memberName;
    $job        = $request->job;
    $ka_title   = $request->ka_title;
    $ka_desc    = $request->ka_desc;
    $canvasId   = $request->bmc_id;
    //store
    $storeCanvas = DB::table('key_activity')->insertGetId([
      'ka_memper'     => $memberName,
      'ka_member_job' => $job,
      'ka_memeber_id' => $id,
      'ka_title' => $ka_title,
      'ka_desc' => $ka_desc,
      'BMC_id' => $canvasId,
    ]);
    if ($storeCanvas) { //success message

         $KAStyle .= '<div class="callout callout-info optionsKA" data-ka="'. $storeCanvas .'">';
               $KAStyle .= '<div class="card-option">';
                    $KAStyle .= '<span><i class="fa fa-edit editKA" data-target="#editActivityModal" data-toggle="modal"></i></span>';
                    $KAStyle .= '<span><i class="fa fa-close deleteKA"></i></span>';
                    $KAStyle .= '<span><i class="fa fa-info moreDetails"></i></span>';
                    $KAStyle .= '<span class="hidden" id="membersId">'. $id .'</span>';
               $KAStyle .= '</div>';
               $KAStyle .= '<div class="memberInfoTag">';
                    $KAStyle .= '<h5  class="name" style="font-size: 15px;"><i class="fa fa-user"></i>'.
                    $memberName.'</h5>';
                    $KAStyle .= '<div class="clearfix"></div>';
                         $KAStyle .= '<div class="details">';
                         $KAStyle .= '<p class="job"><i class="fa fa-briefcase"></i>'. $job .'</p>';
                         $KAStyle .= '<div class="clearfix"></div>';
                         if ($ka_title) {
                           $KAStyle .= '<p class="ka_title"><i class="fa fa-briefcase"></i>'. $ka_title .'</p>';
                           $KAStyle .= '<div class="clearfix"></div>';
                         }
                         if ($ka_desc) {
                           $KAStyle .= '<p class="ka_desc"><i class="fa fa-briefcase"></i>'. $ka_desc .'</p>';
                         }
                         $KAStyle .= '</div>';
               $KAStyle .= '</div>';
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
    return view('frontend.canvas.bmc', compact('canvas', 'KA'));
  }

  /**
  * update the ka.
  **/
  public function UpdateKA(Request $request)
  {
    $this->validate($request, [
      'memberName'=> 'required',
      'job'=> 'required',
      'ka_title'=> 'required',
    ]);

    // info
    $id         = $request->id;
    $memberName = $request->memberName;
    $job        = $request->job;
    $ka_title   = $request->ka_title;
    $ka_desc    = $request->ka_desc;
    $member_id  = $request->member_id;

    $success = '';
    $KAUpdate = KeyActivity::find($id);
    $KAUpdate->ka_memper = $memberName;
    $KAUpdate->ka_member_job = $job;
    $KAUpdate->ka_title = $ka_title;
    $KAUpdate->ka_desc = $ka_desc;
    $KAUpdate->ka_memeber_id = $member_id;
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
      $VPStyle .= '<div class="clearfix"></div>';
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
    return view('frontend.canvas.bmc', compact('canvas', 'KA', 'vp'));
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
      $CRStyle .= '<div class="clearfix"></div>';
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
      $KRStyle .= '<div class="clearfix"></div>';
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
        $CHStyle .= '<div class="clearfix"></div>';
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
  public function postCS(Request $request)
  {
    $this->validate($request, [
      'gender'=> 'required|alpha',
      'ageFrom'=> 'required|numeric',
      'ageTo'=> 'required|numeric',
      'location'=> 'required',
      'governorates'=> 'required',
      'cities'=> 'required',
    ]);
    $success = '';
    $CHStyle = '';
    $canvasId = $request->id;
    $gender = $request->gender;
    $ageFrom = $request->ageFrom;
    $ageTo = $request->ageTo;
    $location = $request->location;
    $governorates = $request->governorates;
    $cities = $request->cities;

    $storeCanvas = DB::table('customer_segments')->insertGetId([
      'gender' => $gender,
      'ageFrom' => $ageFrom,
      'ageTo' => $ageTo,
      'country' => $location,
      'governorate' => $governorates,
      'city' => $cities,
      'BMC_id' => $canvasId,
    ]);



    if ($storeCanvas) {
      //success message
      $success = 'the customer Segments Addedd Successfully';
      // outputting
      $CHStyle = '    <div class="callout callout-danger optionsCS" data-cs="'.$storeCanvas.'">';
      $CHStyle .= '<div class="card-optionCS">';
      $CHStyle .= '<span class="pull-right infoCS"><i class="fa fa-info"></i></span>';
      $CHStyle .= '<span class="pull-right deleteCS"><i class="fa fa-close"></i></span>';
      $CHStyle .= '<span class="pull-right editCS"><i class="fa fa-edit"></i></span>';
      $CHStyle .= '</div>';
      $CHStyle .= '<h4 class="titles">gender</h4>';
      $CHStyle .= '<div class="clearfix"></div>';
      $CHStyle .= '<div class="infoCSDiv">';
      $CHStyle .= '<p class="genderVal">'.$gender.'</p>';
      $CHStyle .= '<div class="clearfix"></div>';
      $CHStyle .= '<h4 class="titles">ageFrom</h4>';
      $CHStyle .= '<div class="clearfix"></div>';
      $CHStyle .= '<p class="ageFrom">'.$ageFrom.'</p>';
      $CHStyle .= '<div class="clearfix"></div>';
      $CHStyle .= '<h4 class="titles">Age To</h4>';
      $CHStyle .= '<div class="clearfix"></div>';
      $CHStyle .= '<p class="ageTo">'.$ageTo.'</p>';
      $CHStyle .= '<div class="clearfix"></div>';
      $CHStyle .= '<h4 class="titles">Country</h4>';
      $CHStyle .= '<div class="clearfix"></div>';
      $CHStyle .= '<p class="country">'.$location.'</p>';
      $CHStyle .= '<div class="clearfix"></div>';
      $CHStyle .= '<h4 class="titles">governorate</h4>';
      $CHStyle .= '<div class="clearfix"></div>';
      $CHStyle .= '<p class="governorate">'.$governorates.'</p>';
      $CHStyle .= '<div class="clearfix"></div>';
      $CHStyle .= '<h4 class="titles">city</h4>';
      $CHStyle .= '<div class="clearfix"></div>';
      $CHStyle .= '<p class="city">'.$cities.'</p>';
      $CHStyle .= '</div>';
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
  public function getDeleteCS(Request $request)
  {
    $ch = CS::find($request->id)->delete();
    if ($ch) {
      //success message
      $success = 'the Customer Segment deleted Successfully';
      return response()->json([
        'successDelete' => $success,
      ], 200);
    }
  }
  /**
  * update the ka.
  **/
  public function UpdateCS(Request $request)
  {
    $this->validate($request, [
      'gender'=> 'required|alpha',
      'ageFrom'=> 'required|numeric',
      'ageTo'=> 'required|numeric',
      'location'=> 'required',
      'governorates'=> 'required',
      'cities'=> 'required',
    ]);
    $canvas_id = $request->id;
    $gender = $request->gender;
    $ageFrom = $request->ageFrom;
    $ageTo = $request->ageTo;
    $location = $request->location;
    $governorates = $request->governorates;
    $cities = $request->cities;
    $success = '';
    $CSUpdate = CS::find($canvas_id);
    $CSUpdate->gender = $gender;
    $CSUpdate->ageFrom = $ageFrom;
    $CSUpdate->ageTo = $ageTo;
    $CSUpdate->country = $location;
    $CSUpdate->governorate = $governorates;
    $CSUpdate->city = $cities;
    $canvasUpdate = $CSUpdate->update();
    if($canvasUpdate){
      $success = 'the Customer Segment successfully updated';
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
      $style .= '<div class="clearfix"></div>';
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
      $style .= '<div class="clearfix"></div>';
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
