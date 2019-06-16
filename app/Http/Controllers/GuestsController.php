<?php

namespace App\Http\Controllers;

use App\Guest;
use App\Rules\Captcha;
use Illuminate\Http\Request;

class GuestsController extends Controller
{
    public function index()
    {
        $guests = Guest::orderBy('created_at','desc')
            ->where('published', '1')
        ->paginate(12);
        return view('guest')->with('guests', $guests);
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'text' => 'required',

        ]);

        $guests = Guest::add($request->all());
        $guests->edit($request->all());
        return redirect()->route('guest.index');
    }

}
