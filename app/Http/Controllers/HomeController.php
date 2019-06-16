<?php

namespace App\Http\Controllers;

use App\Guest;
use App\News;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    //public function __construct()
   // {
    //    $this->middleware('auth');
   // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $news = News::where('published', '1')
        ->paginate(3);

        return view('welcome')->with('news', $news);
    }
    public function indexViews()
    {
        $news = News::orderBy('viewed','desc')
            ->where('published', '1')
            ->paginate(3);
        return view('welcome')->with('news', $news);
    }
    public function indexDate()
    {
        $news = News::orderBy('created_at','desc')
            ->where('published', '1')
            ->paginate(3);
        return view('welcome')->with('news', $news);
    }
    public function show($slug)
    {
        $news = News::where('slug', $slug)->firstOrFail();
        $news->increment('viewed');

        return view('show', compact('news'));
    }

}
