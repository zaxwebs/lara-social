<div class="list-group">
	<a href="{{ route('home') }}"
		class="list-group-item list-group-item-action {{ Route::is('home') ? 'active' : null}}">Home</a>
	<a href="{{ route('profile') }}"
		class="list-group-item list-group-item-action {{ Request::is('profile/' . auth()->user()->username) || Request::is('profile')  ? 'active' : null }}">Profile</a>
	<a href="{{ route('notifications') }}"
		class="list-group-item list-group-item-action {{ Route::is('notifications', 'notifications.unread') ? 'active' : null}}">Notifications</a>
	<a href="#" class="list-group-item list-group-item-action">Settings</a>
</div>