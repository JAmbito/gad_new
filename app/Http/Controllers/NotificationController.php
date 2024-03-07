<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    //
    public function index()
    {
        $notifications_count = Auth::user()->notifications->count();
        return view('backend.pages.notifications.index', compact('notifications_count'));
    }
}
