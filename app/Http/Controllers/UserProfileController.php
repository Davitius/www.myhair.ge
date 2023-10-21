<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserProfile\UserUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UserProfileController extends Controller
{
    public function index()
    {
        $id = Auth::user()->id;
        $user = User::find(Auth::user()->id);
        $feedbacks = DB::table('feedback')->where('barber_id', $id)->where('status', 'Active')->get();

        $ActiveRes = DB::table('events')->where('user_id', Auth::user()->id)->where('finished', 'falce')->orderBy('start', 'DESC')->get();
        $Reservss = DB::table('events')->where('user_id', Auth::user()->id)->where('finished', 'true')->orderBy('start', 'DESC')->get();
        $MyActiveEvents = DB::table('events')->where('barber_id', Auth::user()->id)->where('finished', 'falce')->orderBy('start', 'DESC')->get();

        $CountActiveRes = count($ActiveRes);
        $CountReservs = count($Reservss);
        $CountMyActiveEvents = count($MyActiveEvents);

        $Five = DB::table('feedback')->where('status', 'Active')->where('star', '5')->where('barber_id', $id)->get();
        $Four = DB::table('feedback')->where('status', 'Active')->where('star', '4')->where('barber_id', $id)->get();
        $Three = DB::table('feedback')->where('status', 'Active')->where('star', '3')->where('barber_id', $id)->get();
        $Two = DB::table('feedback')->where('status', 'Active')->where('star', '2')->where('barber_id', $id)->get();
        $One = DB::table('feedback')->where('status', 'Active')->where('star', '1')->where('barber_id', $id)->get();

        $feedbacks = count($feedbacks);
        $Fives = count($Five);
        $Fours = count($Four);
        $Threes = count($Three);
        $Twos = count($Two);
        $Ones = count($One);

        if ($Fives == '0' && $Fours == '0' && $Threes == '0' && $Twos == '0' && $Ones == '0') {

            $Stats = ['Ones' => 0, 'Twos' => 0, 'Threes' => 0, 'Fours' => 0, 'Fives' => 0, 'Sul' => 0, 'Rating' => 0,
                'PercentFive' => 0, 'PercentFour' => 0, 'PercentThree' => 0, 'PercentTwo' => 0, 'PercentOne' => 0,
                'CountActiveRes' => $CountActiveRes, 'CountReservs' => $CountReservs, 'CountMyActiveEvents' => $CountMyActiveEvents];
        } else {
            $Sul = $Fives + $Fours + $Threes + $Twos + $Ones;
            $Jami = ($Fives * 5) + ($Fours * 4) + ($Threes * 3) + ($Twos * 2) + ($Ones);
            $Rating = $Jami / $Sul;
            $Rating = round($Rating, 1);

            $PercentFive = ($Fives / $Sul) * 100;
            $PercentFive = round($PercentFive, 1);
            $PercentFour = ($Fours / $Sul) * 100;
            $PercentFour = round($PercentFour, 1);
            $PercentThree = ($Threes / $Sul) * 100;
            $PercentThree = round($PercentThree, 1);
            $PercentTwo = ($Twos / $Sul) * 100;
            $PercentTwo = round($PercentTwo, 1);
            $PercentOne = ($Ones / $Sul) * 100;
            $PercentOne = round($PercentOne, 1);

            $Stats = ['Ones' => $Ones, 'Twos' => $Twos, 'Threes' => $Threes, 'Fours' => $Fours, 'Fives' => $Fives, 'Sul' => $Sul,
                'Rating' => $Rating, 'PercentFive' => $PercentFive, 'PercentFour' => $PercentFour, 'PercentThree' => $PercentThree,
                'PercentTwo' => $PercentTwo, 'PercentOne' => $PercentOne, 'CountActiveRes' => $CountActiveRes,
                'CountReservs' => $CountReservs, 'CountMyActiveEvents' => $CountMyActiveEvents];
        }

        return view('UserProfile.index', compact('user', 'feedbacks', 'Stats'));
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
