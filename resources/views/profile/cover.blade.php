<div class="panel">
	<div class="d-flex mb-4">
		<x-profile-image :image="$user->image" size="lg" />
	</div>

	<div class="d-flex justify-content-between">
		<h1>{{ $user->full_name }}</h1>
		<h3 class="text-muted">{{ $user->username }}</h3>
	</div>

	<div class="mb-3">
		<h5>About</h5>
		Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus arcu sem, consequat sit amet tincidunt id,
		egestas imperdiet ipsum. Aenean nec tristique ante.
	</div>

	<div class=" mb-3 d-flex justify-content-between">
		<div>
			<a href="{{ route('profile', $user->username) }}">
				<h5>Posts</h5>
				{{ $user->posts->count() }}
			</a>
		</div>
		<div>
			<a href="{{ route('followers', $user->username) }}">
				<h5>Followers</h5>
				{{ $user->follower_count }}
			</a>
		</div>
		<div>
			<a href="{{ route('following', $user->username) }}">
				<h5>Following</h5>
				{{ $user->following_count }}
			</a>
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
			<button class="btn btn-primary dropdown-toggle" type="button" id="following-dropdown" data-toggle="dropdown"
				aria-haspopup="true" aria-expanded="false">
				Following
			</button>
			<div class="dropdown-menu" aria-labelledby="following-dropdown">
				<form class="dropdown-item p-0" method="post" action="{{ route('unfollow', $user) }}">
					@method('delete')
					@csrf
					<button class="btn btn-link px-4 py-1 w-100 text-left" role="link">Unfollow</button>
				</form>
			</div>
		</div>
		@endif
	</div>
	@endif
</div>