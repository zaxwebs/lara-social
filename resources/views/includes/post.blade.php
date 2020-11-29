<div class="panel">
	<div class="d-flex justify-content-between">
		<div><a href="{{ route('profile') }}/{{ $post->user->username }}">{{ $post->user->full_name }}</a></div>
		<small class="text-muted">{{ $post->created_at->diffForHumans() }}</small>
	</div>
	<div class="mb-2">
		{!! nl2br(e($post->body)) !!}
	</div>
	<div>
		@if(!$post->is_liked)
		<form method="post" class="d-inline" action="{{ route('like', $post) }}">
			@csrf
			<button class="btn btn-link btn-sm p-0 mr-2">Like</button>
		</form>
		@else
		<form method="post" class="d-inline" action="{{ route('unlike', $post) }}">
			@csrf
			<button class="btn btn-link btn-sm p-0 mr-2">Liked</button>
		</form>
		@endif
		@if($post->user->is_viewer)
		@if(!$post->is_highlighted)
		<form class="d-inline" method="post" action="{{ route('highlight', $post) }}">
			@csrf
			<button class="btn btn-link btn-sm p-0">Highlight</button>
		</form>
		@else
		<form class="d-inline" method="post" action="{{ route('unhighlight', $post) }}">
			@csrf
			<button class="btn btn-link btn-sm p-0">Highlighted</button>
		</form>
		@endif
		@endif
	</div>
</div>