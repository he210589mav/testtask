<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\News;
use App\Http\Controllers\Controller;

class NewsController extends Controller
{
    public function index()
    {
        $news=News::all();
        return view('admin.news.index',['news'=> $news]);
    }
    public function create()
    {
        return view('admin.news.create');
    }
    public function store(Request $request)
    {


        $news = News::add($request->all());
        $news->edit($request->all());
        $news->upImg($request->file('image'));
        return redirect()->route('news.index');
    }

    public function edit($id)
    {
        $news=News::find($id);
        return view('admin.news.edit', compact(
            'news'
        ));
    }

    public function update(Request $request, $id){
        $news = News::find($id);

        $news->edit($request->all());
        $news->upImg($request->file('image'));
        return redirect()->route('news.index');
    }
    public function destroy($id)
    {
        News::find($id)->remove();
        return redirect()->route('news.index');
    }
}
