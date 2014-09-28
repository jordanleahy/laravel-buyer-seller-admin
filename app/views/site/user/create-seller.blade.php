@extends('site.layouts.default')

{{-- Web site Title --}}
@section('title')
{{{ Lang::get('user/user.register') }}} ::
@parent
@stop

{{-- Content --}}
@section('content')
<div class="page-header">
	<h1>Signup</h1>
</div>
{{ Form::open(array('url' => 'user/create')) }}
<input type="hidden"
<fieldset>
    <div class="form-group">
        <label for="username">Username</label>
        <input class="form-control" placeholder="Username" type="text" name="username" id="username" value="">
    </div>
    <div class="form-group">
        <label for="email">Email <small>Confirmation required</small></label>
        <input class="form-control" placeholder="Email" type="text" name="email" id="email" value="">
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input class="form-control" placeholder="Password" type="password" name="password" id="password">
    </div>
    <div class="form-group">
        <label for="password_confirmation">Confirm Password</label>
        <input class="form-control" placeholder="Confirm Password" type="password" name="password_confirmation" id="password_confirmation">
    </div>

    <div class="form-actions form-group">
        <button type="submit" class="btn btn-primary">Create new account</button>
    </div>

</fieldset>
{{ Form::close() }}
@stop
