<?php

namespace App\Http\Controllers\Job;

use App\Http\Controllers\Controller;
use App\Models\Staff;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class StaffCodeController extends Controller
{
    public function update()
    {
        $user = User::find(Auth::user()->id);
        $user->update([
            'staffcode' => Str::random(10),
        ]);

        return redirect()->route('Job');
    }


    public function delete($id)
    {
        $asd = DB::table('staff')->where('user_id', $id)->get();
        foreach ($asd as $dsa)
            $staff = Staff::find($dsa->id);
        $staff->delete();

        return redirect()->route('Job');
    }
}


