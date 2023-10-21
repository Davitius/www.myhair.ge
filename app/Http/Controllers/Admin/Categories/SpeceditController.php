<?php

namespace App\Http\Controllers\Admin\Categories;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use mysql_xdevapi\Table;

class SpeceditController extends Controller
{
    public function edit($id)
    {
        $Categories = DB::table('categories')->where('id', $id)->get();

        return view('AdminPanel.Categories.editspec', compact('Categories'));
    }

    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        $roles = Role::where('role', $category['spec']);
        $spec = $request->input('spec');
        $data['spec'] = $spec;
        $daata['role'] = $spec;
        $roles->update($daata);
        $category->update($data);

        return redirect()->route('AdminPanel.Categories');
    }

    public function delete($id)
    {
        $category = Category::find($id);
        $roles = Role::where('role', $category['spec']);
        $roles->delete();
        $category->delete();

        return redirect()->route('AdminPanel.Categories');
    }
}
