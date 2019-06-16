<?php

namespace App\Http\Controllers\Admin;

use App\Guest;
use App\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $news = News::where('published', '1')
            ->paginate(3);
        return view('admin.welcome')->with('news', $news);
    }
    public function show($slug)
    {
        $news = News::where('slug', $slug)->firstOrFail();

        return view('show', compact('news'));
    }

}
