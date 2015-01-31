
{{-- form to publish new comment --}}
{{ Form::open(['action' => array('CommentsController@store', $postId)]) }}
	<div class="reply">
		<div class="content">
				<div class="reply-container">
					{{ Form::textarea('reply-content', null, ['placeholder' => 'Ecrire un commentaire','rows' => 1, 'id' => 'reply', 'class' => 'js-auto-size', 'required' => true]) }}
					{{ Form::button('Répondre', array('class' => 'reply-button small ui button','type' => 'submit')); }}
				</div>
		</div>
	</div>
{{ Form::close() }}