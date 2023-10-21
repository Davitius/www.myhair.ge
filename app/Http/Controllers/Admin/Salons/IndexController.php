<?php

namespace App\Http\Controllers\Admin\Salons;

use App\Http\Controllers\Controller;
use App\Models\Salon;
use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class IndexController extends Controller
{
    public function index()
    {
        $Salons = Salon::orderBy('id', 'DESC')->paginate(5);
        $ActiveSalons = DB::table('salons')->where('status', 'Active')->get();
        $SalonCount = Salon::orderBy('id', 'DESC')->get();
        $all = count($SalonCount);
        $Active = count($ActiveSalons);
        $Disable = $all - $Active;
        $Statistic = ['all' => $all, 'Active' => $Active, 'Disable' => $Disable];

        return view('AdminPanel.Salons.index', compact('Salons', 'Statistic'));
    }


    public function search(Request $request)
    {
        $SalonCount = Salon::orderBy('id', 'DESC')->get();
        $ActiveSalons = DB::table('salons')->where('status', 'Active')->get();
        $all = count($SalonCount);
        $Active = count($ActiveSalons);
        $Disable = $all - $Active;
        $Statistic = ['all' => $all, 'Active' => $Active, 'Disable' => $Disable];

        $search = $request->SalonSearch;
        $Salons = Salon::where('name', 'LIKE', "%{$search}%")->orderBy('id', 'desc')->paginate(5);

        return view('AdminPanel.Salons.index', compact('Salons', 'Statistic'));
    }


    public function edit($id)
    {
        $Salons = DB::table('salons')->where('id', $id)->get();

        return view('AdminPanel.Salons.edit', compact('Salons'));
    }


    public function update(Request $request, $id)
    {
        $Salon = Salon::find($id);
        $status = $request->input('status');
        $data['status'] = $status;
        $Salon->update($data);

        return redirect()->route('AdminPanel.Salons');
    }


    public function delete($id)
    {
        $salon = DB::table('salons')->where('user_id', $id)->first();
        $salonarry = Salon::find($salon->id);
        $staffarry = Staff::where('sal_id', $salon->id);
        $AvatarFileName = $salon->photo;

        if (Storage::disk('public')->exists($AvatarFileName)) {
            Storage::disk('public')->delete($AvatarFileName);
        }

        $staffarry->delete();
        $salonarry->delete();

        return redirect()->route('AdminPanel.Salons');
    }

}
