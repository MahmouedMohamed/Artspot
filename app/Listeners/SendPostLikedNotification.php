<?php

namespace App\Listeners;

use App\Events\PostLiked;
use App\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;
use Illuminate\Queue\InteractsWithQueue;

class SendPostLikedNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  PostLiked  $event
     * @return void
     */
    public function handle(PostLiked $event)
    {
        $user = User::where('id',$event->author->id)->get()->first();
        dd($user->notify($event));
	//dd($user);
    }
}
