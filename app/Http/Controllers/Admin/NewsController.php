<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\NewsFormRequest;
use App\Models\Category;
use App\Models\News;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::all();
        return view('admin.news.index', compact('news'));
    }

    public function create()
    {
        $categories=Category::all();
        return view('admin.news.create', compact('categories'));
    }

    public function store(NewsFormRequest $request)
    {
        // dd($request->all());
        $data = $request->validated();

        $news = new News;
        $news->title = $data['title'];
        $news->subtitle = $data['subtitle'];
        $news->slug = Str::slug($data['title']);
        $news->description = $data['description'];

        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $filename = $file->store('/public/news/');
            $news->image = $filename;
        }
        $news->meta_title = $data['meta_title'];
        $news->meta_description = $data['meta_description'];
        $news->meta_keyword = $data['meta_keyword'];
        $formattedDate = Carbon::parse($data['publish_date'])->format('Y-m-d');
        $news->publish_date= $formattedDate;

        $action = $request->input('action');
        if ($action === 'save_draft') {
            $news->is_draft = true;
        } else {
            $news->is_draft = false;
        }
        $news->save();

        $allCategoryIds = [];
        $allCategoryNames = $request->tags;
        foreach ($allCategoryNames as $categoryName) {
            $category = Category::where('name', $categoryName)->first();
            if ($category) {
                $allCategoryIds[] = $category->id;
            } 
        }
        $news->categories()->attach($allCategoryIds);

        return redirect('admin/news')->with('message', 'News Added Successfully');
    }

    public function upload (Request $request)
    {
        // dd($request->all());
        if ($request->hasfile('upload'))
        {
            $file = $request->file('upload');
            $filename = $file->store('/public/news/');
            $storageUrl = Storage::url($filename);
            $url = asset($storageUrl);
            return response()->json(['filename'=>$filename, 'uploaded'=>1, 'url'=>$url]);
        }
    }

    public function edit($news_id)
    {
        $news = News::find($news_id);
        $categories=Category::all();
        $news_ids = $news->categories->pluck('id');
        $selected_news_ids = $news_ids->toArray();
        // print_r($selected_news_ids->toArray()); die;
        return view('admin.news.edit', compact('news', 'categories','selected_news_ids'));
    }

    public function update(NewsFormRequest $request, $news_id)
    {
        $data = $request->validated();

        $news = News :: find($news_id);
        $news->title = $data['title'];
        $news->subtitle = $data['subtitle'];
        $news->slug = Str::slug($data['title']);
        $news->description = $data['description'];

        if ($request->hasfile('image')) {
            $destination = 'uploads/news/'.$news->image;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('uploads/news/', $filename);
            $news->image = $filename;
        }
        else {
            $data['image'] = $news->image; 
        }
        $news->meta_title = $data['meta_title'];
        $news->meta_description = $data['meta_description'];
        $news->meta_keyword = $data['meta_keyword'];

        $news->update();

        return redirect('admin/news')->with('message', 'News Updated Successfully');
    }

    public function destroy($news_id)
    {
        $news = News::find($news_id);
        if($news)
        {
            $destination = $news->image;
            if(Storage::exists($destination)){
                Storage::delete($destination);
            }
            $news->delete();
            return redirect('admin/news')->with('message', 'News Deleted Successfully');
        }
        else
        {
            return redirect('admin/news')->with('message', 'No News Id Found');
        }
    }
}
