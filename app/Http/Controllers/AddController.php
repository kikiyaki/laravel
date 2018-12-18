<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AddController extends Controller
{
    public function index(Request $request) {
      $query_update = "";

      $query_select = "SELECT number FROM joins WHERE id=".$_REQUEST['join_id'];
      $result_number = DB::select($query_select);
      $number = $result_number[0]->number;

        if (isset($_REQUEST['add'])) {
          $number+=$_REQUEST['amount'];
        } else {
          $number-=$_REQUEST['amount'];
        }

        if ($number <= 0) {
          $number = 0;
        }

      $query_update = "UPDATE joins SET number=".$number."
       WHERE id=".$_REQUEST['join_id'];

       DB::select($query_update);

       return redirect()->back();
    }
}
