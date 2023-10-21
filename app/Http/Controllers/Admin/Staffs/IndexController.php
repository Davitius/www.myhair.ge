<?php

namespace App\Http\Controllers\Admin\Staffs;

use App\Http\Controllers\Controller;
use App\Models\Staff;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class IndexController extends Controller
{
    public function index()
    {
        $Staffs = DB::table('users')->where('sal_id', '!=', 'null')->paginate(10);
        $ActiveAllStaffs = DB::table('users')->where('sal_id', '!=', 'null')->where('status', 'Active')->get();
        $ActiveStaffs = DB::table('users')->where('staffstatus', 'Staff')->where('status', 'Active')->get();

        $all = count($ActiveAllStaffs);
        $Staff = count($ActiveStaffs);
        $Manager = $all - $Staff;
        $Statistic = ['all' => $all, 'Staff' => $Staff, 'Manager' => $Manager];

        return view('AdminPanel.Staffs.index', compact('Staffs', 'Statistic'));
    }


    public function search(Request $request)
    {
        $ActiveAllStaffs = DB::table('users')->where('sal_id', '!=', 'null')->where('status', 'Active')->get();
        $ActiveStaffs = DB::table('users')->where('staffstatus', 'Staff')->where('status', 'Active')->get();

        $all = count($ActiveAllStaffs);
        $Staff = count($ActiveStaffs);
        $Manager = $all - $Staff;
        $Statistic = ['all' => $all, 'Staff' => $Staff, 'Manager' => $Manager];

        $search = $request->StaffSearch;
        $Staffs = User::where('sal_id', '!=', 'null')->where('staffcode', 'LIKE', "%{$search}%")->orderBy('id', 'desc')->paginate(10);

        return view('AdminPanel.Staffs.index', compact('Staffs', 'Statistic'));
    }


    public function edit($id)
    {
        $Staffs = DB::table('users')->where('id', $id)->get();

        return view('AdminPanel.Staffs.edit', compact('Staffs'));
    }


    public function update(Request $request, $id)
    {
        $Staff = User::find($id);
        $status = $request->input('status');
        $data['status'] = $status;
        $Staff->update($data);

        return redirect()->route('AdminPanel.Staffs');
    }
}
