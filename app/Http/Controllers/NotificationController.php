<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
    //
    public function index(Request $request) {

        $user = auth()->user();

        // defaults
        $notifications = $user->notifications;
        $title = 'Notifications';

        if ($request->path() === 'notifications/unread') {
            $notifications = $user->unreadNotifications;
            $title = 'Unread Notifications';
        }

        $notifications = $notifications->withModels()->simplePaginate(10);

        return view('notifications', compact('notifications', 'title'));
    }
}
