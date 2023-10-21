<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Citylist;
use App\Models\Salon;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function index()
    {
        $this->setLang();

        if (Auth::user() && Auth::user()->email_verified_at == '')
        {
            return view('auth.verify');
        }


        $BestUsers = User::where('status', 'Active')->where('rating', '>=', 1)->where('sal_id', '!=', null)->get();
        $citys = Citylist::orderBy('city')->get();

        $menu = 'მთავარი';

        return view('index', compact('BestUsers', 'citys', 'menu'));
    }

}
