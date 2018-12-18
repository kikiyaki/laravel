<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class JoinController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

    public function index(Request $request) {

      $user_id = Auth::id();

      $query_check = "SELECT id, number FROM joins WHERE type_id=".$_REQUEST['model_id'].";";
      $query = "";

      $result = DB::select($query_check);

      if (empty($result)) {
        $query = "INSERT INTO joins (user_id, offer_id, type_id, number)
        VALUES (".$user_id.", ".$_REQUEST['offer_id'].", ".$_REQUEST['model_id'].",
        ".$_REQUEST['amount'].");";
      } else {
        $query = "UPDATE joins SET number=".($result[0]->number+$_REQUEST['amount'])."
        WHERE id=".$result[0]->id.";";

      }

     DB::select($query);

     return redirect()->back();

    }
}
