<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\ProSearch;
use App\Company;
use App\KeyPartener;
use App\Governorates;
use App\Cities;
use DB;
class ProSearchController extends Controller
{
  public function getAjaxResults(Request $request)
  {
    // get the search word
    $searchWordWithAjax = $request['body'];
    /**
    * @return companies form www.professearch.com Companies DataBase
    * @return the companies By Business Type Or By Company Name
    * @return Objects
    */
    $searchResultsWithAjax = ProSearch::where("business_type" , 'like', "$searchWordWithAjax%")
    ->orWhere("company_name", 'like', "$searchWordWithAjax%")
    ->orderBy('company_name', 'ASC')
    ->get();
    /**
    * @var if the www.professearch.com Companies DataBase @return empty!!
    */
    if($searchResultsWithAjax->isEmpty()) {
      /**
      * @return companies form www.ilgudi.com Companies DataBase
      * @return the companies By name Type
      * @return Objects
      */
      $searchResultsWithAjax = Company::where("name" , 'like', "$searchWordWithAjax%")
      ->orderBy('name', 'ASC')
      ->get();

      $AjaxResult = '';
      // loop the data from the www.ilgudi.com DB
      foreach($searchResultsWithAjax as $results){
        $AjaxResult .=
        '
        <input type="hidden" value="'. $results->id .'"/>
        <button type="button" class="btn btn-primary btn-sm pull-right requestBtn">request</button>
        <div class="userInfo">
        <h4 class="fullName"><i class="fa fa-user"></i> '. $results->name .'</h4><div class="clearfix"></div>';

        if($results->description){
          $AjaxResult .= '
          <p class="Desc"><i class="fa fa-black-tie"></i> '. $results->description .'</p>
        </div>
        ';
      }else {
        $AjaxResult .= '</div>';
      }

    }
    // return the response by json
    return response()->json(['results' => $AjaxResult], 200);
  } else {

    $AjaxResult = '';
    // loop the data from the www.professearch.com DB
    foreach($searchResultsWithAjax as $results){
      $AjaxResult .=
      '
      <input type="hidden" value="'. $results->id .'"/>
      <button type="button" class="btn btn-primary btn-sm pull-right requestBtn">request</button>
      <div class="userInfo">
        <h4 class="fullName">
          <i class="fa fa-user"></i> '. $results->company_name .'</h4><div class="clearfix"></div>';

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
  }

  public function AjaxBtnResults(Request $request)
  {
    $kp = '';
    $storeCanvas = DB::table('key_parteners')->insertGetId([
    'kp_name'  =>$request->name,
    'kp_email' =>$request->email,
    'kp_job' =>$request->job,
    'kp_desc' =>$request->desc,
    'BMC_id' => $request->bmc_id,
    ]);

    $kp .= '<div class="callout callout-info optionsKP" data-kp="'. $storeCanvas .'">';
      $kp .= '<div class="card-optionKP">';
        $kp .= '<span class="pull-right deleteKP"><i class="fa fa-close"></i></span>';
        $kp .= '</div>';
        $kp .= '<h4 class="fullName"><i class="fa fa-user"></i> '.  $request->name  .'</h4>';
        if ($request->email) {
          $kp .= '<h4 class="email"><i class="fa fa-envelope"></i> '. $request->email .'</h4>';
        }
        if ($request->job) {
          $kp .=  '<h4 class="job"><i class="fa fa-briefcase"></i> '. $request->job   .'</h4>';
        }
        $kp .= '<p class="Desc"><i class="fa fa-black-tie"></i> '.   $request->desc .'</p>';
        $kp .= '</div>';

        if ($storeCanvas) {
          // return the response by json
          return response()->json(['resultsBtn' => $kp], 200);
        }

      }

      public function getAjaxGovernorates(Request $request)
      {
        $area = $request->area;
        $Governorates = Governorates::select('id', 'name')->where('country_id', $area)->get();
        $results ='<select class="form-control" id="cities"> ';
          $results .='<option>select Governorates</option>';
          foreach ($Governorates as $Governorate) {
            $results .=
            '
            <option value="'. $Governorate->id .'">'. $Governorate->name .'</option>
            ';
          }
          $results .= '</select>';
          // return the response by json
          return response()->json(['ResultsCompanies' => $results], 200);

        }
        public function getAjaxCities(Request $request)
        {
          $area = $request->area;
          $city = Cities::select('id', 'name')->where('governorates_id', $area)->get();
          $results ='<select class="form-control" id="city"> ';
            $results .='<option>select city</option>';
            foreach ($city as $city) {
              $results .=
              '
              <option value="'. $city->id .'">'. $city->name .'</option>
              ';
            }
            $results .= '</select>';
            // return the response by json
            return response()->json(['ResultsCompanies' => $results], 200);

          }
        }
