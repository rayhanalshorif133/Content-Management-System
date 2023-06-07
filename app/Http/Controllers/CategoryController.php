<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::select()
            ->with('subCategories')
            ->get();

        return view('category.index', compact('categories'));
    }



    public function store(Request $request)
    {
        if ($request->parent_category) {
            SubCategory::create([
                'name' => $request->name,
                'category_id' => $request->parent_category,
            ]);
        } else {
            Category::create([
                'name' => $request->name,
            ]);
        }

        Session::flash('message', 'Category Added Successfully');
        Session::flash('class', 'success');
        return redirect()->back();
    }

    public function edit($id)
    {
        return view('category.edit');
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function delete($id)
    {
        //
    }
}
