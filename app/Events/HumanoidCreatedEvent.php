<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

// models
use App\Humanoid;

class HumanoidCreatedEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $humanoid;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Humanoid $humanoid)
    {
        $this->humanoid = $humanoid;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        if (env('APP_ENV', 'local') === 'local') {
            // return broadcast channel 
            return new Channel(HUMANOID_BROADCAST_CH);
        } else {
            // if environment production, use the pusher sdk manually
            // this is because laravel's integrated pusher broadcast via events depends on curl.cainfo in php.ini.
            // we don't have control over that setting on heroku, but on my local environment in works fine
            $pusher = new Pusher\Pusher(env('PUSHER_APP_KEY'), env('PUSHER_APP_SECRET'), env('PUSHER_APP_ID'), ['cluster' => env('PUSHER_APP_CLUSTER'), encrypted => true]);
            $pusher->trigger(HUMANOID_BROADCAST_CH, 'HumanoidCreatedEvent', $this->humanoid);
        }

        return new Channel();
    }
}
