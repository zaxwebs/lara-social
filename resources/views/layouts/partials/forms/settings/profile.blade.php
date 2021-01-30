<div class="panel">
	<h4>Profile</h4>
	@if(Session::get('alert.location') === 'settings_profile')
	@include('layouts.partials.alert')
	@endif
	<form method="post" action="{{ route('settings') }}" enctype="multipart/form-data">
		@csrf
		<div class="form-group">
			<label for="settings_profile_image">Profile Image</label>
			<br />
			<input type="file" name="settings_profile_image">
		</div>
		<div class="form-group">
			<label for="settings_profile_bio">Bio</label>
			<textarea name="settings_profile_bio" class="form-control" id="post"
				rows="4">{{ $user->bio || old('settings_profile_bio') }}</textarea>
		</div>
		<button type="submit" class="btn btn-primary">Update Profile</button>
	</form>
</div>