@foreach (['success', 'info', 'danger'] as $type)
	@if (Session::has($type))
		<div class="alert alert-{{ $type }}">
			{{ session($type) }}
		</div>
	@endif
@endforeach
@if ($errors->any())
	<div class="alert alert-danger">
		<ul>
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
@endif