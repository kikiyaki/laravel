<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
    //  $auth = Auth::check();

      if (isset($_REQUEST['seller'])) {

        $last_id = 0;
        $next = true;
        if (isset($_REQUEST['last_id'])) {
          $last_id = $_REQUEST['last_id'];
          if (isset($_REQUEST['back'])) {
            $next = false;
          }
        }

$query = "";
if ($next) {
$query = "select * from offers where (id IN
(select offer_id from types where name like '%".$_REQUEST['type']."%')
or descr like '%".$_REQUEST['type']."%'
)
and  seller like '%".$_REQUEST['seller']."%'
and city like '%".$_REQUEST['region']."%'
and id>".$last_id."
order by id desc LIMIT 10;";
} else {
  $query = "select * from offers where (id IN
  (select offer_id from types where name like '%".$_REQUEST['type']."%')
  or descr like '%".$_REQUEST['type']."%'
  )
  and  seller like '%".$_REQUEST['seller']."%'
  and city like '%".$_REQUEST['region']."%'
  and id<".$last_id."
  order by id desc LIMIT 10;";
}
$results = DB::select($query);

$models_query = "select id, offer_id, name, total from types
where offer_id in (0";

foreach ($results as $result) {
  $models_query.=",".($result->id);
}
$models_query.=");";

$models_results = DB::select($models_query);

$joins_query = "select offer_id, type_id, number from joins where offer_id in (0";
foreach ($results as $result) {
  $joins_query.=",".($result->id);
}
$joins_query.=");";

$joins_results = DB::select($joins_query);

$number_joins = 0;

      return view('results', ['region' => $_REQUEST['region'],
    'seller' => $_REQUEST['seller'],
    'type' => $_REQUEST['type'], 'number_joins'=>$number_joins])
    ->with('results', $results)
    ->with('models_results', $models_results)
    ->with('joins_results', $joins_results);


  }
      else
      return view('index', ['region' => '',
    'seller' => '',
    'type' => '']);
    }
}
