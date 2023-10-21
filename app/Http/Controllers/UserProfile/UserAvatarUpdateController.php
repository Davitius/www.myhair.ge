<?php

namespace App\Http\Controllers\UserProfile;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserProfile\UserAvatarUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserAvatarUpdateController extends Controller
{
    public function update(UserAvatarUpdateRequest $request)
    {
//        dd('yoo');
        $user = User::find(Auth::user()->id);
        $data = $request->validated();

        if ($request->file('photo') != '') {
            $AvatarFileName = Auth::user()->photo;

            if (Storage::disk('public')->exists($AvatarFileName)) {
                Storage::disk('public')->delete($AvatarFileName);
            }
            $data['photo'] = Storage::disk('public')->put('Avatars', $request->file('photo'));
        }

        $user->update($data);

        return redirect()->route('UserProfile');
    }
}
