<!-- new post form -->
<div class="box box-solid" style="border-radius: 3px;">

	<div class="box-header">
		<h3 class="box-title">Nouveau Post</h3>
	</div>

	{{--Publish new post form --}}
	{{ Form::open(['action' => array('PostsController@store', $channelId)]) }}

		<div class="box-body">
			<style type="text/css">
				#progress { display:none; }
			</style>
			@if ($errors->has('post-content'))
				@foreach ($errors->all() as $error)
					<div class="ui small negative message">
						<p>{{ $error }}</p>
					</div>
				@endforeach
			@endif

			{{ Form::textarea('post-content', null, ['placeholder' => 'Dites quelque chose...','rows' => 5, 'required' => true]) }}
		</div>

		<div class="box-footer clearfix no-border">

			{{ Form::button('Publier', array('class' => 'btn btn-default pull-right','type' => 'submit')); }}
			<span class="btn btn-success fileinput-button">
		        <i class="glyphicon glyphicon-plus"></i>
		        <span>Parcourir...</span>
		        <!-- The file input field used as target for the file upload widget -->
		        <input id="fileupload" onclick="document.getElementById('progress').style.display='block'" type="file" name="files[]" multiple >
		    </span>
		    <br>
		    <br>
		    <!-- The global progress bar -->
		    <div id="progress" class="progress">
		        <div class="progress-bar progress-bar-success"></div>
		    </div>
		    <!-- The container for the uploaded files -->
		    <div id="files" class="files" style="width:15%;white-space:nowrap"></div>
		    <br>

			<!-- <div type="file" class="btn btn-default pull-right" style="margin-right:5px"> <i class="fa fa-paperclip"></i></div> -->
			
		</div>

	{{ Form::close() }}

</div><!-- /.box -->