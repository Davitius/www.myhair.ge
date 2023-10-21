<?php

namespace App\Http\Controllers\Job\Salon;

use App\Http\Controllers\Controller;
use App\Http\Requests\Job\Salon\SalonFlipPhotoRequest;
use App\Http\Requests\Job\Staff\StaffFlipPhotoRequest;
use App\Models\Salon;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class FlipPhotoController extends Controller
{
    public function update(SalonFlipPhotoRequest $request, $id)
    {
        $salon = Salon::find($id);
        $data = $request->validated();

        for ($i = 1; $i <6; $i++) {
            $flipphoto = 'flipphoto' . $i;
            if ($request->file($flipphoto) != '') {
                $flipPhotos = $salon->$flipphoto;
                if (Storage::disk('public')->exists($flipPhotos)) {
                    Storage::disk('public')->delete($flipPhotos);
                }
                $data[$flipphoto] = Storage::disk('public')->put('SalonFlipPhotos', $request->file($flipphoto));
            }
        }



        $salon->update($data);

        return redirect()->route('Job.Beautysalon');

    }
}
