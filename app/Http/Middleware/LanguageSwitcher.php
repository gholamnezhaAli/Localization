<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

class LanguageSwitcher
{

    public function handle(Request $request, Closure $next)
    {
        $lang = Route::current()->parameter("lang");

        if($lang){
            App::setLocale($lang);
        }else{
            App::setLocale("en");
        }


        return $next($request);
    }
}
