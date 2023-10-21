<?php

namespace App\Http\Controllers\Job;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SalonStaffRemoveController extends Controller
{
    public function update($id)
    {

        $user = User::find($id);
        $data = ['sal_id' => null, 'staffstatus' => null, 'saladdtime' => null];

        $user->update($data);

        return redirect()->route('Job.Beautysalon');

    }
}
