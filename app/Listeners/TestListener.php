<?php

namespace App\Listeners;

use App\Events\TestEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

// use Dingo\Api\Event\ResponseWasMorphed;

class TestListener
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
     * @param  ExampleEvent  $event
     * @return void
     */
    public function handle(TestEvent  $event)
    {
      dd($event->item);
      // if (isset($event->content['meta']['pagination'])) {
      			// $links = $event->content['meta']['pagination']['links'];
      			// $event->response->headers->set(
      			// 	'link',
      			// 	sprintf('<%s>; rel="next", <%s>; rel="prev"', $links['links']['next'], $links['links']['previous'])
      			// );
      // }

    }
}
