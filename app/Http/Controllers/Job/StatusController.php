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
            $salon = DB::table('salons')->where('user_id', Auth::user()->id)->first();
            if (isset($salon)) {
                $salonarry = Salon::find($salon->id);
                $AvatarFileName = $salon->photo;
                if (Storage::disk('public')->exists($AvatarFileName)) {
                    Storage::disk('public')->delete($AvatarFileName);
                }
                $salonarry->delete();
                $data['sal_id'] = null;
                $data['staffstatus'] = null;
            }
        }

        $user->update($data);

        return redirect()->route('Job');
    }
}
