@extends('layouts.sidebars')

@section('middle')
@include('layouts.partials.forms.post-create')
<div class="mb-3">
	<h4 class="mb-0">Posts</h4>
</div>
@foreach ($posts as $post)
@include('includes.post')
@endforeach
{{ $posts->appends(request()->query())->links() }}
@endsection