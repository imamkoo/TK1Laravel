<?php

namespace App\Http\Controllers;

use App\Models\video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class videoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = video::all();
        return view('welcome', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('upload');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new video();

        $fileV = $request->video;
        $fileName = time() . '.' . $fileV->getClientOriginalExtension();
        $request->video->move('video', $fileName);
        $data->video = $fileName;

        $fileT = $request->thumbnail;
        $filename = time() . '.' . $fileT->getClientOriginalExtension();
        $request->thumbnail->move('thumbnail', $filename);
        $data->thumbnail = $filename;

        $data->name = $request->name;
        $data->description = $request->description;
        $data->save();

        return redirect()->back()->with('success', 'Video Uploaded!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = video::find($id);

        return view('show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editThumbnail($id)
    {
        $data = video::find($id);
        return view('editThumbnail', compact('data'));
    }

    public function editVideo($id)
    {
        $data = video::find($id);
        return view('editVideo', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateThumbnail(Request $request, $id)
    {

        $cek = video::find($id);

        if ($request->hasFile('thumbnail')) {

            $path = (public_path('thumbnail') . "/" . $cek->thumbnail);
            if (File::exists($path)) {
                File::delete($path);
            }

            $foto_file = $request->file('thumbnail');
            $foto_ekstensi = $foto_file->extension();
            $foto_baru = date('ymdhis') . ".$foto_ekstensi";
            $foto_file->move(public_path('thumbnail'), $foto_baru);
        }

        $data = [
            'name' => $request->name,
            'description' => $request->description,
            'thumbnail' => $foto_baru,
        ];

        video::where('id', $id)->update($data);

        return redirect()->back()->with('success', 'Thumbnail Updated!');
    }

    public function updateVideo(Request $request, $id)
    {
        $cek = video::find($id);
        if ($request->hasFile('video')) {

            $path = (public_path('video') . "/" . $cek->video);
            if (File::exists($path)) {
                File::delete($path);
            }
            $foto_file = $request->file('video');
            $foto_ekstensi = $foto_file->extension();
            $foto_baru = date('ymdhis') . ".$foto_ekstensi";
            $foto_file->move(public_path('video'), $foto_baru);
        }
        $data = [
            'name' => $request->name,
            'description' => $request->description,
            'video' => $foto_baru,
        ];

        video::where('id', $id)->update($data);



        return redirect()->back()->with('success', 'Video Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}