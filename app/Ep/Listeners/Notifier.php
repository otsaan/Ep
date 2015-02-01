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
        $postId = $event->post->id;
        $channel=$event->post->channel->name;
        $MultiNotificationsArray = Notifynder::builder()->loop($users, function ($builder, $key, $data) use ($channelId, $postId,$channel) {
            if ($data->id != \Auth::user()->id) {
                return $builder->from(\Auth::user()->id)
                    ->to($data->id)
                    ->category('post')
                    ->extra($channel)
                    ->url("http://localhost:8000/channels/{$channelId}/posts/{$postId}");
            }
        });

        Notifynder::sendMultiple($MultiNotificationsArray);
    }

    //TODO
    /*
     *      * whenCommentWasPublished
     */
}