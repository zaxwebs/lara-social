<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title> @yield('title', 'Social') </title>
	<link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
	@include('layouts.partials.navbar')
	<div class="@yield('container', 'container-fluid')">
		@if(!Session::has('alert.location'))
		@include('layouts.partials.alert')
		@endif
		@yield('content')
	</div>
	<!-- Scripts -->
	<script src="{{ asset('js/app.js') }}" defer></script>
</body>

</html>