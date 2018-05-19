<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Playlist;

class PlaylistsController extends Controller
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
        return view('playlists.index', ['playlists' => auth()->user()->playlists]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('playlists.create');
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
                'description' => 'required'
            ]);

        // Create Playlist
        $playlist = new Playlist();
        $playlist->title = $request->input('title');
        $playlist->description = $request->input('description');
        $playlist->user_id = auth()->user()->id;
        $playlist->save();

        return redirect('/playlists')->with('success', 'Created Playlist');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $playlist = Playlist::findOrFail($id);
        return view('playlists.show', ['playlist' => $playlist]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $playlist = Playlist::find($id);

        // Authorize
        if(auth()->user()->id !== $playlist->user_id){
            return redirect('/playlists/'.$id)->with('alert', 'You cannot edit someone elses playlist');
        }

        return view('playlists.edit', ['playlist' => $playlist]);
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
                'description' => 'required'
            ]);

        $playlist = Playlist::find($id);

        // Authorize
        if(auth()->user()->id !== $playlist->user_id){
            return redirect('/playlists/'.$id)->with('alert', 'You cannot edit someone elses playlist');
        }

        // Update Playlist
        $playlist->title = $request->input('title');
        $playlist->description = $request->input('description');
        $playlist->save();

        return redirect('/playlists/'.$id)->with('success', 'Playlist Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Retrieve
        $playlist = Playlist::find($id);

        // Authorize
        if(auth()->user()->id !== $playlist->user_id){
            return redirect('/playlists/'.$id)->with('alert', 'You cannot delete someone elses playlist');
        }

        // Delete playlist
        $playlist->delete();

        return redirect('/playlists')->with('success', 'playlist successfully deleted');
    }
}
