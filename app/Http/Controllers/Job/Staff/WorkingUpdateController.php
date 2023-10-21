<?php

namespace App\Http\Controllers\Job\Staff;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WorkingUpdateController extends Controller
{
    public function update()
    {
        $user = User::find(Auth::user()->id);
        if (Auth::user()->dayoff == 'working') {
            $data['dayoff'] = 'dayoff';
        } else {
            $data['dayoff'] = 'working';
        }
        $user->update($data);

        return redirect()->route('Staff');
    }
}
