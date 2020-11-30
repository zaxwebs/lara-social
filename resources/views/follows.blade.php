@extends('layouts.sidebars')

@section('middle')

@include('profile.cover')

<h4 class="mb-3">{{ $heading }}</h4>

@foreach ($followers as $follower)
<div class="panel">
	<div class="d-flex justify-content-between">
		<div><a href="{{ route('profile') }}/{{ $follower->username }}">{{ $follower->full_name }}</a></div>
		<small class="text-muted">{{ $follower->username }}</small>
	</div>
</div>
@endforeach

@endsection