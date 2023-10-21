<?php

namespace App\Http\Controllers\Admin\Staffs;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class RemoveController extends Controller
{
    public function update($id)
    {
        $user = User::find($id);
        $data = ['sal_id' => null, 'staffstatus' => null, 'saladdtime' => null];

        $user->update($data);

        return redirect()->route('AdminPanel.Staffs');
    }
}
