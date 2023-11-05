<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Category;

class FrontNews_SingleController extends Controller
{
    public function show($news_id = '')
    {
        $news = News::find($news_id);
        $all_news = News::all();
        $categories = Category::all();
        $news_ids = $news->categories->pluck('id');
        $selected_news_ids = $news_ids->toArray();
        // dd(compact('news', 'categories','selected_news_ids'));
        return view('frontend.news_single', compact('news', 'all_news', 'categories', 'selected_news_ids'));
    }
}
