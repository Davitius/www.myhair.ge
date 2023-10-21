<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Citylist;
use App\Models\Salon;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $this->setLang();

        $city = '';
        $Search = $request->input('search');
        $search = Salon::where('name', 'LIKE', "%{$Search}%")->orderBy('id', 'DESC')->paginate(15);
        $citys = Citylist::orderBy('city')->get();


        return view('search', compact('search', 'city', 'Search', 'citys'));

    }
}
