<?php
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'HomeController@index');
Route::get('/offer', 'OfferController@index');

Route::post('/search', 'ajax\SearchController@index');
Route::post('/join', 'JoinController@index');
Route::post('/add', 'AddController@index');
Route::post('/create', 'CreateController@index');

Route::get('/cabinet', 'CabinetController@index');
Route::get('/out', function() {
  Auth::logout();
  return redirect()->back();
});

Route::get('/new_offer', function(){
  return view('create');
})->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
