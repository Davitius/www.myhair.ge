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

        if ($request->file('flipphoto1') != '') {
            $StaffFlipPhoto1 = $salon->flipphoto1;
            if (Storage::disk('public')->exists($StaffFlipPhoto1)) {
                Storage::disk('public')->delete($StaffFlipPhoto1);
            }
            $data['flipphoto1'] = Storage::disk('public')->put('SalonFlipPhotos', $request->file('flipphoto1'));
        }

        if ($request->file('flipphoto2') != '') {
            $StaffFlipPhoto2 = $salon->flipphoto2;
            if (Storage::disk('public')->exists($StaffFlipPhoto2)) {
                Storage::disk('public')->delete($StaffFlipPhoto2);
            }
            $data['flipphoto2'] = Storage::disk('public')->put('SalonFlipPhotos', $request->file('flipphoto2'));
        }

        if ($request->file('flipphoto3') != '') {
            $StaffFlipPhoto3 = $salon->flipphoto3;
            if (Storage::disk('public')->exists($StaffFlipPhoto3)) {
                Storage::disk('public')->delete($StaffFlipPhoto3);
            }
            $data['flipphoto3'] = Storage::disk('public')->put('SalonFlipPhotos', $request->file('flipphoto3'));
        }

        if ($request->file('flipphoto4') != '') {
            $StaffFlipPhoto4 = $salon->flipphoto4;
            if (Storage::disk('public')->exists($StaffFlipPhoto4)) {
                Storage::disk('public')->delete($StaffFlipPhoto4);
            }
            $data['flipphoto4'] = Storage::disk('public')->put('SalonFlipPhotos', $request->file('flipphoto4'));
        }

        if ($request->file('flipphoto5') != '') {
            $StaffFlipPhoto5 = $salon->flipphoto5;
            if (Storage::disk('public')->exists($StaffFlipPhoto5)) {
                Storage::disk('public')->delete($StaffFlipPhoto5);
            }
            $data['flipphoto5'] = Storage::disk('public')->put('SalonFlipPhotos', $request->file('flipphoto5'));
        }

        $salon->update($data);

        return redirect()->route('Job.Beautysalon');

    }
}
