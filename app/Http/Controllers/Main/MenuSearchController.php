<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Citylist;
use App\Models\Salon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MenuSearchController extends Controller
{
    public function search(Request $request)
    {
        $city = $request->input('location');
//        dd($city);
        $MenuSearch = $request->input('MenuSearch');
        $search = Salon::where('service', 'LIKE', "%{$MenuSearch}%")->where('location', $city)->orderBy('id', 'DESC')->paginate(15);
        $citys = Citylist::orderBy('city')->get();


        return view('/MenuSearch', compact('search', 'MenuSearch', 'city', 'citys'));
    }
}
