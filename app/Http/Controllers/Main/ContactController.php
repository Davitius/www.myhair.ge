<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $this->setLang();
        $menu = 'კონტაქტი';

        return view('contact', compact('menu'));
    }
}
