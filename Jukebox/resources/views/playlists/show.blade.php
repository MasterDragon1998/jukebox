@extends('layouts.app')

@section('content')
	<a class="btn btn-secondary float-left" href="{{ route('playlists.index') }}">Go Back</a>
	<center>
		<h2>{{$playlist->title}}</h2>
	</center>
	<a href="{{ route('playlists.edit', $playlist->id) }}" style="position:relative;top:-40px;margin-left:5px;" class="btn btn-secondary float-right">Edit</a>
	{{Form::open(['route' => ['playlists.destroy', $playlist->id]])}}
		{{Form::hidden('_method', 'DELETE')}}
		{{Form::submit('Delete', ['class' => 'btn btn-danger float-right', 'style' => 'position:relative;top:-40px;margin-left:5px;'])}}
	{{Form::close()}}
	<hr>
@endsection