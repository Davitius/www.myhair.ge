<?php

namespace App\Http\Controllers\Admin\Categories;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoleaddRequest;
use App\Models\Category;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function index()
    {
        $Servicess = Role::orderBy('id', 'DESC')->get();
        $Services = Role::orderBy('id', 'DESC')->paginate(10);
        $Categories = Category::orderBy('spec')->get();
        $Categoriess = Category::orderBy('spec')->paginate(10);
        $allservice = count($Servicess);
        $allspec = count($Categories);
        $Statistic = ['allservice' => $allservice, 'allspec' => $allspec];

        return view('AdminPanel.Categories.index', compact('Services', 'Categories', 'Categoriess', 'Statistic'));

    }

    public function search(Request $request)
    {
        $Servicess = Role::orderBy('id', 'DESC')->get();
        $Categories = Category::get();
        $Categoriess = Category::paginate(5);
        $allservice = count($Servicess);
        $allspec = count($Categories);
        $Statistic = ['allservice' => $allservice, 'allspec' => $allspec];
        $search = $request->RoleSearch;
        $Services = Role::where('role', 'LIKE', "%{$search}%")->orderBy('service')->paginate(10);

        return view('AdminPanel.Categories.index', compact('Services', 'Categories', 'Categoriess', 'Statistic'));
    }

}
