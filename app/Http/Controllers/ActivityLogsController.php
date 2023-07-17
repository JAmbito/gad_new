<?php

namespace App\Http\Controllers;

use App\ActivityLogs;
use Illuminate\Http\Request;

class ActivityLogsController extends Controller
{
    public function index() {
        return view('backend.pages.users.activity_logs');
    }
    
    public function get() {
        if(request()->ajax()) {
            return datatables()->of(
                Activitylogs::with('user')->orderBy('id','desc')->get()
            )
            ->addIndexColumn()
            ->make(true);
        }
    }
}
