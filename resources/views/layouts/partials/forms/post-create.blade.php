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