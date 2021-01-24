@extends('layouts.sidebars')

@section('middle')

@include('profile.cover')


@if($user->is_viewer)
@include('layouts.partials.forms.post-create')
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