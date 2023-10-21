<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class MainLoginController extends Controller
{
    public function index($l)
    {
        $this->setLang();

        return view('auth.login');
    }
}
