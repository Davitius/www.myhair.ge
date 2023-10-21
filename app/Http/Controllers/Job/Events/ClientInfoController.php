<?php

namespace App\Http\Controllers\Job\Events;

use App\Http\Controllers\Controller;
use App\Models\Salon;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ClientInfoController extends Controller
{
    public function index($id)
    {
        $Client = User::find($id);
        $salon = Salon::find(Auth::user()->sal_id);
        $salonName = $salon['name'];

        $Bvisits = DB::table('events')->where('salon', $salonName)->where('user_id', $id)->get();
        $CountBvisits = count($Bvisits);

        return view('Job.Events.Clientinfo.index', compact('Client', 'CountBvisits', 'salonName'));
    }
}
