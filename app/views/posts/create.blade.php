<!-- new post form -->
<div class="box box-solid" style="border-radius: 3px;">

	<div class="box-header">
		<h3 class="box-title">Post</h3>
	</div>

	{{--Publish new post form --}}
	{{ Form::open(['action' => array('PostsController@store', $channelId)]) }}

		<div class="box-body">

			@if ($errors->has('post-content'))
				@foreach ($errors->all() as $error)
					<div class="ui small negative message">
						<p>{{ $error }}</p>
					</div>
				@endforeach
			@endif

			{{ Form::textarea('post-content', null, ['placeholder' => 'Say something','rows' => 5, 'required' => true]) }}
		</div>

		<div class="box-footer clearfix no-border">

			{{ Form::button('Publier', array('class' => 'btn btn-default pull-right','type' => 'submit')); }}
			<div type="file" class="btn btn-default pull-right" style="margin-right:5px"> <i class="fa fa-paperclip"></i></div>
			{{ Form::reset('Cancel', ['class' => 'btn btn-default pull-left']) }}
		</div>

	{{ Form::close() }}

</div><!-- /.box -->