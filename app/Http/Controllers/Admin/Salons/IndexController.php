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
        $ActiveSalons = Salon::where('status', 'Active')->get();
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
        $ActiveSalons = Salon::where('status', 'Active')->get();
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
        $Salons = Salon::where('id', $id)->get();

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


    public function delete($ownerId)
    {
        $this->salonDelete($ownerId);

        return redirect()->route('AdminPanel.Salons');
    }

}
