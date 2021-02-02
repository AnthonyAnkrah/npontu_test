<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class PagesController extends Controller
{
  public function index(){
    return view('landing');
  }

  public function findTask(Request $request){
    $this->validate($request, [
      'search_value' => array('required', 'regex:/^[a-zA-Z0-9\s-]+$/'),
      'search_param' => 'alpha | required',
    ]);

    // select column name to match criteria
    switch ($request->input('search_param')) {

      case 'title':
      $column = 'farmer_id';
        $value = $request->input('search_value');
        break;

      case 'description':
      $column = 'fname';
      $value = $request->input('search_value');
      break;

      default:
        return redirect('/match')->with('error','Unknown search criteria.');
        break;
    }

    $allFarmers = [];
    // find task based on criteria provided
    if (gettype($value)!='string') {
      if (count($value)>0) {
        $allFarmers = Demographics::where($column,'like',$value)->get();
      }else {
        return redirect('/match')->with('error','One or more search parameters does not exist.');
      }
    }else {
      $allFarmers = Demographics::where($column,'like','%'.$value)
                        ->orWhere($column,'like','%'.$value.'%')
                        ->orWhere($column,'like',$value.'%')
                        ->get();
    }
    return view('pages.matchesFound')->with('allFarmers',$allFarmers);
  }

  // Preview emails
  public function preview(){
    $data = User::findOrFail(1);
    $portfolio = \App\Models\Portfolio::select('title')->where('id',$data->portfolio)->first();
    $portfolio = $portfolio->title;

    return new \App\Mail\userCreated($data,"something",$portfolio);
  }
}
