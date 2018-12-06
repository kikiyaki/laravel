<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GroceryController extends Controller
{
  public function store(Request $request)
{
     
     return response()->json(['success'=>'Data is successfully added']);
}
}
