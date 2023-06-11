<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\ContentOwner;
use App\Models\Content;
use App\Models\ContentType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Finder\SplFileInfo;

class ContentController extends Controller
{
    public function index()
    {
        return view('content.index');
    }

    public function create()
    {
        $categories = Category::all();
        $owners = ContentOwner::all();
        $contentTypes = ContentType::all();
        return view('content.create', compact('categories', 'owners', 'contentTypes'));
    }

    public function store(Request $request)
    {
        $validator = Validator($request->all(), [
            'category_id' => 'required',
            'owner_id' => 'required',
            'content_type_id' => 'required',
            'title' => 'required|string|max:255',
            'short_des' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'artist_name' => 'nullable|string|max:255',
            'price' => 'required|integer',
            'location' => 'nullable|string|max:255',
            'status' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            $this->flashMessageValidatorError($validator->errors()->messages());
            return redirect()->back()->withErrors($validator)->withInput();
        }


        $content = new Content();
        $content->category_id = $request->category_id;
        $content->owner_id = $request->owner_id;
        $content->type_id = $request->content_type_id;
        $content->title = $request->title;
        $content->short_des = $request->short_des;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = date('Y_m_d_H_i_s_') .  $image->getClientOriginalName();
            $image->move('upload/content/image', $imageName);
            $content->image = 'upload/content/image/' . $imageName;
        }
        if ($request->hasFile('banner_image')) {
            $image = $request->file('banner_image');
            $imageName = date('Y_m_d_H_i_s_') .  $image->getClientOriginalName();
            $image->move('upload/content/banner_image', $imageName);
            $content->banner_image = 'upload/content/banner_image/' . $imageName;
        }
        $content->description = $request->description;
        $content->artist_name = $request->artist_name;
        $content->price = $request->price;
        if ($request->hasFile('file_name')) {
            $image = $request->file('file_name');
            $imageName = date('Y_m_d_H_i_s_') .  $image->getClientOriginalName();
            $image->move('upload/content/file', $imageName);
            $content->file_name = 'upload/content/file/' . $imageName;
            $info = new SplFileInfo($content->file_name, '', '');
            $content->file_size = $info->getSize();
        }
        $content->location = $request->location;
        $content->insert_date = now();
        $content->mapping_status = 'Active';
        $content->owner_status = 'Active';
        $content->status = $request->status;
        $content->created_by = auth()->user()->name;

        if ($content->save()) {
            $this->flashMessageSuccess('success', 'Content created successfully.');
            return redirect()->route('content.index');
        } else {
            $this->flashMessageError('danger', 'Content creation failed.');
            return redirect()->back()->withInput();
        }
    }
}
