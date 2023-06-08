<?php

namespace App\Http\Controllers;

use App\Models\ContentType;
use Illuminate\Http\Request;

class ContentTypeController extends Controller
{
    public function index()
    {
        $contentTypes = ContentType::all();
        return view('content-type.index', compact('contentTypes'));
    }

    public function create(Request $request)
    {
        $validator = Validator($request->all(), [
            'name' => 'required|unique:content_types,name',
            'description' => 'nullable|string|max:255',
        ]);

        if ($validator->fails()) {
            $this->flashMessageValidatorError($validator->errors()->messages());
            return redirect()->back()->withErrors($validator)->withInput();
        }

        ContentType::create([
            'name' => $request->name,
            'description' => $request->description,
            'status' => 'active',
        ]);

        return redirect()->back()->with('success', 'Content type created successfully.');
    }
}
