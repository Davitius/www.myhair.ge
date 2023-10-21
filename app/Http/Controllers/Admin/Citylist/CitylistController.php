<?php

namespace App\Http\Controllers\Admin\Citylist;

use App\Http\Controllers\Controller;
use App\Models\Citylist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CitylistController extends Controller
{
    public function index()
    {
        $citys = Citylist::orderBy('city')->paginate(10);
//        $citys = DB::table('citylist')->get();

        return view('AdminPanel.Citylist.index', compact('citys'));
    }

    public function search(Request $request)
    {
        $search = $request->CitySearch;
        $citys = Citylist::where('city', 'LIKE', "%{$search}%")->orderBy('city')->paginate(10);


        return view('AdminPanel.Citylist.index', compact('citys'));

    }

    public function create(Request $request)
    {
        $data['city'] = $request->input('city');

        Citylist::Create($data);


        return redirect()->route('AdminPanel.Citylist');

    }


    public function delete($id)
    {

        $city = Citylist::find($id);

        $city->delete();

        return redirect()->route('AdminPanel.Citylist');
    }
}
