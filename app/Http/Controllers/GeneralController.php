<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Carbon;

class GeneralController extends Controller
{
    public function changeLanguage($locale)
    {

        try{

            if(array_key_exists($locale,config('locale.languages')))
            {


                Session::put('locale',$locale);
                App::setlocale($locale);
                return redirect()->backe();
            }


        }catch(\Exception $exception){

            return redirect()->back();
        }
    }
}
