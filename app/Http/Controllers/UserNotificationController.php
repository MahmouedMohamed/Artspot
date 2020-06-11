<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserNotificationController extends Controller
{
    public function show(){
        $notifications = auth()->user()->notifications()->orderBy('created_at','desc')->get()->toArray();
        return $notifications;
    }
    public function read(){
        $notifications = auth()->user()->notifications->where('read_at',null);
        foreach ($notifications as $notification) {
//            dd(get_debug_type($notification));
            $notification->markAsRead();
        }
//        $notifications = $notifications->map(function($item){
//            $item['read_at'] = 1;
//        });
        dd($notifications);
//        return($notifications.length);
    }
}
