<?php

namespace App\Http\Controllers;

use App\Models\Salfeedback;
use App\Models\Salon;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    use AuthorizesRequests, ValidatesRequests;

    public function setLang() {
        if (isset($_COOKIE['language'])) {
            App::setlocale($_COOKIE['language']);
        }else{
            App::setlocale('ge');
        }
    }

    public function salonDelete($ownerId) {
            //        salon query.
        $salon = Salon::where('user_id', $ownerId)->first();
        if (isset($salon)) {
            //        salon coments delete.
            Salfeedback::where('sal_id', $salon->id)->delete();
            //        staff dismissal.
            $staffdata['sal_id'] = null;
            $staffdata['staffstatus'] = null;
            User::where('sal_id', $salon->id)->update($staffdata);
            //        salon fotos delete.
            if (Storage::disk('public')->exists($salon->photo)) {
                Storage::disk('public')->delete($salon->photo);
            }
            //        salon flipfotos delete.
            for ($i = 1; $i < 6; $i++) {
                $flipphoto = 'flipphoto' . $i;
                if (Storage::disk('public')->exists($salon->$flipphoto)) {
                    Storage::disk('public')->delete($salon->$flipphoto);
                }
            }
            //        salon delete.
            Salon::find($salon->id)->delete();
        }
    }

//    უნივერსალური ფლიპფოტოს ასაქაჩი ფუნქცია (დასამთავრებელია!).
//    public function flipphoto($Name, $quantity, $query) {
//        for ($i = 1; $i < $quantity; $i++) {
//            $flipphoto = 'flipphoto' . $i;
//            $putName = $Name . 'FlipPhotos';
//            if ($request->file($flipphoto) != '') {
//                $flipPhotos = $query->$flipphoto;
//                if (Storage::disk('public')->exists($flipPhotos)) {
//                    Storage::disk('public')->delete($flipPhotos);
//                }
//                $data[$flipphoto] = Storage::disk('public')->put($putName, $request->file($flipphoto));
//            }
//        }
//    }
}
