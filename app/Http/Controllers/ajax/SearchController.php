<?php

namespace App\Http\Controllers\ajax;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{
  public function index(Request $request) {

    $let = $request->get('letters');

    $results = DB::select("(SELECT name FROM city WHERE name LIKE '".$let."%' LIMIT 3)
    UNION
    (SELECT name FROM region WHERE name LIKE '".$let."%' LIMIT 2);");

    $results_array = [];
    $i = 1;
    foreach ($results as $key=>$value) {
    $results_array['result'.$i] = $value->name;

    $i++;
    }

    return response()->json($results_array);

  }
}
