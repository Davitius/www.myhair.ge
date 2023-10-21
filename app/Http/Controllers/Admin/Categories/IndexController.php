<?php

namespace App\Http\Controllers\Admin\Categories;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoleaddRequest;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function index()
    {
        $Servicess = DB::table('roles')->orderBy('id', 'DESC')->get();
        $Services = DB::table('roles')->orderBy('id', 'DESC')->paginate(10);
        $Categories = DB::table('categories')->orderBy('spec')->get();
        $Categoriess = DB::table('categories')->orderBy('spec')->paginate(10);
        $allservice = count($Servicess);
        $allspec = count($Categories);
        $Statistic = ['allservice' => $allservice, 'allspec' => $allspec];

        return view('AdminPanel.Categories.index', compact('Services', 'Categories', 'Categoriess', 'Statistic'));

    }

    public function search(Request $request)
    {
        $Servicess = DB::table('roles')->orderBy('id', 'DESC')->get();
        $Categories = DB::table('categories')->get();
        $Categoriess = DB::table('categories')->paginate(5);
        $allservice = count($Servicess);
        $allspec = count($Categories);
        $Statistic = ['allservice' => $allservice, 'allspec' => $allspec];
        $search = $request->RoleSearch;
        $Services = Role::where('role', 'LIKE', "%{$search}%")->orderBy('service')->paginate(10);

        return view('AdminPanel.Categories.index', compact('Services', 'Categories', 'Categoriess', 'Statistic'));
    }

}
