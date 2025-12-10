<?php

namespace App\Http\Controllers\ActivityLog;

use App\Http\Controllers\Controller;
use App\Models\ActivityLog;
use Illuminate\Http\Request;

class ActivityLogController extends Controller
{
    public function index()
    {
        $activityLogs = ActivityLog::orderBy('id', 'desc')->get();
        return view('admin.logs_management.activity_log.index', compact('activityLogs'));
    }
}
