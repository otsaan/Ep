<?php namespace Ep\Listeners;

use Laracasts\Commander\Events\EventListener;

class EmailNotifier extends EventListener{

    public function handle($event)
    {
        echo "Email notifier triggered! <br>";
    }
}