@extends('master')

@section('feed')

	@include('posts.create', array('posts' => $posts, 'channelId' => $channelId, 'connectedUserId' => $connectedUserId))

	<div class="ui feed">

		<!-- show all posts -->
		<!-- show post -->
		@include('posts.show', array('posts' => $posts))

	</div>
@stop