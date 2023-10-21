<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class MainRegisterController extends Controller
{
    public function index($r)
    {
        $this->setLang();

        return view('auth.register');
    }
}
