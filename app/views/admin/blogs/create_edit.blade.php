@extends('admin.layouts.default')

{{-- Content --}}
{{ HTML::style('assets/css/vendor/basic.css');}}
{{ HTML::script('assets/js/vendor/dropzone.js');}}
@section('content')
	<!-- Tabs -->
		<ul class="nav nav-tabs">
			<li class="active"><a href="#tab-general" data-toggle="tab">General</a></li>
			<li><a href="#tab-meta-data" data-toggle="tab">Meta data</a></li>
		</ul>
	<!-- ./ tabs -->
	@if (isset($post->id))
	<div class="col-md-12">
	 <label class="control-label" for="cover">Post Cover</label>
		<form action="{{ URL::to('admin/blogs/' . $post->id . '/cover')}}" class="dropzone" id="my-awesome-dropzone">		
			<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
		</form>
		@if ($cover = $post->image)
			<div class="col-xs-12">{{$cover->filename}}
			    <img src="{{URL::asset('/uploads/'.$post->id.'/'.$cover->filename)}}"/>
            </div>
		@endif
	</div>
	@endif
	@if (isset($post->id))
	<div class="col-md-12">
	 <label class="control-label" for="cover">Post Images</label>
		<form action="{{ URL::to('admin/blogs/' . $post->id . '/images')}}" class="dropzone" id="my-awesome-dropzone">		
			<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
		</form>
	</div>
	@endif
	{{-- Edit Blog Form --}}
	<form class="form-horizontal" method="post" action="@if (isset($post)){{ URL::to('admin/blogs/' . $post->id . '/edit') }}@endif" autocomplete="off">
		<!-- CSRF Token -->
		<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
		<!-- ./ csrf token -->

		<!-- Tabs Content -->
		<div class="tab-content">
			<!-- General tab -->
			<div class="tab-pane active" id="tab-general">
				<!-- Image -->	
				<div class="form-group {{{ $errors->has('title') ? 'error' : '' }}}">
					<div class="col-md-12">
						@if (isset($post) && count($post->images) > 0)
							@foreach ($post->images as $image)
								<div class="col-xs-3 post-image">
									<div>{{$image->filename}}</div>
                                    <a href="#" class="remove-image" data-value="{{$image->id}}"><span class="glyphicon glyphicon-minus-sign"></span></a>
									<img id="image-{{{$image->id}}}" class="image-thumb col-xs-12" src="{{URL::asset('/uploads/'.$post->id.'/'.$image->filename)}}"/>
								</div>
							@endforeach							

						@endif
					</div>
				</div>
				<!-- ./ image -->
                <!-- Post Visibility -->
                <div class="form-group {{{ $errors->has('title') ? 'error' : '' }}}">
                    <div class="col-md-12">
                        <label class="control-label" for="visible">Post Visibility</label>
                        <input type="checkbox" name="visible" id="visible" value="visible" {{{ (isset($post) && $post->visible) ? 'checked' : '' }}} />
                    </div>
                </div>
				<!-- Post Title -->
				<div class="form-group {{{ $errors->has('title') ? 'error' : '' }}}">
                    <div class="col-md-12">
                        <label class="control-label" for="title">Post Title</label>
						<input class="form-control" type="text" name="title" id="title" value="{{{ Input::old('title', isset($post) ? $post->title : null) }}}" />
					</div>
				</div>
				<!-- ./ post title -->
				<!-- Post Category -->
				<div class="form-group {{{ $errors->has('category') ? 'error' : '' }}}">
                    <div class="col-md-12">
                        <label class="control-label" for="category">Post Category</label>
						<select multiple="true" class="form-control" name="category[]" id="category">
						@foreach ($categories as $category)
							@if ($category['selected'])
								<option value="{{$category['id']}}" selected>{{$category['name']}}</option>
							@else
								<option value="{{$category['id']}}" >{{$category['name']}}</option>
							@endif
						@endforeach
						
						</select>
					</div>
				</div>
				<!-- ./ post category -->
				<!-- Content -->
				<div class="form-group {{{ $errors->has('content') ? 'has-error' : '' }}}">
					<div class="col-md-12">
                        <label class="control-label" for="content">Content</label>
                        <input type="button" id="insert-img" value="Insert Image">
						<textarea id="post-body" class="form-control full-width wysihtml5" name="content" value="content" rows="10">{{{ Input::old('content', isset($post) ? $post->content : null) }}}</textarea>
						{{{ $errors->first('content', '<span class="help-block">:message</span>') }}}
					</div>
				</div>
				<!-- ./ content -->
			</div>
			<!-- ./ general tab -->

			<!-- Meta Data tab -->
			<div class="tab-pane" id="tab-meta-data">
				<!-- Meta Title -->
				<div class="form-group {{{ $errors->has('meta-title') ? 'error' : '' }}}">
					<div class="col-md-12">
                        <label class="control-label" for="meta-title">Meta Title</label>
						<input class="form-control" type="text" name="meta-title" id="meta-title" value="{{{ Input::old('meta-title', isset($post) ? $post->meta_title : null) }}}" />
						{{{ $errors->first('meta-title', '<span class="help-block">:message</span>') }}}
					</div>
				</div>
				<!-- ./ meta title -->

				<!-- Meta Description -->
				<div class="form-group {{{ $errors->has('meta-description') ? 'error' : '' }}}">
					<div class="col-md-12 controls">
                        <label class="control-label" for="meta-description">Meta Description</label>
						<input class="form-control" type="text" name="meta-description" id="meta-description" value="{{{ Input::old('meta-description', isset($post) ? $post->meta_description : null) }}}" />
						{{{ $errors->first('meta-description', '<span class="help-block">:message</span>') }}}
					</div>
				</div>
				<!-- ./ meta description -->

				<!-- Meta Keywords -->
				<div class="form-group {{{ $errors->has('meta-keywords') ? 'error' : '' }}}">
					<div class="col-md-12">
                        <label class="control-label" for="meta-keywords">Meta Keywords</label>
						<input class="form-control" type="text" name="meta-keywords" id="meta-keywords" value="{{{ Input::old('meta-keywords', isset($post) ? $post->meta_keywords : null) }}}" />
						{{{ $errors->first('meta-keywords', '<span class="help-block">:message</span>') }}}
					</div>
				</div>
				<!-- ./ meta keywords -->
			</div>
			<!-- ./ meta data tab -->
		</div>
		<!-- ./ tabs content -->
		
		
		
		<!-- Form Actions -->
		<div class="form-group">
			<div class="col-md-12">
				<element class="btn-cancel close_popup">Cancel</element>
				<button type="reset" class="btn btn-default">Reset</button>
				<button type="submit" class="btn btn-success">Update</button>
			</div>
		</div>
		<!-- ./ form actions -->
	</form>
@stop
