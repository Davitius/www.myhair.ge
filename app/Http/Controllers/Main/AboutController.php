<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $this->setLang();
        $menu = 'ჩვენს შესახებ';

        return view('about', compact('menu'));
    }
}
