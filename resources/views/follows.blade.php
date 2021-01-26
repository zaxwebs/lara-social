@extends('layouts.sidebars')

@section('middle')

@include('profile.cover')

<h4 class="mb-3">{{ $heading }}</h4>

@if($followers->count())
@foreach ($followers as $follower)
<div class="panel">
	<div class="d-flex justify-content-between">
		<div><a href="{{ route('profile') }}/{{ $follower->username }}">{{ $follower->full_name }}</a></div>
		<small class="text-muted">{{ $follower->username }}</small>
	</div>
</div>
{{ $followers->links() }}
@endforeach
{{ $followers->links() }}
@else

@if(Route::is('followers'))
<div class="alert alert-info">You don't have any followers yet.</div>
@else
<div class="alert alert-info">You aren't following anyone yet.</div>
@endif

@endif

@endsection