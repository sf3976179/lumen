<?php

namespace App\Listeners;

use App\Events\SkulogEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\Skulistenlogs;


class SkulogListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(Skulistenlogs $skulistenlogs)
    {

        //
    }

    /**
     * Handle the event.
     *
     * @param  ExampleEvent  $event
     * @return void
     */
    public function handle(SkulogEvent $event)
    {
        // 使用 $event->item 来访问 item ...
        // dd($event->item);
        $skulistenlogs = new Skulistenlogs;

        $skulistenlogs -> user = $this->auth->user()['id'];
        $skulistenlogs -> table = $event -> getTable();
        $skulistenlogs -> type = $event -> getType();
        $skulistenlogs -> old_content = json_encode($event -> getSkuoldlog());
        $skulistenlogs -> new_content = json_encode($event -> getSkunewlog());

        $skulistenlogs -> save();
    }
}
