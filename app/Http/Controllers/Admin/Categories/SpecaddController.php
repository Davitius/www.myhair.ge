<?php

namespace App\Http\Controllers\Admin\Categories;

use App\Http\Controllers\Controller;
use App\Http\Requests\SpecaddRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class SpecaddController extends Controller
{
    public function create(SpecaddRequest $request)
    {
        $data = $request->validated();
        Category::Create($data);

        return redirect()->route('AdminPanel.Categories');
    }
}
