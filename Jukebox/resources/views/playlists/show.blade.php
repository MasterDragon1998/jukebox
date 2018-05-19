@extends('layouts.app')

@section('content')
	<a class="btn btn-secondary float-left" href="{{ route('playlists.index') }}">Go Back</a>
	<center>
		<h2>{{$playlist->title}}</h2>
	</center>
	<a href="{{ route('playlists.edit', $playlist->id) }}" style="position:relative;top:-40px;" class="btn btn-secondary float-right">Edit</a>
	<hr>
@endsection