<?php

namespace App\Http\Middleware;


use Closure;
use Session;
use App;
use Carbon\Carbon;


class Locale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(config('locale.status')){

         if(Session::has('locale')&& array_key_exists(Session::get('locale'),config('locale.languages')) )  {

App::setlocale(Session::get('locale'));


         }
         else{

            $userlanguags= preg_split('/[,;]/',$request->server('HTTP_ACCEPT_LANGUAGE'));
            foreach($userlanguags as $language)
            {
                if(array_key_exists($language,config('locale.languages')))
                {
                    App::setLocale($language);

                    setlocale(LC_TIME,config('locale.languages')[$language][2]);
                    Carbon::setlocale(config('locale.languages')[$language][0]);

                    if(config('locale.languages')[$language][2]){

                        \session(['lang-rtl'=> true]);
                    }
                    else{

                    Session::forget('lang-rtl');
                 
                }
                break;
                }
            }
         }
        }
      
   
    return $next($request);
}
}