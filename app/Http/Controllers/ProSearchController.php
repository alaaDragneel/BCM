<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\ProSearch;
use App\KeyPartener;
use DB;
class ProSearchController extends Controller
{
  public function getAjaxResults(Request $request)
  {
    // get the search word
    $searchWordWithAjax = $request['body'];

    $searchResultsWithAjax = ProSearch::where("business_type" , 'like', "$searchWordWithAjax%")
    ->orWhere("company_name", 'like', "$searchWordWithAjax%")
    ->orderBy('company_name', 'ASC')
    ->get();
    $AjaxResult = '';
    // loop the data
    foreach($searchResultsWithAjax as $results){
      $AjaxResult .=
      '
      <input type="hidden" value="'. $results->id .'"/>
      <button type="button" class="btn btn-primary btn-sm pull-right requestBtn">request</button>
      <div class="userInfo">
      <h4 class="fullName"><i class="fa fa-user"></i> '. $results->company_name .'</h4><div class="clearfix"></div>';

      $AjaxResult .='<h4 class="email"><i class="fa fa-envelope"></i> '. $results->website .'</h4><div class="clearfix"></div>
      ';
      if($results->business_type){
        $AjaxResult .= '
        <h4 class="job"><i class="fa fa-briefcase"></i> '. $results->business_type .'</h4><div class="clearfix"></div>
        ';
      }

      if($results->address){
        $AjaxResult .= '
        <p class="Desc"><i class="fa fa-black-tie"></i> '. $results->address .'</p>
        </div>
        ';
      }else {
        $AjaxResult .= '</div>';
      }

    }
    // return the response by json
    return response()->json(['results' => $AjaxResult], 200);
  }

  public function AjaxBtnResults(Request $request)
  {

    $storeCanvas = DB::table('key_parteners')->insertGetId([
    'kp_name'  =>$request->name,
    'kp_email' =>$request->email,
    'kp_job' =>$request->job,
    'kp_desc' =>$request->desc,
    'BMC_id' => $request->bmc_id,
    ]);
    if ($storeCanvas) {
      // return the response by json
      return response()->json(['resultsBtn' => $storeCanvas], 200);
    }

  }

  public function getAjaxCompanies(Request $request)
  {
    $area = $request->area;
    $companies = ProSearch::select('Username')->where('Address', $area)->get();
    $results ='<select class="form-control"> ';

      foreach ($companies as $company) {
        $results .=
        '
        <option value="'. $company->Username .'">'. $company->Username .'</option>
        ';
      }
      $results .= '</select>';
      // return the response by json
      return response()->json(['ResultsCompanies' => $results], 200);

    }
  }
