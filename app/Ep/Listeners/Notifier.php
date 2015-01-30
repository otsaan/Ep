<?php namespace Ep\Listeners;

use Laracasts\Commander\Events\EventListener;

class Notifier extends EventListener {

    public function handle($event)
    {
        $eventName = $this->getEventName($event);
        echo "Notifier: Event $eventName triggered! <br>";
    }
}