<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

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




Route::get('/greeting/{locale}', function ($locale) {


    if (!in_array($locale, ['en', 'es', 'fr'])) {

        abort(400);
    }

    Session::put('locale', $locale);

    app()->setLocale($locale);

});


Route::get('/language', function () {

//   /* app()->setLocale(Session::get('locale'));
//    dd(app()->getLocale());*/

});


Route::group(['middleware'=>'language'],function ()
{

    Route::get('/{lang?}', function ($lang = null) {
        //app()->setLocale(Session::get('locale'));
        return view('welcome');
    });


});
