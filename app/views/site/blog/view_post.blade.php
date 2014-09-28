@extends('site.layouts.default')

{{-- Web site Title --}}
@section('title')
{{{ String::title($post->title) }}} ::
@parent
@stop

{{-- Update the Meta Title --}}
@section('meta_title')
@parent

@stop

{{-- Update the Meta Description --}}
@section('meta_description')
@parent

@stop

{{-- Update the Meta Keywords --}}
@section('meta_keywords')
@parent

@stop

{{-- Content --}}
@section('content')
<h2>{{ $post->title }}</h2>
<div>
    <span class="badge badge-info">Posted {{{ $post->date() }}}</span>
</div>
<p>{{ $post->content() }}</p>
{{ $social }}
{{ $list }}
@stop
