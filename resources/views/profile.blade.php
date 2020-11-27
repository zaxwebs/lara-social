@extends('layouts.sidebars')

@section('middle')

		<div class="panel">
			
			<div class="d-flex justify-content-between">
				<h1>{{ $user->full_name }}</h1>
				<h3 class="text-muted">{{ $user->username }}</h3>
			</div>
			
			<div class="mb-3">
				<h5>About</h5>
				Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus arcu sem, consequat sit amet tincidunt id, egestas imperdiet ipsum. Aenean nec tristique ante.
			</div>

			<div class=" mb-3 d-flex justify-content-between">
				<div>
					<h5>Posts</h5>
					{{ $user->posts->count() }}
				</div>
				<div>
					<h5>Followers</h5>
					{{ $user->follower_count }}
				</div>
				<div>
					<h5>Following</h5>
					{{ $user->following_count }}
				</div>
			</div>

			@if(!$user->is_viewer)
			<div>
				@if(!$user->is_followed)
					<form method="post" action="{{ route('follow', $user) }}">
						@csrf
						<button class="btn btn-primary" role="link">Follow</button>
					</form>
				@else
						<div class="dropdown">
							<button class="btn btn-primary dropdown-toggle" type="button" id="following-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Following
							</button>
							<div class="dropdown-menu" aria-labelledby="following-dropdown">
								<form class="dropdown-item p-0" method="post" action="{{ route('unfollow', $user) }}">
									@csrf
									<button class="btn btn-link px-4 py-1 w-100 text-left" role="link">Unfollow</button>
								</form>
							</div>
						</div>
				@endif
			</div>
			@endif
		</div>


		@if($user->is_viewer)
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

		<div class="d-flex justify-content-between align-items-center mb-3">
			<h4 class="mb-0">{{ request()->has('highlights') ? 'Highlighted Posts' : 'Posts'}}</h4>
			<div class="btn-group" role="group">
				<a class="mr-3" href="{{ route('profile', $user) }}">All Posts</a>
				<a href="{{ route('profile', $user, ['highlights', 1]) }}?highlights=1">Highlights</a>
			</div>
		</div>

		@foreach ($posts as $post)
				<div class="panel">
					<div class="d-flex justify-content-between">
						<div><a href="{{ route('profile') }}/{{ $post->user->username }}">{{ $post->user->full_name }}</a></div>
						<small class="text-muted">{{ $post->created_at->diffForHumans() }}</small>
					</div>
					<div class="mb-2">
					{!! nl2br(e($post->body)) !!}
					</div>
					<div>
						@if($user->is_viewer)
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
		@endforeach
		{{ $posts->appends(request()->query())->links() }}

@endsection