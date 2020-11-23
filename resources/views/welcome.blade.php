@extends('layouts.app')

@section('content')
		<div class="row">
			<div class="col-md-6 col-lg-4">
				<div class="p-3">
					<h1 class="mb-3">{{ config('app.name') }} by Zack Webster.</h1>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam eu suscipit elit, at imperdiet orci. Cras commodo eget eros vitae pharetra. Donec sit amet hendrerit ligula, sit amet efficitur elit. Curabitur vel purus sem. Donec feugiat erat felis, vel interdum velit consectetur fringilla. Curabitur vitae suscipit sapien, eget scelerisque justo. Maecenas rhoncus vulputate turpis, vitae pulvinar dolor efficitur ac.</p>
				</div>
			</div>
			<div class="col-md-6 col-lg-4">
				<div class="panel">
					<h1>Login</h1>
					@if(Session::get('alert.location') === 'login')
						@include('layouts.partials.alert')
					@endif
					<form method="post" action="{{ route('login') }}">
						@csrf
						<div class="form-group">
							<label for="login_email">Email address</label>
							<input name="login_email" type="email" class="form-control" id="login_email" placeholder="Enter email" value="{{ old('login_email') }}">
						</div>
						<div class="form-group">
							<label for="login_password">Password</label>
							<input name="login_password" type="password" class="form-control" id="login_password" placeholder="Password">
						</div>
						<div class="form-check mb-3">
							<input name="login_remember" type="checkbox" class="form-check-input" id="remember" checked>
							<label class="form-check-label" for="remember">Remember me</label>
						</div>
						<button type="submit" class="btn btn-primary">Login</button>
					</form>
				</div>
			</div>
			<div class="col-md-6 col-lg-4">
				<div class="panel">
					<h1>Signup</h1>
					@if(Session::get('alert.location') === 'signup')
						@include('layouts.partials.alert')
					@endif
					<form method="post" action="{{ route('signup') }}">
						@csrf
						<div class="form-group">
							<label for="first_name">First name</label>
							<input id="first_name" name="signup_first_name" type="text" class="form-control" value={{ old('signup_first_name') }}>
						</div>
						<div class="form-group">
							<label for="last_name">Last name</label>
							<input id="last_name" name="signup_last_name" type="text" class="form-control" value={{ old('signup_last_name') }}>
						</div>
						<div class="form-group">
							<label for="signup_email">Email address</label>
							<input name="signup_email" type="email" class="form-control" id="signup_email" aria-describedby="signup_email_help" placeholder="Enter email" value={{ old('signup_email') }}>
							<small id="signup_email_help" class="form-text text-muted">We'll never share your email with anyone else.</small>
						</div>
						<div class="form-group">
							<label for="signup_password">Password</label>
							<input name="signup_password" type="password" class="form-control" id="signup_password" placeholder="Password">
						</div>
						<div class="form-group">
							<label for="confirm_password">Confrim password</label>
							<input name="signup_password_confirmation" type="password" class="form-control" id="confirm_password" placeholder="Re-enter password">
						</div>
						<div class="form-check mb-3">
							<input name="signup_tc" type="checkbox" class="form-check-input" id="signup_tc" {{(old('signup_tc') == "on") ? 'checked': ''}}>
							<label class="form-check-label" for="tc">I agree to terms & conditions.</label>
						</div>
						<button type="submit" class="btn btn-primary">Register</button>
					</form>
				</div>
			</div>
		</div>
@endsection