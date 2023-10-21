<?php

namespace App\Http\Controllers\Job\Staff;

use App\Http\Controllers\Controller;
use App\Http\Requests\Job\Staff\AbilitiesRequest;
use App\Models\Ability;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AbilitiesController extends Controller
{
    public function create(AbilitiesRequest $request)
    {
//        dd('yoo');
        $data = $request->validated();
        $add = Ability::where('service', $data['service'])->where('barber_id', Auth::user()->id)->get();
        $Flag = count($add);
        if ($Flag == 0) {
            $data['barber_id'] = Auth::user()->id;
            $data['allminute'] = 0;
            $data['price'] = abs($request->input('price'));

            Ability::Create($data);

            return redirect()->route('Staff');
        }

        return redirect()->route('Staff');
    }


    public function delete($id)
    {
        $del = Ability::find($id);
        $del->delete();

        return redirect()->route('Staff');
    }
}
