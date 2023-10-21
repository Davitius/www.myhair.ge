<?php

namespace App\Http\Controllers\Job\Events;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EventController extends Controller
{
    public function index()
    {
        $ActiveRes = Event::where('barber_id', Auth::user()->id)->where('finished', 'falce')->orderBy('start', 'ASC')->paginate(20);
        $Reservs = Event::where('barber_id', Auth::user()->id)->where('finished', 'true')->orderBy('updated_at', 'DESC')->paginate(5);
        $Reservss = Event::where('barber_id', Auth::user()->id)->where('finished', 'true')->orderBy('start', 'DESC')->get();

        $CountActiveRes = count($ActiveRes);
        $CountReservs = count($Reservss);

        $job = Event::where('barber_id', Auth::user()->id)->where('status', 'done')->get();


        $Data = ['ActiveRes' => $ActiveRes, 'Reservs' => $Reservs, 'CountActiveRes' => $CountActiveRes, 'CountReservs' => $CountReservs];

        return view('Job.Events.index', compact('Data', 'job'));
    }
}
