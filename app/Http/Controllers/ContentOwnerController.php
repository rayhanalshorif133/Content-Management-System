<?php

namespace App\Http\Controllers;

use App\Models\ContentOwner;
use Illuminate\Http\Request;

class ContentOwnerController extends Controller
{
    public function index()
    {
        return view('content-owner.index');
    }

    public function create()
    {
        return view('content-owner.create');
    }

    public function store(Request $request)
    {

        $validator = Validator($request->all(), [
            'name' => 'required',
            'email' => 'required|unique:content_owners',
            'phone' => 'required|min:11|max:13|unique:content_owners',
            'address' => 'required',
        ]);

        if ($validator->fails()) {
            $this->flashMessageValidatorError($validator->errors()->getMessages());
            return redirect()->back()->withInput();
        }



        $contentOwner = new ContentOwner();
        $contentOwner->name = $request->name;
        $contentOwner->email = $request->email;
        $contentOwner->phone = $request->phone;
        $contentOwner->address = $request->address;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image->storeAs('public/content-owner', $image->getClientOriginalName());
            $contentOwner->image = $image->getClientOriginalName();
        }

        if ($contentOwner->save()) {
            $this->flashMessageSuccess('Content Owner created successfully.');
            return redirect()->route('content-owner.index');
        } else {
            $this->flashMessageError('Content Owner creation failed.');
            return redirect()->back();
        }
    }
}
