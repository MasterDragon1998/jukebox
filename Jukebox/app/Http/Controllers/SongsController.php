<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Song;

class SongsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('songs.index', ['songs' => Song::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('songs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate
        $this->validate($request, [
                'title' => 'required',
                'artist' => 'required',
                'genre' => 'required'
            ]);

        // Create Song
        $song = new Song();
        $song->title = $request->input('title');
        $song->artist = $request->input('artist');
        $song->genre = $request->input('genre');
        $song->save();

        return redirect('/songs')->with('success', 'Song Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('songs.show', ['song' => Song::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('songs.edit', ['song', Song::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validate
        $this->validate($request, [
                'title' => 'required',
                'artist' => 'required',
                'genre' => 'required'
            ]);

        // Update Song
        $song = Song::find($id);
        $song->title = $request->input('title');
        $song->artist = $request->input('artist');
        $song->genre = $request->input('genre');
        $song->save();

        return redirect('/songs/'.$id)->with('success', 'Song Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Delete Song
        Song::find($id)->delete();

        return redirect('/songs')->with('success', 'Song Deleted');
    }
}
