@extends('layouts.app')

@section('content')
	<a class="btn btn-secondary float-left" href="{{ route('playlists.show', $playlist->id) }}">Go Back</a>
	{!!Form::open(['action' => ['PlaylistsController@update', $playlist->id], 'method' => 'POST'])!!}
	<center>
		{{Form::text('title', $playlist->title, ['class' => 'col-md-3 form-control', 'placeholder' => 'Title'])}}
	</center>
	{{Form::submit('Update Playlist', ['class' => 'btn btn-primary float-right', 'style' => 'position:relative;top:-40px;'])}}
	<hr>
		<div class="form-group">
			{{Form::label('description', 'Description')}}
			{{Form::textarea('description', $playlist->description, ['class' => 'form-control', 'placeholder' => 'Description'])}}
		</div>
		{{Form::hidden('_method', 'PUT')}}
	{!!Form::close()!!}
@endsection