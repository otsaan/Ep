@extends('master')

@section('feed')

	<div class="ui feed">

		<!-- show all posts -->
		<!-- show post -->


		@foreach ($posts as $post)

			<div class="event">

				<a class="label no-padding">
					<img src="http://dummyimage.com/40x40">
				</a>

				<div class="content">


					<div class="summary">

						<a>{{ $post->user->present()->fullName() }}</a> added <a>2 new images</a>
						<div class="date">{{ $post->present()->recentTime() }}</div>
					</div>

					<div class="extra text">
						{{ $post->content }}
					</div>

					<div class="extra images">
						<a><img src="img/avatar2.png"></a>
						<a><img src="img/avatar2.png"></a>
					</div>

					<div class="meta">

						<a class="like">
							<i class="ion ion-android-favorite"></i> 1 Like
						</a>

						<a class="comment">
							<i class="ion ion-android-chat"></i> 2 Comment
						</a>

					</div>

					<!-- all comments associated with this post -->
					@foreach ($post->has('comments')->orderBy('created_at','desc')->get()->all() as $comment)
						<div class="ui comments">
							<div class="comment">

								<!-- user avatar 35x35 -->
								<a class="avatar">
									<img src="http://dummyimage.com/35x35">
								</a>

								<div class="content">

									<!-- username  -->
									<a class="author">{{ $comment->user->first_name . " " . $comment->user->last_name }}</a>

									<!-- comment date  -->
									<div class="metadata">
										<div class="date">2 days ago</div>
									</div>

									<!-- comment content  -->
									<div class="text">
										{{ $comment->content }}
									</div>

								</div>
							</div>
						</div>
					@endforeach

					<!-- reply form -->
					@include('posts.reply')


				</div>
			</div>

		@endforeach

	</div>
@stop