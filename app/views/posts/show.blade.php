<!-- show post -->
<div class="event">

	<a class="label no-padding">
		<img src="http://dummyimage.com/40x40">
	</a>

	<div class="content">

		<div class="summary">
			<a>Helen Troy</a> added <a>2 new images</a>
			<div class="date">3 days ago</div>
		</div>

		<div class="extra text">
			Ours is a life of constant reruns. We're always circling back to where we'd we started, then starting all over again. Even if we don't run extra laps that day, we surely will come back for more of the same another day soon.
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
		@include('comments.show')

		<!-- reply form -->
		@include('posts.reply')

	</div>
</div>

