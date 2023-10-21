<?php

namespace App\Http\Controllers\Job;

use App\Http\Controllers\Controller;
use App\Models\Staff;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SalonStaffController extends Controller
{
    public function create($id)
    {
        $staff = DB::table('users')->where('id', $id)->first();
        $salon = DB::table('salons')->where('user_id', Auth::user()->id)->first();
        $data = ['sal_id' => $salon->id, 'user_id' => $id, 'firstname' => $staff->firstname, 'lastname' => $staff->lastname, 'staffcode' => $staff->staffcode];

        Staff::Create($data);

        return redirect()->route('Job.Beautysalon');
    }


    public function edit($id)
    {
        $staff = DB::table('users')->where('id', $id)->get();

        return view('Job.StaffEdit', compact('staff'));
    }


    public function update(Request $request, $id)
    {
        $staff = User::find($id);
        $data['staffstatus'] = $request->input('status');
        $staff->update($data);

        return redirect()->route('Job.Beautysalon');
    }
}
