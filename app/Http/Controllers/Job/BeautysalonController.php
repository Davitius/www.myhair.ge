<?php

namespace App\Http\Controllers\Job;

use App\Http\Controllers\Controller;
use App\Http\Requests\Job\SalonCreateRequest;
use App\Http\Requests\Job\SalonUpdateRequest;
use App\Http\Requests\Job\StaffAddRequest;
use App\Http\Requests\Job\StaffSearchRequest;
use App\Models\Citylist;
use App\Models\Salfeedback;
use App\Models\Staff;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Salon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use function Ramsey\Collection\Map\get;

class BeautysalonController extends Controller
{
    public function index()
    {
        $salon = DB::table('salons')->where('user_id', Auth::user()->id)->first();
//        $salon = Salon::where('user_id', Auth::user()->id)->first();


        $wDays = [
            "ორშაბათი",
            "სამშაბათი",
            "ოთხშაბათი",
            "ხუთშაბათი",
            "პარასკევი",
            "შაბათი .",
            "კვირა"
        ];
        $checkWD = [];
        foreach ($wDays as $wDay) {
            $searchWD = Salon::where('user_id', Auth::user()->id)->where('work_d', 'LIKE', "%{$wDay}%")->first();
            $checkWD[] = $searchWD;
        }

        $services = [
            "თმის შეჭრა, შეღებვა, ვარცხნილობა",
            "წვერის გაპარსვა",
            "მაკიაჟი",
            "მანიკური",
            "პედიკური",
            "წარბები და წამწამები",
            "სადღესასწაულო მაკიაჟი, ვარცხნილობა",
            "ტატუირება",
            "სპა",
            "ეპილაცია",
            "სოლარიუმი",
            "კანის მოვლა"
        ];
        $checkService = [];
        foreach ($services as $service) {
            $search = Salon::where('user_id', Auth::user()->id)->where('service', 'LIKE', "%{$service}%")->first();
            $checkService[] = $search;
        }


        if (isset($salon)) {
            $staffs = DB::table('users')->where('sal_id', $salon->id)->orderBy('saladdtime', 'DESC')->paginate(10);
            $citys = Citylist::orderBy('city')->get();
            return view('Job.Beautysalon', compact('salon', 'staffs', 'citys', 'checkService', 'checkWD'));
        }

        $citys = Citylist::orderBy('city')->get();

        return view('Job.Beautysalon', compact('salon', 'citys'));
    }


    public function search(StaffSearchRequest $request)
    {
        $search = $request->validated();
        $salon = DB::table('salons')->where('user_id', Auth::user()->id)->first();
        $staffs = DB::table('users')->where('sal_id', $salon->id)->orderBy('id')->paginate(10);
        $s_staffs = DB::table('users')->where('staffcode', $search['staffcode'])->get();

        $citys = Citylist::orderBy('city')->get();


        $wDays = [
            "ორშაბათი",
            "სამშაბათი",
            "ოთხშაბათი",
            "ხუთშაბათი",
            "პარასკევი",
            "შაბათი .",
            "კვირა"
        ];
        $checkWD = [];
        foreach ($wDays as $wDay) {
            $searchWD = Salon::where('user_id', Auth::user()->id)->where('work_d', 'LIKE', "%{$wDay}%")->first();
            $checkWD[] = $searchWD;
        }

        $services = [
            "თმის შეჭრა, შეღებვა, ვარცხნილობა",
            "წვერის გაპარსვა",
            "მაკიაჟი",
            "მანიკური",
            "პედიკური",
            "წარბები და წამწამები",
            "სადღესასწაულო მაკიაჟი, ვარცხნილობა",
            "ტატუირება",
            "სპა",
            "ეპილაცია",
            "სოლარიუმი",
            "კანის მოვლა"
        ];
        $checkService = [];
        foreach ($services as $service) {
            $search = Salon::where('user_id', Auth::user()->id)->where('service', 'LIKE', "%{$service}%")->first();
            $checkService[] = $search;
        }


        return view('Job.Beautysalon', compact('salon', 'staffs', 's_staffs', 'citys', 'checkService', 'checkWD'));
    }


    public function create(SalonCreateRequest $request)
    {
        $salon = DB::table('salons')->where('user_id', Auth::user()->id)->first();

        if (isset($salon)) {
            return redirect()->route('Job.Beautysalon');
        } else {
            $data = $request->validated();
            if ($request->file('photo') != '') {
                $data['photo'] = Storage::disk('public')->put('Salons', $request->file('photo'));
            }

            $wd = $request->input('monday') . '   ' . $request->input('tuesday') . '   ' . $request->input('wednesday') . '   ' . $request->input('thursday') . '   ' . $request->input('friday') . '   ' . $request->input('saturday') . '   ' . $request->input('sunday');
            $data['work_d'] = $wd;
            $Service = $request->input('11') . ' ' . $request->input('12') . ' ' . $request->input('13') . ' ' . $request->input('14') . ' ' . $request->input('15') . ' ' . $request->input('16') . ' ' . $request->input('17') . ' ' . $request->input('18') . ' ' . $request->input('19') . ' ' . $request->input('20') . ' ' . $request->input('21') . ' ' . $request->input('22');
            $data['service'] = $Service;
            $data['user_id'] = Auth::user()->id;
            $data['location'] = $request->input('location');

            unset($data['concent']);


            Salon::Create($data);

            return redirect()->route('Job.Beautysalon');
        }
    }


    public function update(SalonUpdateRequest $request)
    {
        $data = $request->validated();
        $salon = DB::table('salons')->where('user_id', Auth::user()->id)->first();
        $salonarry = Salon::find($salon->id);

        if ($request->file('photo') != '') {
            $AvatarFileName = $salon->photo;
            if (Storage::disk('public')->exists($AvatarFileName)) {
                Storage::disk('public')->delete($AvatarFileName);
            }
            $data['photo'] = Storage::disk('public')->put('Salons', $request->file('photo'));
        }
        $wd = $request->input('monday') . ' <br> ' . $request->input('tuesday') . ' <br> ' . $request->input('wednesday') . ' <br> ' . $request->input('thursday') . ' <br> ' . $request->input('friday') . ' <br> ' . $request->input('saturday') . ' <br> ' . $request->input('sunday');

        $data['work_d'] = $wd;
        $Service = $request->input('11') . ' ' . $request->input('12') . ' ' . $request->input('13') . ' ' . $request->input('14') . ' ' . $request->input('15') . ' ' . $request->input('16') . ' ' . $request->input('17') . ' ' . $request->input('18') . ' ' . $request->input('19') . ' ' . $request->input('20') . ' ' . $request->input('21') . ' ' . $request->input('22');
        $data['service'] = $Service;
        $data['user_id'] = Auth::user()->id;
        $data['location'] = $request->input('location');

        unset($data['concent']);

        $salonarry->update($data);

        return redirect()->route('Job.Beautysalon', compact('salon'));
    }





    public function delete()
    {
        $salon = Salon::where('user_id', Auth::user()->id)->first();
        Salfeedback::where('sal_id', $salon->id)->delete();
        Salon::find($salon->id)->delete();

        $AvatarFileName = $salon->photo;
        if (Storage::disk('public')->exists($AvatarFileName)) {
            Storage::disk('public')->delete($AvatarFileName);
        }

        $user = User::find(Auth::user()->id);
        $data['sal_id'] = null;
        $user->update($data);

        return redirect()->route('Job.Beautysalon');
    }
}
