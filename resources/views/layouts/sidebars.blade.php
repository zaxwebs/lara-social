@extends('layouts.app')

@section('content')

<div class="row">
	<div class="col-md-6 col-xl-3">
		@include('layouts.partials.sidebars.left')
	</div>
	<div class="col-md-6 col-xl-6">
		@yield('middle')
	</div>
	<div class="col-md-6 col-xl-3">
		@yield('right')
	</div>
</div>

@endsection