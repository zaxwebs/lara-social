@extends('layouts.sidebars')

@section('middle')

<h4 class="mb-3">Notifications</h4>

@foreach ($notifications as $notification)
<div class="panel">
	{{ $notification->type }}
</div>
@endforeach

@endsection