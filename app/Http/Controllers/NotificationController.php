<?php

namespace App\Http\Controllers;

use App\Models\Notification as ModelsNotification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function notification(){
        $notification=ModelsNotification::all();
        return response()->json($notification);
    }
}
