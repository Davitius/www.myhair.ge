<?php

namespace App\Http\Controllers;

use App\Models\Salfeedback;
use App\Models\Salon;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SalonController extends Controller
{
    public function index($id)
    {
        $this->setLang();

        $Salon = Salon::find($id);
        $Staffs = DB::table('users')->where('sal_id', $id)->paginate(12);

//        if(Auth::user() && Auth::user()->sal_id == $id) {
            $feedbacks = DB::table('salfeedbacks')->where('sal_id', $id)->where('status', 'Active')->orderBy('created_at', 'DESC')->paginate(6);
//        } else {
//            $feedbacks = DB::table('salfeedbacks')->where('sal_id', $id)->where('status', 'Active')->orderBy('created_at', 'DESC')->paginate(6);
//
//        }
        if (Auth::user()) {
            $check = DB::table('salfeedbacks')->where('sal_id', $id)->where('user_id', Auth::user()->id)->where('status', 'Active')->get();
            $check2 = User::find(Auth::user()->id);
        } else {
            $check = [''];
            $check2 = [''];
        }
        $Five = DB::table('salfeedbacks')->where('status', 'Active')->where('star', '5')->where('sal_id', $id)->get();
        $Four = DB::table('salfeedbacks')->where('status', 'Active')->where('star', '4')->where('sal_id', $id)->get();
        $Three = DB::table('salfeedbacks')->where('status', 'Active')->where('star', '3')->where('sal_id', $id)->get();
        $Two = DB::table('salfeedbacks')->where('status', 'Active')->where('star', '2')->where('sal_id', $id)->get();
        $One = DB::table('salfeedbacks')->where('status', 'Active')->where('star', '1')->where('sal_id', $id)->get();

        $Fives = count($Five);
        $Fours = count($Four);
        $Threes = count($Three);
        $Twos = count($Two);
        $Ones = count($One);

        if ($Fives == '0' && $Fours == '0' && $Threes == '0' && $Twos == '0' && $Ones == '0') {

            $Stats = ['Ones' => 0, 'Twos' => 0, 'Threes' => 0, 'Fours' => 0, 'Fives' => 0, 'Sul' => 0, 'Rating' => 0,
                'PercentFive' => 0, 'PercentFour' => 0, 'PercentThree' => 0, 'PercentTwo' => 0, 'PercentOne' => 0];
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

            $Stats = ['Ones' => $Ones, 'Twos' => $Twos, 'Threes' => $Threes, 'Fours' => $Fours, 'Fives' => $Fives, 'Sul' => $Sul, 'Rating' => $Rating,
                'PercentFive' => $PercentFive, 'PercentFour' => $PercentFour, 'PercentThree' => $PercentThree, 'PercentTwo' => $PercentTwo, 'PercentOne' => $PercentOne];
        }

        return view('Salon', compact('Salon', 'Staffs', 'feedbacks', 'Stats', 'check', 'check2'));
    }


    public function delete($feedbackid)
    {
        $SalFeedback = Salfeedback::find($feedbackid);
        $id = $SalFeedback['sal_id'];
        $SalFeedback->delete();

        $Five = DB::table('salfeedbacks')->where('status', 'Active')->where('star', '5')->where('sal_id', $id)->get();
        $Four = DB::table('salfeedbacks')->where('status', 'Active')->where('star', '4')->where('sal_id', $id)->get();
        $Three = DB::table('salfeedbacks')->where('status', 'Active')->where('star', '3')->where('sal_id', $id)->get();
        $Two = DB::table('salfeedbacks')->where('status', 'Active')->where('star', '2')->where('sal_id', $id)->get();
        $One = DB::table('salfeedbacks')->where('status', 'Active')->where('star', '1')->where('sal_id', $id)->get();

        $Fives = count($Five);
        $Fours = count($Four);
        $Threes = count($Three);
        $Twos = count($Two);
        $Ones = count($One);

        if ($Fives == '0' && $Fours == '0' && $Threes == '0' && $Twos == '0' && $Ones == '0') {
            $Rating = 0;
        } else {
            $Sul = $Fives + $Fours + $Threes + $Twos + $Ones;
            $Jami = ($Fives * 5) + ($Fours * 4) + ($Threes * 3) + ($Twos * 2) + ($Ones);
            $Rating = $Jami / $Sul;
            $Rating = round($Rating, 1);
        }

        $Salon = Salon::find($id);
        $dataa['rating'] = $Rating;
        $Salon->update($dataa);

        return redirect()->route('Salon', $id);
    }
}
