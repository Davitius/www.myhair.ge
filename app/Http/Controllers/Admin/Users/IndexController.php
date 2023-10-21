<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use App\Models\Salon;
use App\Models\Staff;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class IndexController extends Controller
{
    public function index()
    {
        $Users = User::orderBy('id', 'DESC')->paginate(10);
        $ActiveUsers = DB::table('users')->where('status', 'Active')->get();
        $UserCount = User::orderBy('id', 'DESC')->get();
        $all = count($UserCount);
        $Active = count($ActiveUsers);
        $Disable = $all - $Active;
        $Statistic = ['all' => $all, 'Active' => $Active, 'Disable' => $Disable];

        return view('AdminPanel.Users.index', compact('Users', 'Statistic'));
    }


    public function search(Request $request)
    {
        $UserCount = User::orderBy('id', 'DESC')->get();
        $ActiveUsers = DB::table('salons')->where('status', 'Active')->get();
        $all = count($UserCount);
        $Active = count($ActiveUsers);
        $Disable = $all - $Active;
        $Statistic = ['all' => $all, 'Active' => $Active, 'Disable' => $Disable];

        $search = $request->UserSearch;
        $Users = User::where('name', 'LIKE', "%{$search}%")->orderBy('id', 'desc')->paginate(10);

        return view('AdminPanel.Users.index', compact('Users', 'Statistic'));
    }


    public function edit($id)
    {
        $Users = DB::table('users')->where('id', $id)->get();

        return view('AdminPanel.Users.edit', compact('Users'));
    }


    public function update(Request $request, $id)
    {
        $User = User::find($id);
        $status = $request->input('status');
        $data['status'] = $status;
        $User->update($data);

        return redirect()->route('AdminPanel.Users');
    }


    public function delete($id)
    {
        $user = User::find($id);
        $salon = DB::table('salons')->where('user_id', $id)->first();
        if (isset($salon)) {
            $salonarry = Salon::find($salon->id);
            $AvatarFileName = $salon->photo;
            if (Storage::disk('public')->exists($AvatarFileName)) {
                Storage::disk('public')->delete($AvatarFileName);
            }
            $salonarry->delete();
        }
        $user->delete();

        return redirect()->route('AdminPanel.Users');
    }
}
