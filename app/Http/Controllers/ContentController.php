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
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

class ContentController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        
    }


    public function index(Request $request)
    {

        if ($request->ajax()) {
            $contents = Content::select()
                ->orderBy('id', 'desc')
                ->with('category', 'owner', 'type')
                ->get();
            return DataTables::of($contents)
                ->addIndexColumn()
                ->addColumn('select', function ($content) {
                    $select = '<input type="checkbox" name="select[]" value="' . $content->id . '">';
                    return $select;
                })
                ->addColumn('insert_date', function ($content) {
                    return date('d-m-Y H:m:s A', strtotime($content->insert_date));
                })
                ->addColumn('action', function ($content) {
                    $view = '<div class="btn-group" data-id="' . $content->id . '">
                    <a href="' . route('content.view', $content->id) . '" class="btn btn-sm btn-success"><i class="fas fa-eye"></i></a>';
                    $edit = '<a href="' . route('content.edit', $content->id) . '" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>';
                    $delete = '<button class="contentDeleteBtn btn btn-sm btn-danger"><i class="fas fa-trash"></i></button></div>';
                    return $view . $edit .  $delete;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        $this->checkContentTempDataAndDelete();
        return view('content.index');
    }


    public function create()
    {
        

       $this->checkContentTempDataAndDelete();
        $categories = Category::all();
        $owners = ContentOwner::all();
        $contentTypes = ContentType::all();
        return view('content.create', compact('categories', 'owners', 'contentTypes'));
    }

    public function view($id)
    {
        $this->checkContentTempDataAndDelete();
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
        $filename = '';
        if ($request->file_name_path) {
            $fileName = explode("/", $request->file_name_path)[2];
            $target = 'upload/content/file/' . $fileName;
            $file = File::move('upload/temp-data/' . $fileName, $target);
            $content->file_name = $target;
        }
        $info = new SplFileInfo($filename, '', '');
        $content->file_size = $info->getSize();
        $content->location = $request->location;
        $content->insert_date = now();
        $content->update_date = now();
        $content->status = $request->status;
        if (Auth::check()) {
            $content->created_by = Auth::user()->name;
        }

        if ($content->save()) {
            $this->checkContentTempDataAndDelete();
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
            'description' => 'string|max:255',
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
        if ($request->file_name_path) {
            // unlink
            $file = $content->file_name;
            unlink($file);
            $content->file_name = $request->file_name_path;
            $info = new SplFileInfo($request->file_name_path, '', '');
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
            $this->checkContentTempDataAndDelete();
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
            $this->checkContentTempDataAndDelete();
            return $this->respondWithSuccess('Content deleted successfully.');
        } else {
            return $this->respondWithError('Content deletion failed.');
        }
    }






    public function checkContentTempDataAndDelete()
    {

        $baseUrl = base_path() . '/public/upload/temp-data/';
        $files = File::files($baseUrl);

         foreach ($files as $file) {
            $file = (string)$file;
            $info = new SplFileInfo($file, '', '');
            $userIDAndExt = explode("user_id-", $info)[1];
            $userID = explode(".", $userIDAndExt[0])[0];
            $authUserID = Auth::user()->id;
            if($userID == $authUserID){
                unlink($file);
            }
        }
        return true;
    }
}
