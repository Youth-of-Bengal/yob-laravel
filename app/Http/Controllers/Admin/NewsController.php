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

    // public function store(NewsFormRequest $request)
    // {
        
    //     return response()->json($categories);
    // }

    public function store(NewsFormRequest $request)
    {
        $data = $request->validated();

        $news = new News;
        $news->title = $data['title'];
        $news->subtitle = $data['subtitle'];
        // $news->slug = $data['slug'];
        $news->slug = Str::slug($data['title']);
        $news->description = $data['description'];

        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('uploads/news/', $filename);
            $news->image = $filename;
        }
        $news->meta_title = $data['meta_title'];
        $news->meta_description = $data['meta_description'];
        $news->meta_keyword = $data['meta_keyword'];
        $formattedDate = Carbon::parse($data['publish_date'])->format('Y-m-d');
        $news->publish_date= $formattedDate;
        // $news->publish_date= $data['publish_date'];

        $news->categories()->attach($request->category_id);

        $news->is_draft = true ;
        $news->save();

        return redirect('admin/news')->with('message', 'News Added Successfully');
    }

    public function edit($category_id)
    {
        $news = News::find($category_id);
        return view('admin.news.edit', compact('news'));
    }

    public function update(NewsFormRequest $request, $category_id)
    {
        $data = $request->validated();

        $news = News :: find($category_id);
        $news->name = $data['name'];
        // $news->slug = $data['slug'];
        $news->slug = Str::slug($data['name']);
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

    public function destroy($category_id)
    {
        $news = News::find($category_id);
        if($news)
        {
            $destination = 'uploads/news/'.$news->image;
            if(File::exists($destination)){
                File::delete($destination);
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
