<a class="d-flex text-decoration-none" href="{{ route('profile', $user) }}">
    <div class="pr-2">
        <x-profile-image :image="$user->image" size="sm" />
    </div>
    <div class="d-flex flex-column">
        {{ $user->full_name }}
        <span class="text-muted">{{ $user->username }}</span>
    </div>
</a>