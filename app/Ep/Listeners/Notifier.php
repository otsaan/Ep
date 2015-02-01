<?php namespace Ep\Listeners;

use Laracasts\Commander\Events\EventListener;
use Ep\Posts\PostWasPublished;
use Fenos\Notifynder\Facades\Notifynder;

class Notifier extends EventListener
{

    public function  whenPostWasPublished(PostWasPublished $event)
    {
        $users = $event->post->channel->users;

        $channelId = $event->post->channel->id;

        $MultiNotificationsArray = Notifynder::builder()->loop($users, function ($builder, $key, $data) use ($channelId) {
            return $builder->from(\Auth::user()->id)
                ->to($data->id)
                ->category('post')
                ->url("http://localhost:8000/channels/{$channelId}/posts");
        });

        Notifynder::sendMultiple($MultiNotificationsArray);
    }

    //TODO
    /*
     *      * whenCommentWasPublished
     */
}