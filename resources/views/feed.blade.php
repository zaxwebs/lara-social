@extends('layouts.sidebars')

@section('middle')
@include('layouts.partials.forms.post-create')
<div class="mb-3">
	<h4 class="mb-0">Posts</h4>
</div>
@if($posts->count())
@foreach ($posts as $post)
@include('includes.post')
@endforeach
{{ $posts->links() }}
@else
<div class="alert alert-info">You'll see posts by you and people you follow here.</div>
@endif
@endsection