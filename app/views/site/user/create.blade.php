@extends('site.layouts.default')

{{-- Web site Title --}}
@section('title')
{{{ Lang::get('user/user.register') }}} ::
@parent
@stop

{{-- Content --}}
@section('content')
<div class="page-header">
	<h1>Let us help you search with clarity</h1>
</div>
<!-- multistep form -->
{{ Form::open(array('url' => 'user/create' , 'id'=>'lead-gen')) }}
    <!-- progressbar -->
    <ul id="progressbar">
        <li class="active"><span>Step 1: </span>Choose Your Style</li>
        <li><span>Step 2: </span>Knowledge & Date</li>
        <li><span>Step 3: </span>Contact Information</li>
    </ul>
    <!-- fieldsets -->
    <fieldset class="form-step row">
        <h2 class="fs-title">Step 1: Choose Your Style</h2>
        <div class="style-option accessible col-xs-4">
            <img src="http://placehold.it/250x250">
            <h3>Accessible</h3>
            <div class="style-description">
                Practical price points with diamonds under $2,5000
            </div>
        </div>
        <div class="style-option confident col-xs-4">
            <img src="http://placehold.it/250x250">
            <h3>Confident</h3>
            <div class="style-description">
                GIA, AGS, IGI, and EGL grading; up to 1 carat, with prices ranging from $2,500 to $10,000
            </div>
        </div>
        <div class="style-option exclusive col-xs-4">
            <img src="http://placehold.it/250x250">
            <h3>Exclusive</h3>
            <div class="style-description">
                GIA graded, 2 carat and larger, Boutique, $10,000+
            </div>
        </div>
        <input type="button" name="next" class="next action-button" value="Next Step" />
    </fieldset>

    <fieldset class="form-step row">
        <h2 class="fs-title">Step 2: Basics and Timeline</h2>
        <div class='input-group date' class='datetimepicker'>
            <input type='text' class="form-control" />
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
        </div>
        <input type="text" name="zipcode" placeholder="zip code" />
        <label for="amount">Price range:</label>
        <input type="text" id="amount" readonly>
        <div id="slider-range"></div>
        <input type="button" name="next" class="next action-button" value="Next Step" />
    </fieldset>

    <fieldset class="form-step row">
        <h2 class="fs-title">Step 3: Contact Information</h2>
        <input type="text" name="fname" placeholder="First Name" />
        <input type="email" name="email" placeholder="example@example.com"
        <input type="text" name="phone" placeholder="Phone" />
        <input type="password" name="password" placeholder="Password">
        <input type="submit" name="submit" class="submit action-button" value="Start Your Search"/>
    </fieldset>
</form>
@stop
