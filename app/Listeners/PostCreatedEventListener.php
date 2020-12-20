<?php

namespace App\Listeners;

use App\Mail\PostStored;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class PostCreatedEventListener
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
     * @param  object  $event
     * @return void
     */
    public function handle(PostCreatedEvent $event)     // Declare event name here..what you created.
    {
        Mail::to('kothaung@gmail.com')->send(new PostStored($event->post)); // PostStored ka xml (manual). PostCreated (markdown built)
                                                            // event htl ka post ko swel htoke
    }
}
