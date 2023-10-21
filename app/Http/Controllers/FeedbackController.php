<?php

namespace App\Http\Controllers;

use App\Http\Requests\FeedbackRequest;
use App\Models\Feedback;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FeedbackController extends Controller
{
    public function create(FeedbackRequest $request, $id)
    {

        $data = $request->validated();
        $data['barber_id'] = $id;
        $data['username'] = Auth::user()->name;
        $data['user_id'] = $request->input('user_id');
        Feedback::Create($data);

        $Five = Feedback::where('status', 'Active')->where('star', '5')->where('barber_id', $id)->get();
        $Four = Feedback::where('status', 'Active')->where('star', '4')->where('barber_id', $id)->get();
        $Three = Feedback::where('status', 'Active')->where('star', '3')->where('barber_id', $id)->get();
        $Two = Feedback::where('status', 'Active')->where('star', '2')->where('barber_id', $id)->get();
        $One = Feedback::where('status', 'Active')->where('star', '1')->where('barber_id', $id)->get();

        $Fives = count($Five);
        $Fours = count($Four);
        $Threes = count($Three);
        $Twos = count($Two);
        $Ones = count($One);

        if ($Fives == '' && $Fours == '' && $Threes == '' && $Twos == '' && $Ones == '') {

            $Rating = 0;
        } else {
            $Sul = $Fives + $Fours + $Threes + $Twos + $Ones;
            $Jami = ($Fives * 5) + ($Fours * 4) + ($Threes * 3) + ($Twos * 2) + ($Ones);
            $Rating = $Jami / $Sul;
            $Rating = round($Rating, 1);
        }
        $barber = User::find($id);
        $dataa['rating'] = $Rating;
        $barber->update($dataa);

        return redirect()->route('SalonStaff', [$id, 0]);

    }
}
