<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Category;

class PagesController extends Controller
{
    public function index()
    {
        $lastNewsPost = News::where('category_id', 2)->latest()->first();
        $description = mb_substr($lastNewsPost->description_news, 0, 200, 'UTF-8');
        $allPosts = News::where('category_id', 2)->get()->take(4);
        $interesting = News::where('category_id', 1)->orderBy('id', 'desc')->get()->take(9);
        $wildAnimalsCategory = Category::where('parent_id', 3)->get();
        $homeAnimalsCategory = Category::where('parent_id', 4)->get();
        return view('index', compact('lastNewsPost', 'description', 'allPosts', 'interesting', 'wildAnimalsCategory', 'homeAnimalsCategory'));
    }

    public function full_blog($id)
    {
        $wildAnimalsCategory = Category::where('parent_id', 3)->get();
        $homeAnimalsCategory = Category::where('parent_id', 4)->get();
        $findBlog = News::with(['category:id,name,parent_id,description'])->findOrFail($id);
        $recomendation = News::where('category_id', $findBlog->category_id)->get()->random(3);
        return view('full-blog', compact('findBlog', 'recomendation', 'wildAnimalsCategory', 'homeAnimalsCategory'));
    }

    public function news()
    {
        $wildAnimalsCategory = Category::where('parent_id', 3)->get();
        $homeAnimalsCategory = Category::where('parent_id', 4)->get();
        $allPosts = News::where('category_id', 2)->orderBy('id', 'desc')->get()->take(10);
        return view('news', compact('allPosts', 'wildAnimalsCategory', 'homeAnimalsCategory'));
    }

    public function interesting()
    {
        $wildAnimalsCategory = Category::where('parent_id', 3)->get();
        $homeAnimalsCategory = Category::where('parent_id', 4)->get();
        $allPostsInteresting = News::where('category_id', 1)->orderBy('id', 'desc')->get()->take(10);
        return view('interesting', compact('allPostsInteresting', 'wildAnimalsCategory', 'homeAnimalsCategory'));
    }

    public function wild_animals($id)
    {
        $wildAnimalsCategory = Category::where('parent_id', 3)->get();
        $homeAnimalsCategory = Category::where('parent_id', 4)->get();
        $animals = Category::findOrFail($id);
        $allBlogs = News::where('category_id', $id)->orderBy('id', 'desc')->get()->take(10);
        return view('wild_animals', compact('animals', 'wildAnimalsCategory', 'homeAnimalsCategory', 'allBlogs'));
    }

    
}
