@extends('layouts.sidebars')

@section('middle')

<h4 class="mb-3">Notifications</h4>

@foreach ($notifications as $notification)
<div class="panel">
	@if($notification->type === 'App\Notifications\UserFollowed')
	<a href="{{ route('profile', $notification->models['User']) }}">{{ $notification->models['User']->full_name }}</a>
	followed you.
	@elseif($notification->type === 'App\Notifications\PostLiked')
	<div class="mb-4">
		<a href="{{ route('profile', $notification->models['User']) }}">{{ $notification->models['User']->full_name }}</a>
		liked your post.
	</div>
	@include('includes.post', ['post' => $notification->models['Post']])
	@endif
</div>
@endforeach

@endsection