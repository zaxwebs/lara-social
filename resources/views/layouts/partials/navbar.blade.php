<!--navigation-->
<nav class="navbar navbar-expand-md navbar-dark bg-primary mb-3">
	<a class="navbar-brand" href="#">{{ config('app.name') }}</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar"
		aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>

	<div class="collapse navbar-collapse" id="navbar">
		<ul class="navbar-nav mr-auto">
			@auth
			<li class="nav-item {{ Route::is('home') ? 'active' : null}}">
				<a class="nav-link" href="{{ route('home') }}">Home</a>
			</li>
			<li class="nav-item">
				<a class="nav-link {{ Request::is('profile/' . auth()->user()->username) || Request::is('profile')  ? 'active' : null }}"
					href="{{ route('profile') }}">Profile</a>
			</li>
			@endauth
			<li class="nav-item">
				<a class="nav-link" href="#">About</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#">Link</a>
			</li>
		</ul>
		<ul class="navbar-nav">
			@guest
			<li class="nav-item">
				<a class="nav-link" href="#">Login</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="{{ route('signup') }}">Signup</a>
			</li>
			@endguest
			@auth
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="dropdown-p" data-toggle="dropdown" aria-haspopup="true"
					aria-expanded="false">{{ auth()->user()->full_name }}</a>
				<div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-p">
					<a class="dropdown-item" href="#">Settings</a>
					<a class="dropdown-item" href="#">Action</a>
					<a class="dropdown-item" href="#">Another action</a>
					<a class="dropdown-item" href="#">Something else here</a>
					<form class="dropdown-item p-0" method="post" action="{{ route('logout') }}">
						@csrf
						<button class="btn btn-link px-4 py-1 w-100 text-left" role="link">Logout</button>
					</form>
				</div>
			</li>
			@endauth
		</ul>
	</div>
</nav>