<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CreateController extends Controller
{
    public function index(Request $request) {
      $user_id = Auth::id();

      $query_create = "INSERT INTO offers (city, seller, descr, user_id)
      VALUES ('".$_REQUEST['region']."', '".$_REQUEST['seller']."',
      '".$_REQUEST['descr']."', '".$user_id."')";

      $query_id = "SELECT id FROM offers ORDER BY id DESC LIMIT 1;";

      DB::select($query_create);
      $id_result = DB::select($query_id);


      for ($i=1;$i<=$_REQUEST['number'];$i++) {
        $query="INSERT INTO types (offer_id, name, total)
        VALUES ('".$id_result[0]->id."', '".$_REQUEST['model_name'.$i]."',
        '".$_REQUEST['number'.$i]."');";

        DB::select($query);
      }



      return redirect('/offer?id='.$id_result[0]->id);

    }
}
