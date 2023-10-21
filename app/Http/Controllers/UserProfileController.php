<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserProfile\UserUpdateRequest;
use App\Models\Event;
use App\Models\Salon;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class UserProfileController extends Controller
{
    public function index()
    {
        $id = Auth::user()->id;
        $user = User::find($id);

        $ActiveRes = Event::where('user_id', $id)->where('finished', 'falce')->get();
        if (isset($ActiveRes)){
            $CountActiveRes = count($ActiveRes);
        }else{$CountActiveRes = 0;}

        $MyActiveEvents = Event::where('barber_id', $id)->where('finished', 'falce')->get();
        if (isset($MyActiveEvents)){
            $CountMyActiveEvents = count($MyActiveEvents);
        }else{$CountMyActiveEvents = 0;}

        $Salon = Salon::where('user_id', $id)->first();
        if (isset($Salon)) {
            $SalEvents = Event::where('salon', $Salon->name)->where('finished', 'falce')->get();
            $CountSalonEvents = count($SalEvents);
        }else{$CountSalonEvents = 'noSalon';}


        $Stats = ['CountActiveRes' => $CountActiveRes, 'CountMyActiveEvents' => $CountMyActiveEvents, 'CountSalonEvents' => $CountSalonEvents];


        return view('UserProfile.index', compact('user','Stats'));
    }

    public function edit()
    {
        $guest = user::find(Auth::user()->id);

        return view('UserProfile.userupdate', compact('guest'));
    }

    public function update(UserUpdateRequest $request)
    {
        $user = User::find(Auth::user()->id);
        $data = $request->validated();

        $user->update($data);

        return redirect()->route('UserProfile');
    }


}
