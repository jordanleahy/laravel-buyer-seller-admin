@extends('site.layouts.default')
{{-- Content --}}
@section('content')
    <div class="row signup">
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <h2>Customer signup here!</h2>
                <a href="/user/signup">Signup</a>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <h2>Existing users login here!</h2>
                <a href="/user/login">Login</a>
        </div>
    </div>
@stop
