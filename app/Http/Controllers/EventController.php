<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Salon;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use function Sodium\compare;

class EventController extends Controller
{
    public function create(Request $request, $id)
    {
        $barber = User::find($id);
        $salon = Salon::find($barber->sal_id);
        $data['start'] = $request->input('start');
        $data['end'] = $request->input('end');

        $data['start_ms'] = $request->input('start_ms');
        $data['dur_ms'] = $request->input('dur_ms');
        $data['end_ms'] = $data['start_ms'] + $data['dur_ms'];

        $data['startdate'] = $request->input('startdate');
        $data['starthour'] = $request->input('starthour');

        $data['service'] = $request->input('service');
        $data['title'] = Auth::user()->name;
        $data['user_id'] = Auth::user()->id;
        $data['barber_id'] = $id;
        $data['barber'] = $barber->firstname . ' ' . $barber->lastname;
        $data['salon'] = $salon->name;

        $checkEvents = DB::table('events')->orderBy('start_ms')->where('start_ms', '>', $data['start_ms'])->first();

        $weekDays = ['კვირა', 'ორშაბათ', 'სამშაბათ', 'ოთხშაბათ', 'ხუთშაბათ', 'პარასკევ', 'შაბათი '];
        $kvirisDghe = $weekDays[$request->input('kvirisDghe')];
        $searchDay = Salon::where('id', $barber->sal_id)->where('work_d', 'LIKE', "%{$kvirisDghe}%")->first();


        if ($searchDay == null) {
            $mass = 2; // ვიზიტს ჯავშნით არასამუშაო დღეს !
            return redirect()->route('SalonStaff', [$id, $mass]);
        }

        if (isset($checkEvents->start_ms) && ($checkEvents->start_ms < $data['end_ms'])) {
            $mass = 1; // თქვენი მომსახურების დრო აღემატება თავისუფალ დროს!
            return redirect()->route('SalonStaff', [$id, $mass]);
        }

        Event::create($data);

        $mass = 3; // ვიზიტი წარმატებით დაიჯავშნა. იხილეთ თქვენი ჯავშნები "ლონკი"
        return redirect()->route('SalonStaff', [$id, $mass]);

    }
}
