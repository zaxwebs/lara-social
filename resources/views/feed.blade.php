@extends('layouts.app')

@section('content')
<div class="row">
	<div class="col-lg-6 col-xl-4 offset-xl-4">
		<div class="panel">
			<form method="post" action="#">
				<div class="form-group">
					<label for="post">What's on your mind?</label>
					<textarea class="form-control" id="post" rows="5"></textarea>
				</div>
				<button type="submit" class="btn btn-primary">Publish your post</button>
			</form>
		</div>
	</div>
</div>
@endsection