<?php

namespace App\Http\Controllers;

use App\Models\ContentOwner;
use Illuminate\Http\Request;

class ContentOwnerController extends Controller
{
    public function index()
    {
        $contentOwners = ContentOwner::all();
        return view('content-owner.index', compact('contentOwners'));
    }


    public function store(Request $request)
    {

        $validator = Validator($request->all(), [
            'name' => 'required|unique:content_owners',
        ]);

        if ($validator->fails()) {
            $this->flashMessageValidatorError($validator->errors()->getMessages());
            return redirect()->back()->withInput();
        }



        $contentOwner = new ContentOwner();
        $contentOwner->name = $request->name;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = date('Y_m_d_H_i_s_') .  $image->getClientOriginalName();
            $image->move('upload/content-owner', $imageName);
            $contentOwner->image = 'upload/content-owner/' . $imageName;
        }

        if ($contentOwner->save()) {
            $this->flashMessageSuccess('Content Owner created successfully.');
            return redirect()->route('content-owner.index');
        } else {
            $this->flashMessageError('Content Owner creation failed.');
            return redirect()->back();
        }
    }
    public function update(Request $request)
    {
        $contentOwner = ContentOwner::findOrFail($request->content_owner_id);

        if (!$contentOwner) {
            $this->flashMessageError('Content Owner not found.');
            return redirect()->back();
        }

        $validator = Validator($request->all(), [
            'name' => 'required|unique:content_owners,name,' . $contentOwner->id,
        ]);

        if ($validator->fails()) {
            $this->flashMessageValidatorError($validator->errors()->getMessages());
            return redirect()->back()->withInput();
        }


        $contentOwner->name = $request->name;

        if ($request->hasFile('image')) {

            if (file_exists($contentOwner->image)) {
                unlink($contentOwner->image);
            }
            $image = $request->file('image');
            $imageName = date('Y_m_d_H_i_s_') .  $image->getClientOriginalName();
            $image->move('upload/content-owner', $imageName);
            $contentOwner->image = 'upload/content-owner/' . $imageName;
        }

        if ($contentOwner->save()) {
            $this->flashMessageSuccess('Content Owner updated successfully.');
            return redirect()->route('content-owner.index');
        } else {
            $this->flashMessageError('Content Owner upgrade failed.');
            return redirect()->back();
        }
    }



    public function edit($id)
    {
        $contentOwner = ContentOwner::findOrFail($id);
        return view('content-owner.edit', compact('contentOwner'));
    }

    public function delete($id)
    {
        $contentOwner = ContentOwner::findOrFail($id);
        if (file_exists($contentOwner->image)) {
            unlink($contentOwner->image);
        }
        if ($contentOwner->delete()) {
            $this->respondWithSuccess('Content Owner deleted successfully.');
        } else {
            $this->respondWithError('Content Owner deletion failed.');
        }
    }
}
