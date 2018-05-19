@extends('layouts.app')

@section('content')
	@if(count($playlists) > 0)
		@foreach($playlists as $playlist)
			<div class="card">
				<div class="card-header">
					<h3><a href="{{ route('playlists.show', $playlist->id) }}">{{$playlist->name}}</a></h3>
				</div>
				<div class="card-body">
					{{$playlist->description}}
				</div>
			</div>
		@endforeach
	@else
		<center>
			<h2>No Playlists Found</h2>
		</center>
	@endif
@endsection