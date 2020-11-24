@extends('layouts.app')

@section('content')
<div class="row">
	<div class="col-lg-6 col-xl-4 offset-xl-4">
		<div class="panel">
			<h1>{{ $user->full_name }}</h1>
			<div class="mb-3">
				<h5>About</h5>
				Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus arcu sem, consequat sit amet tincidunt id, egestas imperdiet ipsum. Aenean nec tristique ante.
			</div>
			<div>
				<h5>Posts</h5>
				{{ $user->posts->count() }}
			</div>
		</div>

		@if($user->username === auth()->user()->username)
		<div class="panel">
			@if(Session::get('alert.location') === 'post')
				@include('layouts.partials.alert')
			@endif
			<form method="post" action="{{ route('post') }}">
				@csrf
				<div class="form-group">
					<label for="post">What's on your mind, {{ auth()->user()->first_name }}?</label>
					<textarea name="post_body" class="form-control" id="post" rows="5">{{ old('post_body') }}</textarea>
				</div>
				<button type="submit" class="btn btn-primary">Publish your post</button>
			</form>
		</div>
		@endif

		@foreach ($posts as $post)
				<div class="panel">
					<div class="d-flex justify-content-between">
						<div><a href="{{ route('profile') }}/{{ $post->user->username }}">{{ $post->user->full_name }}</a></div>
						<small class="text-muted">{{ $post->created_at->diffForHumans() }}</small>
					</div>
					<div>
					{!! nl2br(e($post->body)) !!}
					</div>
				</div>
		@endforeach

	</div>
</div>
@endsection