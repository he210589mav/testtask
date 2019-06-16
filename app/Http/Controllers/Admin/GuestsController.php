<?php

namespace App\Http\Controllers\Admin;

use App\Guest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GuestsController extends Controller
{
    public function index()
    {
        $guests=Guest::all();
        return view('admin.guestbook.index',['guests'=> $guests]);
    }


    public function edit($id)
    {
        $guests = Guest::find($id);
        return view('admin.guestbook.edit', compact(
            'guests'
        ));
    }

    public function update(Request $request, $id){
        $guests = Guest::find($id);

        $guests->edit($request->all());
        return redirect()->route('guests.index');
    }
    public function destroy($id)
    {
        Guest::find($id)->remove();
        return redirect()->route('guests.index');
    }
}
