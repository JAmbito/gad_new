<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationsController extends Controller
{
    public function markAsRead(Request $request): JsonResponse
    {
        $id = $request->id;
        Auth::user()->notifications()->find($id)->markAsRead();

        return response()->json([
            'success' => true
        ]);
    }
}
