<?php

namespace App\Http\Controllers\Job;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Salon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SalonStaffAddController extends Controller
{
    public function update($id)
    {

        $user = User::find($id);
        $sal_id = DB::table('salons')->where('user_id', Auth::user()->id)->first();
        $data = ['sal_id' => $sal_id->id, 'staffstatus' => 'Staff', 'saladdtime' => date_create()];

        $user->update($data);

        return redirect()->route('Job.Beautysalon');

    }
}
