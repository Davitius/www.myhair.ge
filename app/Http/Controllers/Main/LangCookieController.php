<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LangCookieController extends Controller
{
    public function create($language) {
        setcookie('language', $language, time() + 3600*24, "/");

        return redirect()->route('/');
    }
}
