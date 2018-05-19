@extends('layouts.app')

@section('content')
	<center>
		<h2>Playlists</h2>
	</center>
	<a href="{{ route('playlists.create') }}" style="position:relative;top:-40px;" class="btn btn-secondary float-right">Create Playlist</a>
	<hr>
	<div class="row col-md-12">
		@if(count($playlists) > 0)
			@foreach($playlists as $playlist)
				<div class="col-md-3">
					<div class="card">
						<div class="card-header">
							<h3><a href="{{ route('playlists.show', $playlist->id) }}">{{$playlist->title}}</a></h3>
						</div>
						<div class="card-body">
							{{$playlist->description}}
						</div>
					</div>
				</div>
			@endforeach
		@else
			<center>
				<h2>No Playlists Found</h2>
			</center>
		@endif
	</div>
@endsection