@extends('site.layouts.default')
{{-- Content --}}
@section('content')
    <div class="row signup">
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <h2>Contact Us</h2>
            <h3>Free and unbiased consultation</h3>
            <a class="btn" href="/user/create">Contact Us Today</a>
            <div>*recommended</div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <h2>Find Jewelers</h2>
            <h3>Search quality jewelers</h3>
            <input type="text" name="search" placeholder="search">
            <a class="btn" href="/search"><span class="fa fa-search"></span></a>
        </div>
    </div>
@stop
