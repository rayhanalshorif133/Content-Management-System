<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\ContentOwner;
use App\Models\Content;
use App\Models\ContentType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Finder\SplFileInfo;
use Yajra\DataTables\Facades\DataTables;

class ContentController extends Controller
{
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $contents = Content::select()
                ->orderBy('id', 'desc')
                ->with('category', 'owner', 'type')
                ->get();
            return DataTables::of($contents)
                ->addIndexColumn()
                ->addColumn('insert_date', function ($content) {
                    return date('d-m-Y H:m:s A', strtotime($content->insert_date));
                })
                ->addColumn('action', function ($content) {
                    $edit = '<a href="' . route('content.edit', $content->id) . '" class="btn btn-sm btn-primary">Edit</a>';
                    $view = '<a href="' . route('content.view', $content->id) . '" class="btn btn-sm btn-success">View</a>';
                    $delete = '<a href="' . route('content.delete', $content->id) . '" class="btn btn-sm btn-danger">Delete</a>';
                    return $edit . ' ' . $view . ' ' . $delete;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('content.index');
    }


    public function create()
    {
        $categories = Category::all();
        $owners = ContentOwner::all();
        $contentTypes = ContentType::all();
        return view('content.create', compact('categories', 'owners', 'contentTypes'));
    }

    public function view($id)
    {
        $content = Content::select()
            ->with('category', 'owner', 'type')
            ->where('id', $id)
            ->first();
        if ($content) {
            return view('content.view', compact('content'));
        } else {
            $this->flashMessageError('Content not found');
            return redirect()->route('content.index');
        }
    }
    public function edit($id)
    {
        $content = Content::select()
            ->with('category', 'owner', 'type')
            ->where('id', $id)
            ->first();
        $categories = Category::all();
        $owners = ContentOwner::all();
        $contentTypes = ContentType::all();
        if ($content) {
            return view('content.edit', compact('content', 'categories', 'owners', 'contentTypes'));
        } else {
            $this->flashMessageError('Content not found');
            return redirect()->route('content.index');
        }
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
        $content->update_date = now();
        $content->status = $request->status;
        if (Auth::check()) {
            $content->created_by = Auth::user()->name;
        }

        if ($content->save()) {
            $this->flashMessageSuccess('Content created successfully.');
            return redirect()->route('content.index');
        } else {
            $this->flashMessageError('Content creation failed.');
            return redirect()->back()->withInput();
        }
    }
    public function update(Request $request)
    {
        $validator = Validator($request->all(), [
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

        $content = Content::find($request->id);
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
        $content->update_date = now();
        $content->status = $request->status;
        if (Auth::check()) {
            $content->created_by = Auth::user()->name;
        }

        if ($content->save()) {
            $this->flashMessageSuccess('Content created successfully.');
            return redirect()->route('content.index');
        } else {
            $this->flashMessageError('Content creation failed.');
            return redirect()->back()->withInput();
        }
    }

    public function delete($id)
    {
        $content = Content::find($id);
        if ($content->delete()) {
            return $this->respondWithSuccess('Content deleted successfully.');
        } else {
            return $this->respondWithError('Content deletion failed.');
        }
    }
}
