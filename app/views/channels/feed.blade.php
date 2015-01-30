@extends('master')

@section('feed')

	@include('posts.create', array('channelId' => $channelId, 'userId' => $userId))
	<div class="ui feed">

		<!-- show all posts -->
		<!-- show post -->
		@include('posts.show', array('posts' => $posts, 'userId' => $userId, 'channelId' => $channelId))

	</div>
@stop