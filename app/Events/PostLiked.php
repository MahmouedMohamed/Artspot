<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Notifications\Notification;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Broadcast;

class PostLiked  extends Notification implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $currentUser;
    public $post;
    public $author;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function via($notifiable)
    {
        return ['database'];
    }
    public function __construct($currentUser,$post,$author)
    {
//        $this->dontBroadcastToCurrentUser();
        $this->currentUser=$currentUser;
        $this->post=$post;
        $this->author=$author;
    }
    public function toArray($notifiable)
    {
        return [
            'currentUser' => $this->currentUser,
            'post' => $this->post,
        ];
    }
    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('user.'.$this->author->id);
    }
}
