
{{-- form to publish new comment --}}
{{ Form::open(['route' => 'postComment']) }}
	<div class="reply">
		<div class="content">
				<div class="reply-container">
					{{ Form::textarea('reply-content', null, ['placeholder' => 'Répondre','rows' => '1', 'id' => 'reply', 'class' => 'js-auto-size']) }}
					{{ Form::button('Reply', array('class' => 'reply-button small ui button','type' => 'submit')); }}
					{{ Form::hidden('postId', $postId); }}
					{{ Form::hidden('userId', $userId); }}
				</div>
		</div>
	</div>
{{ Form::close() }}