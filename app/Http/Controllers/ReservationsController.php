<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReservationsController extends Controller
{
    public function index()
    {

        $ActiveRes = DB::table('events')->where('user_id', Auth::user()->id)->where('finished', 'falce')->orderBy('start', 'ASC')->paginate(10);
        $Reservs = DB::table('events')->where('user_id', Auth::user()->id)->where('finished', 'true')->orderBy('updated_at', 'DESC')->paginate(10);
        $Reservss = DB::table('events')->where('user_id', Auth::user()->id)->where('finished', 'true')->orderBy('start', 'DESC')->get();

        $CountActiveRes = count($ActiveRes);
        $CountReservs = count($Reservss);

        $Data = ['ActiveRes' => $ActiveRes, 'Reservs' => $Reservs, 'CountActiveRes' => $CountActiveRes, 'CountReservs' => $CountReservs];

        return view('UserProfile.Reservations.index', compact('Data'));
    }
}
