<?php

namespace App\Events;
use App\Events\Event;


class TestEvent extends Event
{
    public $id;
    
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($id)
    {
        //
        $this->id = $id;
    }
}
