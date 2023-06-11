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

    public function fetch($id)
    {
        $contentType = ContentType::find($id);
        return $this->respondWithSuccess('Content type fetched successfully.', $contentType);
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

        $this->flashMessageSuccess('Content type created successfully.');
        return redirect()->back();
    }

    public function update(Request $request)
    {
        $validator = Validator($request->all(), [
            'name' => 'required|unique:content_types,name,' . $request->content_type_id,
            'description' => 'nullable|string|max:255',
        ]);

        if ($validator->fails()) {
            $this->flashMessageValidatorError($validator->errors()->messages());
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $contentType = ContentType::find($request->content_type_id);
        $contentType->update([
            'name' => $request->name,
            'description' => $request->description,
            'status' => $request->status,
        ]);
        $this->flashMessageSuccess('Content type updated successfully.');
        return redirect()->back();
    }

    public function delete($id)
    {
        $contentType = ContentType::find($id);
        $contentType->delete();
        return $this->respondWithSuccess('Content type deleted successfully.');
    }
}
