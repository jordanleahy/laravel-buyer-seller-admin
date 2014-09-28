@extends('site.layouts.default')
{{-- Content --}}
@section('content')
    <div class="row signup">
        <div class="col-xs-12">
            <h2>Discover Great Local Jewelers</h2>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Search">
                <span class="glyphicon glyphicon-search">
            </div>
        </div>
        <div class="col-xs-12 search-map">
            <iframe width="100%" height="250" frameborder="0" style="border:0"
                src="https://www.google.com/maps/embed/v1/place?q=LA%20Jewelry%20District%2C%20South%20Hill%20Street%2C%20Los%20Angeles%2C%20CA%2C%20United%20States&key=AIzaSyCIvBteiWrEZf7AJH5bl3vRqPys86bBDdw">
            </iframe>
        </div>
        @for ($i=0; $i < 12; $i++)
            <div class="col-xs-6 col-sm-4 search-result">
                <img src="http://placehold.it/150x150">
                <div class="name">Jeweler Name {{$i+1}}</div>
                <div class="info">City, State</div>
                <div class="rating">Rating</div>
            </div>
        @endfor
    </div>
@stop
