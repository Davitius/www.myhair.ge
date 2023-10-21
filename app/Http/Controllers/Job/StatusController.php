<?php

namespace App\Http\Controllers\Job;

use App\Http\Controllers\Controller;
use App\Models\Salon;
use App\Models\Staff;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class StatusController extends Controller
{
    public function index()
    {
        if (Auth::user()->sal_id != null) {
            $salName = Salon::find(Auth::user()->sal_id);
            $salonName = $salName->name;
            return view('Job.index', compact('salonName'));
        }
        $salonName = '';
        return view('Job.index', compact('salonName'));
    }


    public function update()
    {
        $user = User::find(Auth::user()->id);
        $data = request()->validate([
            'access' => 'string'
        ]);
        if (request()->input('access') != 'Manager') {
        //            salonDelete($ownerId)
            $this->salonDelete(Auth::user()->id);
        }
        $user->update($data);

        return redirect()->route('Job');
    }
}
