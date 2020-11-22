@extends('layouts.app')

@section('content')
		<div class="row">
			<div class="col-md-6 col-lg-4">
				<div class="p-3">
					<h1 class="mb-3">{{ config('app.name') }} by Zack Webster.</h1>
					<img src="{{ asset('images/shore.jpg') }}" alt="cover" class="img-fluid mb-3">
				</div>
			</div>
			<div class="col-md-6 col-lg-4">
				<div class="panel">
					<h1>Login</h1>
					<form>
						<div class="form-group">
							<label for="email">Email address</label>
							<input type="email" class="form-control" id="email" placeholder="Enter email">
						</div>
						<div class="form-group">
							<label for="password">Password</label>
							<input type="password" class="form-control" id="password" placeholder="Password">
						</div>
						<div class="form-check mb-3">
							<input name="remember" type="checkbox" class="form-check-input" id="remember">
							<label class="form-check-label" for="remember">Remember me</label>
						</div>
						<button type="submit" class="btn btn-primary">Login</button>
					</form>
				</div>
			</div>
			<div class="col-md-6 col-lg-4">
				<div class="panel">
					<h1>Signup</h1>
					@if ($errors->any())
						<div class="alert alert-danger">
								<ul>
										@foreach ($errors->all() as $error)
												<li>{{ $error }}</li>
										@endforeach
								</ul>
						</div>
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