@extends('layouts.app')

@section('content')
	<a href="{{ route('playlists.index') }}" class="btn btn-secondary">Go Back</a>
	<center>
		<h2>Create Playlist</h2>
	</center>
	<hr>
	{!!Form::open(['action' => 'PlaylistsController@store', 'method' => 'POST'])!!}
		<div class="form-group">
			{{Form::label('title', 'Title')}}
			{{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Title'])}}
		</div>
		<div class="form-group">
			{{Form::label('description', 'Description')}}
			{{Form::textarea('description', '', ['class' => 'form-control', 'placeholder' => 'Description'])}}
		</div>
		{{Form::submit('Create Playlist', ['class' => 'btn btn-primary'])}}
	{!!Form::close()!!}
@endsection