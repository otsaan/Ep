<?php namespace Ep\Listeners;

use Laracasts\Commander\Events\EventListener;
use Ep\Posts\PostWasPublished;
use Ep\Comments\CommentWasPublished;
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
                    ->url("/channels/{$channelId}/posts/{$postId}");
            }
        });

        Notifynder::sendMultiple($MultiNotificationsArray);
    }

    public function   whenCommentWasPublished(CommentWasPublished $event){
        $toUserId = $event->comment->post->user->id;

        $postChannel = $event->comment->post->channel;

        $post = $channel = $event->comment->post;
        //user
        if ($toUserId != \Auth::user()->id) {

            $notificationData = Notifynder::builder()->from('User', \Auth::user()->id)
                ->to('User', $toUserId)
                ->category('comment')
                ->url("/channels/{$postChannel->id}/posts/{$post->id}")
                ->extra($postChannel->name)
                ->getArray();

            Notifynder::send($notificationData);
        }
    }

}