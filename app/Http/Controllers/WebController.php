<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Content;
use App\Models\HitLog;
use App\Models\Subscriber;
use Illuminate\Http\Request;

class WebController extends Controller
{

    public function __construct()
    {
        HitLog::create([
            'msisdn' => $this->get_msisdn(),
            'opr' => $this->get_opr(),
            'ip' => $this->getIPAddress(),
            'd_date' => now()->format('Y-m-d'),
            'd_time' => now()->format('H:i:s'),
        ]);
    }

    public function home()
    {
        $newCategoryId = Category::select('id')->where('name', 'like', '%new%')->first();
        $newContents = Content::select('id', 'title', 'image', 'banner_image')->where('category_id', $newCategoryId->id)->get();


        $categories = Category::select('id', 'name')
            ->where('name', 'not like', '%new%')
            ->with(['contents' => function ($query) {
                $query->select('id', 'title', 'image', 'banner_image', 'category_id')->orderBy('id', 'desc')->limit(4);
            }])
            ->get();

        return view('web.home', compact('newContents', 'categories'));
    }

    public function contentDetails($id)
    {
        $content = Content::select('id', 'title', 'image', 'banner_image', 'category_id', 'file_name')
            ->where('id', $id)
            ->with('category')
            ->first();

        $similarContents = Content::select('id', 'title', 'image', 'banner_image', 'category_id', 'file_name')
            ->where('category_id', $content->category_id)
            ->with('category')
            ->get();


        return view('web.details', compact('content', 'similarContents'));
    }



    public function categoryIndex()
    {
        $categories = Category::select('id', 'name')
            ->with('subCategories')
            ->get();
        return view('web.category.index', compact('categories'));
    }

    public function categoryDetails($id)
    {
        $category = Category::select('id', 'name')
            ->where('id', $id)
            ->with('subCategories')
            ->first();

        $similarContents = Content::select('id', 'title', 'image', 'banner_image', 'category_id', 'file_name')
            ->where('category_id', $id)
            ->with('category')
            ->get();

        return view('web.category.details', compact('category', 'similarContents'));
    }

    public function faq_index()
    {
        return view('web.faq');
    }
}
