<?php

namespace App\Http\Controllers;

use App\Models\video;
use Illuminate\Http\Request;

class pageController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function home()
    {
        return view('video');
    }

    public function store(Request $request)
    {
        $data = new video();

        $file = $request->file;
        $fileName = time() . '.' . $file->getClientOriginalExtension();

        $request->file->move('video', $fileName);
        $data->file = $fileName;

        $data->name = $request->name;
        $data->description = $request->description;
        $data->save();

        return redirect()->back()->with('success', 'Video Uploded!');
    }

    public function show()
    {
        $data = video::all();
        return view('showVideo', compact('data'));
    }

    public function view($id)
    {
        $data = video::find($id);

        return view('view', compact('data'));
    }
}