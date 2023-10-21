<?php

namespace App\Http\Controllers\Job\Staff;

use App\Http\Controllers\Controller;
use App\Http\Requests\Job\Staff\StaffFlipPhotoRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class FlipPhotoController extends Controller
{
    public function update(StaffFlipPhotoRequest $request)
    {
        $user = User::find(Auth::user()->id);
        $data = $request->validated();

//$this->flipphoto('Staff', 6, Auth::user());

        for ($i = 1; $i <6; $i++) {
            $flipphoto = 'flipphoto' . $i;
            if ($request->file($flipphoto) != '') {
                $flipPhotos = Auth::user()->$flipphoto;
                if (Storage::disk('public')->exists($flipPhotos)) {
                    Storage::disk('public')->delete($flipPhotos);
                }
                $data[$flipphoto] = Storage::disk('public')->put('StaffFlipPhotos', $request->file($flipphoto));
            }
        }


        $user->update($data);

        return redirect()->route('Staff');
    }
}
