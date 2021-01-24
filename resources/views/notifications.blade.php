@extends('layouts.sidebars')

@section('middle')

<div class="d-flex justify-content-between">
	<h4 class="mb-3">{{ $title }}</h4>
	@if(Route::is('notifications'))
	<a href="{{ route('notifications.unread') }}">Unread Notifications</a>
	@else
	<a href="{{ route('notifications') }}">All Notifications</a>
	@endif
</div>


@foreach ($notifications as $notification)
<div class="mb-4">
	@if($notification->type === 'App\Notifications\UserFollowed')
	<a href="{{ route('profile', $notification->models['User']) }}">{{ $notification->models['User']->full_name }}</a>
	followed you.
	@elseif($notification->type === 'App\Notifications\PostLiked')
	<div class="mb-2">
		<a href="{{ route('profile', $notification->models['User']) }}">{{ $notification->models['User']->full_name }}</a>
		liked your post.
	</div>
	@include('includes.post', ['post' => $notification->models['Post']])
	@endif
</div>
@endforeach
{{ $notifications->appends(request()->query())->links() }}
@endsection