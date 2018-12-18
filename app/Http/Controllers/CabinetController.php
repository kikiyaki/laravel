<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CabinetController extends Controller
{
    public function __construct() {
      $this->middleware('auth');
    }



    public function index(Request $request) {
      $user_id = Auth::id();

      $query_offers = "SELECT * FROM offers WHERE id IN
      (SELECT offer_id FROM joins WHERE user_id=".$user_id.")";

      $query_models = "SELECT * FROM types WHERE id IN
      (SELECT type_id FROM joins WHERE user_id=".$user_id.")";

      $query_joins = "SELECT * FROM joins WHERE user_id=".$user_id;

      $offers = DB::select($query_offers);

      $models = DB::select($query_models);

      $joins = DB::select($query_joins);

      $query_user = "SELECT name, email FROM users WHERE id=".$user_id;
      $user = DB::select($query_user);

      return view('cabinet')
      ->with('offers', $offers)
      ->with('models', $models)
      ->with('joins', $joins)
      ->with('user', $user);
    }
}
