<?php

namespace App\Http\Controllers\Job\Staff;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StaffController extends Controller
{
    public function index()
    {
        $role = Auth::user()->role;
        $userspecs = DB::table('roles')->where('role', $role)->get();
        $BarbAbils = DB::table('abilities')->where('barber_id', Auth::user()->id)->get();

        $specs = DB::table('categories')->orderBy('spec')->get();

        return view('Job.Staff.index', compact('specs', 'userspecs', 'BarbAbils'));
    }


    public function calendar()
    {
        return view('Job.Staff.calendar');
    }
}
