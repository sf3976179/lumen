<?php

namespace App\Events;

use App\Events\Event;
use App\Post;
use Illuminate\Queue\SerializesModels;

class Test1 extends Event
{
    use SerializesModels;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($post)
    {
        //
        // file_put_contents('1.txt',$post);
        $this->data = $post->request;
    }

    public function broadcastOn()
    {
      return [];
    }
}
