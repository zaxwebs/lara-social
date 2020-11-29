<div class="panel">
	<div class="d-flex justify-content-between">
		<div><a href="{{ route('profile') }}/{{ $post->user->username }}">{{ $post->user->full_name }}</a></div>
		<small class="text-muted">{{ $post->created_at->diffForHumans() }}</small>
	</div>
	<div class="mb-2">
		{!! nl2br(e($post->body)) !!}
	</div>
	<div>
		@if($post->user->is_viewer)
		@if(!$post->is_highlighted)
		<form method="post" action="{{ route('highlight', $post) }}">
			@csrf
			<button class="btn btn-link btn-sm p-0">Highlight</button>
		</form>
		@else
		<form method="post" action="{{ route('unhighlight', $post) }}">
			@csrf
			<button class="btn btn-link btn-sm p-0">Highlighted</button>
		</form>
		@endif
		@endif
	</div>
</div>