@extends('layouts.sidebars')

@section('middle')

@include('profile.cover')


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
@include('includes.post')
@endforeach
{{ $posts->appends(request()->query())->links() }}

@endsection