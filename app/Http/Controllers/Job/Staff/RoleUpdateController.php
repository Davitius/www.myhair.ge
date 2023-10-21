<?php

namespace App\Http\Controllers\Job\Staff;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleUpdateController extends Controller
{
    public function update(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $data['role'] = $request->input('spec');
        $user->update($data);

        return redirect()->route('Staff');
    }
}
