
{{-- form to publish new comment --}}
{{ Form::open(['route' => 'postComment']) }}
	<div class="reply">
		<div class="content">
				<div class="reply-container">
					{{ Form::textarea('reply-content', null, ['placeholder' => 'Ecrire un commentaire','rows' => 1, 'id' => 'reply', 'class' => 'js-auto-size', 'required' => true]) }}
					{{ Form::button('Répondre', array('class' => 'reply-button small ui button','type' => 'submit')); }}
					{{ Form::hidden('postId' , $postId) }}
				</div>
		</div>
	</div>
{{ Form::close() }}