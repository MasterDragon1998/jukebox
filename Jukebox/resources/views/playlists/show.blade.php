@extends('layouts.app')

@section('content')
	<a class="btn btn-secondary float-left" href="{{ route('playlists.index') }}">Go Back</a>
	<center>
		<h2>{{$playlist->name}}</h2>
	</center>
	<hr>
@endsection