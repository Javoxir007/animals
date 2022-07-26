<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Category;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::with(['category:id,name,parent_id,description'])->orderBy('id', 'desc')->paginate(10);
        return view('admin/news/index', compact('news'));
    }

    public function create()
    {
        $category = Category::get();
        return view('admin/news/create', compact('category'));
    }

    public function store(Request $request)
    {
        $newsData = $request->validate([
            'image' => 'required|file|max:5120|mimes:png,jpg,jpeg',
            'title' => 'required|string|min:3|max:500',
            'category_id' => 'required',
            'description_news' => 'required|string|min:3',
            'date_create' => 'required'
        ]);

        $full_path = null;
        if($uploaded = $request->file('image')){

            $uploaded = $request->file('image');
            $extension = $uploaded->getClientOriginalExtension();
            $image_name = time()."_img"."$extension";
            $uploaded->move(public_path('assets/img/news'), $image_name);
            $full_path = '/assets/img/news/'.$image_name;
        }

        $newsData['image'] = $full_path;

        $created = News::create($newsData);
        if($created){
            return redirect()->route('admin/news/index')->with(['success' => 'Blog Yaratildi']);
        }
        return redirect()->back();
    }

    public function edit($id)
    {
        $item = News::findOrFail($id);
        $category = Category::get();
        return view('admin/news/edit', compact('item','category'));
    }

    public function update($id, Request $request)
    {
        $news = News::find($id);

        $newsUpdateData = $request->validate([
            'image' => 'file|max:5120|mimes:png,jpg,jpeg',
            'title' => 'required|string|min:3|max:500',
            'category_id' => 'required',
            'description_news' => 'required|string|min:3',
            'date_create' => 'required'
        ]);

        $full_path = $news->image;
        if($uploaded = $request->file('image')){

            $uploaded = $request->file('image');
            $extension = $uploaded->getClientOriginalExtension();
            $image_name = time()."_img"."$extension";
            $uploaded->move(public_path('assets/img/news'), $image_name);
            $full_path = '/assets/img/news/'.$image_name;
        }

        $newsUpdateData['image'] = $full_path;

        $update = $news->update($newsUpdateData);
        if($update){
            return redirect()->route('admin/news/index')->with(['success' => 'O`zgartirildi']);
        }
        return redirect()->back();

    }

    public function destroy($id)
    {
        $item = News::find($id);
        $item->delete();
        return redirect()->route('admin/news/index')->with(['success' => 'O`chirildi']);
    }
}
