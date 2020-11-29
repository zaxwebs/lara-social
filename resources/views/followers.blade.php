@extends('layouts.sidebars')

@section('middle')

@foreach ($followers as $follower)
<div class="panel">
	<div class="d-flex justify-content-between">
		<div><a href="{{ route('profile') }}/{{ $follower->username }}">{{ $follower->full_name }}</a></div>
		<small class="text-muted">{{ $follower->username }}</small>
	</div>
</div>
@endforeach

@endsection