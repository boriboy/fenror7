<?php

namespace App\Listeners;

use App\Events\HumanoidCreatedEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotifyHumanoidCreated
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
     * @param  Event  $event
     * @return void
     */
    public function handle(HumanoidCreatedEvent $event)
    {
        logger('inside listener');
    }
}
