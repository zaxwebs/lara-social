<div class="list-group">
	<a href="{{ route('home') }}"
		class="list-group-item list-group-item-action {{ Route::is('home') ? 'active' : null}}">Home</a>
	<a href="{{ route('profile') }}"
		class="list-group-item list-group-item-action {{ Request::is('profile/' . auth()->user()->username) || Request::is('profile')  ? 'active' : null }}">Profile</a>
	@php($unread_notifications_count = count(auth()->user()->unreadNotifications))
	<a href="{{ $unread_notifications_count ? route('notifications.unread') : route('notifications')}}"
		class="list-group-item list-group-item-action d-flex justify-content-between align-items-center {{ Route::is('notifications', 'notifications.unread') ? 'active' : null}}">
		Notifications
		@if($unread_notifications_count)
		<span class="badge badge-primary badge-pill">{{ $unread_notifications_count }}</span>
		@endif
	</a>
	<a href="#" class="list-group-item list-group-item-action">Settings</a>
</div>