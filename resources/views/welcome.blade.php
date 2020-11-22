@extends('layouts.app')

@section('content')
		<div class="row">
			<div class="col-md-6 col-lg-4">
				<div class="p-3">
					<h1 class="mb-3">{{ config('app.name') }} - Express your thoughts.</h1>
					<img src="{{ asset('images/art.svg') }}" alt="moonlight" class="img-fluid mb-3">
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
							<label for="login_password">Password</label>
							<input type="password" class="form-control" id="login_password" placeholder="Password">
						</div>
						<div class="form-check mb-3">
							<input type="checkbox" class="form-check-input" id="exampleCheck1">
							<label class="form-check-label" for="exampleCheck1">Remember me</label>
						</div>
						<button type="submit" class="btn btn-primary">Login</button>
					</form>
				</div>
			</div>
			<div class="col-md-6 col-lg-4">
				<div class="panel">
					<h1>Signup</h1>
					<form>
						<div class="form-group">
							<label for="first_name">First name</label>
							<input id="first_name" name="first_name" type="text" class="form-control">
						</div>
						<div class="form-group">
							<label for="last_name">Last name</label>
							<input id="last_name" name="last_name" type="text" class="form-control">
						</div>
						<div class="form-group">
							<label for="email">Email address</label>
							<input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
							<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
						</div>
						<div class="form-group">
							<label for="password">Password</label>
							<input type="password" class="form-control" id="password" placeholder="Password">
						</div>
						<div class="form-group">
							<label for="confirm_password">Confrim password</label>
							<input type="password" class="form-control" id="confirm_password" placeholder="Re-enter password">
						</div>
						<div class="form-check mb-3">
							<input type="checkbox" class="form-check-input" id="t&c">
							<label class="form-check-label" for="t&c">I agree to terms & conditions.</label>
						</div>
						<button type="submit" class="btn btn-primary">Register</button>
					</form>
				</div>
			</div>
		</div>
@endsection