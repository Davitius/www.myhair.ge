<?php

namespace App\Http\Controllers\Job\Events;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ManagerEventsController extends Controller
{
    public function index(Request $request, $tanamshId)
    {

        if ($request->input('pers') == '' && Auth::user()->staffstatus == 'Manager') {

            if ($request->input('pers') != '') {
                $barberId = $request->input('pers');
            } else {
                $barberId = $tanamshId;
            }

            $ActiveRes = DB::table('events')->where('barber_id', $barberId)->where('finished', 'falce')->orderBy('start', 'ASC')->paginate(10);
            $Reservs = DB::table('events')->where('barber_id', $barberId)->where('finished', 'true')->orderBy('updated_at', 'DESC')->paginate(10);
            $Reservss = DB::table('events')->where('barber_id', $barberId)->where('finished', 'true')->orderBy('start', 'DESC')->get();
            $personals = DB::table('users')->where('sal_id', Auth::user()->sal_id)->get();
            $personal = User::find($barberId);
            $CountActiveRes = count($ActiveRes);
            $CountReservs = count($Reservss);

            $job = DB::table('events')->where('barber_id', $barberId)->where('status', 'done')->get();

            $Data = ['ActiveRes' => $ActiveRes, 'Reservs' => $Reservs, 'CountActiveRes' => $CountActiveRes, 'CountReservs' => $CountReservs, 'personals' => $personals];

//                        dd($barberId);

            return view('Job.Events.Manager.index', compact('Data', 'personal', 'job', 'barberId'));

        } elseif ($request->input('pers') != '' && Auth::user()->staffstatus == 'Manager') {

            $pers = User::find($request->input('pers'));

            if (Auth::user()->staffstatus == 'Manager' && Auth::user()->sal_id == $pers->sal_id) {

                if ($request->input('pers') != '') {
                    $barberId = $request->input('pers');

                } else {
                    $barberId = Auth::user()->id;
                }


                $ActiveRes = DB::table('events')->where('barber_id', $barberId)->where('finished', 'falce')->orderBy('start', 'ASC')->paginate(10);
                $Reservs = DB::table('events')->where('barber_id', $barberId)->where('finished', 'true')->orderBy('updated_at', 'DESC')->paginate(10);
                $Reservss = DB::table('events')->where('barber_id', $barberId)->where('finished', 'true')->orderBy('start', 'DESC')->get();
                $personals = DB::table('users')->where('sal_id', Auth::user()->sal_id)->get();
                $personal = User::find($barberId);
                $CountActiveRes = count($ActiveRes);
                $CountReservs = count($Reservss);

                $job = DB::table('events')->where('barber_id', $barberId)->where('status', 'done')->get();

                $Data = ['ActiveRes' => $ActiveRes, 'Reservs' => $Reservs, 'CountActiveRes' => $CountActiveRes, 'CountReservs' => $CountReservs, 'personals' => $personals];

                return view('Job.Events.Manager.index', compact('Data', 'personal', 'job', 'barberId'));

            } else {
                return redirect()->route('/');
            }
        } else {
            return redirect()->route('/');
        }
    }
}
