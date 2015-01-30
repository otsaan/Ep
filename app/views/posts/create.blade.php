<!-- new post form -->
<div class="box box-solid" style="border-radius: 3px;">

	<div class="box-header">
		<h3 class="box-title">Post</h3>
	</div>

	{{--Publish new post form --}}
	{{ Form::open(['route' => 'postFeed']) }}

		<div class="box-body">
			{{ Form::textarea('post-content', null, ['placeholder' => 'Say something','rows' => '5']) }}
		</div>

		<div class="box-footer clearfix no-border">

			{{ Form::button('Publier', array('class' => 'btn btn-default pull-right','type' => 'submit')); }}
			<button class="btn btn-default pull-right" style="margin-right:5px"> <i class="fa fa-paperclip"></i></button>
			<button class="btn btn-default pull-left">Cancel</button>
			{{ Form::hidden('channelId', $channelId); }}
			{{ Form::hidden('userId', $userId); }}
		</div>

	{{ Form::close() }}

</div><!-- /.box -->