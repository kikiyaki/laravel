<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OfferController extends Controller
{
    public function index(Request $request) {

      $offer_id = $_REQUEST['id'];

      $offer_query = "select * from offers
      where id=".$offer_id.";";

      $offer_result = DB::select($offer_query);

      $models_query = "select * from types
      where offer_id=".$offer_id.";";

      $models_results = DB::select($models_query);

      $joins_query = "select offer_id, type_id, number from joins
       where offer_id=".$offer_id.";";

      $joins_results = DB::select($joins_query);

      $number_joins = 0;

      return view('offer', ['number_joins'=>$number_joins])
      ->with('offer_result', $offer_result)
      ->with('models_results', $models_results)
      ->with('joins_results', $joins_results);
    }
}
