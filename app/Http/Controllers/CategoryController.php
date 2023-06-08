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

    public function fetchDetails($id)
    {
        $category = Category::select()
            ->where('id', $id)
            ->with('subCategories')
            ->first();

        return $this->respondWithSuccess("successfully fetch category data", $category);
    }





    public function create(Request $request)
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

        $this->flashMessageSuccess('Category Created Successfully');
        return redirect()->back();
    }

    public function edit($id)
    {
        $category = Category::select()
            ->where('id', $id)
            ->with('subCategories')
            ->first();

        return view('category.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        if ($category) {
            $category->update([
                'name' => $request->name,
                'description' => $request->description,
                'status' => $request->status
            ]);
            if ($request->subCatIdAndNames) {
                foreach ($request->subCatIdAndNames as $key => $value) {
                    SubCategory::where('id', $key)->update([
                        'name' => $value,
                    ]);
                }
            }
            $this->flashMessageSuccess('Category Updated Successfully');
            return redirect()->route('category.index');
        }
    }

    public function delete($id)
    {
        //
    }
}
