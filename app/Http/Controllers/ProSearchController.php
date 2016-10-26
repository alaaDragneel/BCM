<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\ProSearch;

class ProSearchController extends Controller
{
    public function getAjaxResults(Request $request)
    {
         // get the search word
         $searchWordWithAjax = $request['body'];

         $searchResultsWithAjax = ProSearch::select('id','Fullname','PhoneNo', 'email', 'Job', 'Describtion')
          ->where('Type', '1') // type 1 == companies
          ->where("Job" , 'like', "$searchWordWithAjax%")
          ->orWhere("Fullname", 'like', "$searchWordWithAjax%")
          ->orderBy('Fullname', 'ASC')
          ->get();
         $AjaxResult = '';
           // loop the data
           foreach($searchResultsWithAjax as $results){
             $AjaxResult .=
             '
             <input type="hidden" value="'. $results->id .'"/>
             <button type="button" class="btn btn-primary btn-sm pull-right requestBtn">request</button>
               <div class="userInfo">
                 <h4 class="fullName"><i class="fa fa-user"></i> '. $results->Fullname .'</h4><div class="clearfix"></div>';
                 if($results->PhoneNo){
                   $AjaxResult .=' <h4 class="num"><i class="fa fa-phone"></i> '. $results->PhoneNo .'</h4><div class="clearfix"></div>';
                 }

                   $AjaxResult .='<h4 class="email"><i class="fa fa-envelope"></i> '. $results->email .'</h4><div class="clearfix"></div>
                 ';
                 if($results->Job){
                      $AjaxResult .= '
                      <h4 class="job"><i class="fa fa-briefcase"></i> '. $results->Job .'</h4><div class="clearfix"></div>
                      ';
                 }

               if($results->Describtion){
                $AjaxResult .= '
                <p class="Desc"><i class="fa fa-black-tie"></i> '. $results->Describtion .'</h4></p>
                </div>
                ';
               }else {
                    $AjaxResult .= '</div>';
               }

           }
           // return the response by json
           return response()->json(['results' => $AjaxResult], 200);
    }

    public function getAjaxBtnResults(Request $request)
    {
      // get the search word
      $id = $request['id'];

      $searchBtnResults= ProSearch::select('Fullname','PhoneNo', 'email', 'Job', 'Describtion')
      ->where("id" , '=', "$id")
      ->get();
      $AjaxResult = '';
      // loop the data
      foreach($searchBtnResults as $results){
        $AjaxResult .='
        <div class="userInfo">
        <h4 class="fullName"><i class="fa fa-user"></i> '. $results->Fullname .'</h4><div class="clearfix"></div>';
        if($results->PhoneNo){
          $AjaxResult .=' <h4 class="num"><i class="fa fa-phone"></i> '. $results->PhoneNo .'</h4><div class="clearfix"></div>';
        }

        $AjaxResult .='<h4 class="email"><i class="fa fa-envelope"></i> '. $results->email .'</h4><div class="clearfix"></div>';
        if($results->Job){
          $AjaxResult .= '
          <h4 class="job"><i class="fa fa-briefcase"></i> '. $results->Job .'</h4><div class="clearfix"></div>';
        }

        if($results->Describtion){
          $AjaxResult .= '
          <p class="Desc"><i class="fa fa-black-tie"></i> '. $results->Describtion .'</p>
          </div>';
        }else {
          $AjaxResult .= '</div>';
        }
      }
      // return the response by json
      return response()->json(['resultsBtn' => $AjaxResult], 200);
    }

    public function getAjaxCompanies(Request $request)
    {
      $area = $request->area;
      // dd($area);
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
