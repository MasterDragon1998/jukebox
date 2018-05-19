@extends('layouts.app')

@section('content')
	<center>
		<h2>Songs</h2>
	</center>
	<hr>
	@if(count($songs)  > 0)
	<table class="table table-striped">
		<tr>
			<th>Title</th>
			<th>Artist</th>
			<th>Genre</th>
		</tr>
		@foreach($songs as $song)
			<tr>
				<td>{{$song->title}}</td>
				<td>{{$song->artist}}</td>
				<td>{{$song->genre}}</td>
			</tr>
		@endforeach
	</table>
	@else
		<h3>No Songs Found</h3>
	@endif
@endsection