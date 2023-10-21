<?php

namespace App\Http\Controllers;

use App\Http\Requests\SalfeedbacksRequest;
use App\Models\Salfeedback;
use App\Models\Salon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SalfeedbacksController extends Controller
{
    public function create(SalfeedbacksRequest $request, $id)
    {

        $data = $request->validated();
        $data['sal_id'] = $id;
        $data['username'] = Auth::user()->name;
        $data['user_id'] = $request->input('user_id');
        Salfeedback::Create($data);

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

        if ($Fives == '' && $Fours == '' && $Threes == '' && $Twos == '' && $Ones == '') {
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
