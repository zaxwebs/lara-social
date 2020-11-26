@extends('layouts.app')

@section('content')

<div class="row">
	<div class="col-md-6 col-xl-4">
		@yield('left')
	</div>
	<div class="col-md-6 col-xl-4">
		@yield('middle')
	</div>
	<div class="col-md-6 col-xl-4">
		@yield('right')
	</div>
</div>

@endsection