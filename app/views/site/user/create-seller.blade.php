@extends('site.layouts.default')

{{-- Web site Title --}}
@section('title')
{{{ Lang::get('user/user.register') }}} ::
@parent
@stop

{{-- Content --}}
@section('content')
<div class="page-header">
	<h1>Create your public profile on JewelerMaps</h1>
</div>

<!-- multistep form -->
{{ Form::open(array('url' => 'user/create' , 'id'=>'lead-gen')) }}
<!-- progressbar -->
<ul id="progressbar">
    <li class="active">Basic Info</li>
    <li>Location</li>
    <li>Items</li>
    <li>Laboratories</li>
    <li>Brands</li>
    <li>Price Range</li>
    <li>Accredidations ^ policies</li>
    <li>Languages</li>
    <li>Working Hours</li>
    <li>Photo</li>
    <li>Bio</li>
</ul>
<!-- fieldsets -->
<fieldset class="form-step row">
    <h2 class="fs-title">Basic Information</h2>
    <div class="col-xs-6">
        <input type="text" name="Company" placeholder="Company" />
        <input type="text" name="Title" placeholder="Title" />
        <input type="text" name="City" placeholder="City" />
        <input type="text" name="State" placeholder="State" />
    </div>
    <div class="col-xs-6 hidden-xs">
        <img src="http://placehold.it/250x250">
        A Jewler Maps profile helps you...<br>
        Showcase your skills and experience<br>
        Be found by a fiance-to-be<br>
        Build your online brand<br>
    </div>
    <input type="button" name="previous" class="previous action-button" value="Previous Step" />
    <input type="button" name="next" class="next action-button" value="Next Step" />
</fieldset>

<fieldset class="form-step row">
    <h2 class="fs-title">Company Address*</h2>
    <div class="col-xs-6">
        <input type="text" name="Street 1" placeholder="Street 1" />
        <input type="text" name="Street 2" placeholder="Street 2" />
        <input type="text" name="City" placeholder="City" />
        <input type="text" name="State" placeholder="State" />
        <input type="text" name="Zip" placeholder="Zip" />
    </div>
    <div class="col-xs-6 hidden-xs">
        <iframe width="100%" height="250" frameborder="0" style="border:0"
                src="https://www.google.com/maps/embed/v1/place?q=LA%20Jewelry%20District%2C%20South%20Hill%20Street%2C%20Los%20Angeles%2C%20CA%2C%20United%20States&key=AIzaSyCIvBteiWrEZf7AJH5bl3vRqPys86bBDdw">
        </iframe>
    </div>
    <input type="button" name="previous" class="previous action-button" value="Previous Step" />
    <input type="button" name="next" class="next action-button" value="Next Step" />
</fieldset>

<fieldset class="form-step row">
    <h2 class="fs-title">Diamond Items You Carry*</h2>
    <div class="col-xs-12">
        <input type="checkbox" name="Engagement Rings" value="engagement-rings"/>
        <input type="checkbox" name="Wedding Bands" value="wedding-bands"/>
        <input type="checkbox" name="Diamond Earrings" value="diamond-earrings"/>
        <input type="checkbox" name="Diamond Pendents" value="diamond-pendents"/>
        <input type="checkbox" name="Diamond Bracelets" value="diamond-bracelets"/>
        <input type="checkbox" name="Eternity Rings" value="eternity-rings"/>
    </div>
    <input type="button" name="previous" class="previous action-button" value="Previous Step" />
    <input type="button" name="next" class="next action-button" value="Next Step" />
</fieldset>
<fieldset class="form-step row">
    <h2 class="fs-title">Laboratories You Carry</h2>
    <div class="col-xs-12">
        <input type="checkbox" name="GIA" value="gia"/>
        <input type="checkbox" name="IGI" value="igi"/>
        <input type="checkbox" name="AGS" value="ags"/>
        <input type="checkbox" name="EGL USA" value="egl usa"/>
        <input type="checkbox" name="HRD" value="hrd"/>
        <input type="checkbox" name="House" value="house"/>
    </div>
    <input type="button" name="previous" class="previous action-button" value="Previous Step" />
    <input type="button" name="next" class="next action-button" value="Next Step" />
</fieldset>
<!--TODO: populate brands from database-->
<fieldset class="form-step row">
    <h2 class="fs-title">Brands You Carry*</h2>
    <div class="col-xs-12">
        <input type="checkbox" name="A. Jaffe" value="brand1""/>
        <input type="checkbox" name="Add-a-Perl" value="brand2"/>
        <input type="checkbox" name="A. Link" value="brand3"/>
        <input type="checkbox" name="Alan Friedman" value="brand4"/>
        <input type="checkbox" name="Aaron Basha" value="brand5"/>
        <input type="checkbox" name="Continued" value="brand6"/>
    </div>
    <input type="button" name="previous" class="previous action-button" value="Previous Step" />
    <input type="button" name="next" class="next action-button" value="Next Step" />
</fieldset>
<fieldset class="form-step row">
    <h2 class="fs-title">Your Average Selling Range</h2>
    <div class="col-xs-12">
        <input type="text" name="low" placeholder="0"/>
        <input type="text" name="high" placeholder="14000"/>
    </div>
    <input type="button" name="previous" class="previous action-button" value="Previous Step" />
    <input type="button" name="next" class="next action-button" value="Next Step" />
</fieldset>
<fieldset class="form-step row">
    <h2 class="fs-title">Accreditations & Policies</h2>
    <div class="col-xs-12">
        <input type="checkbox" name="30 Day Return" value="30 Day Return""/>
        <input type="checkbox" name="BBB Accreditation" value="BBB Accreditation"/>
        <input type="checkbox" name="Financing Available" value="Financing Available"/>
        <input type="checkbox" name="Upgrade Policy" value="Upgrade Policy"/>
        <input type="checkbox" name="JBT Accreditation" value="JBT Accreditation"/>
        <input type="checkbox" name="JVC Accreditation" value="JVC Accreditation"/>
    </div>
    <input type="button" name="previous" class="previous action-button" value="Previous Step" />
    <input type="button" name="next" class="next action-button" value="Next Step" />
</fieldset>
<fieldset class="form-step row">
    <h2 class="fs-title">Languages You Speak</h2>
    <div class="col-xs-12">
        <select multiple>
            <option value="English" name="English">English</option>
            <option value="Spanish" name="Spanish">Spanish</option>
            <option value="Chinese" name="Chinese">Chinese</option>
        </select>
    </div>
    <input type="button" name="previous" class="previous action-button" value="Previous Step" />
    <input type="button" name="next" class="next action-button" value="Next Step" />
</fieldset>
<fieldset class="form-step row">
    <h2 class="fs-title">Working Hours</h2>
    <div class="col-xs-12">
        <ul>
            <li>Monday</li>
            <li>Tuesday</li>
            <li>Wednesday</li>
            <li>Thursday</li>
            <li>Friday</li>
            <li>Saturday</li>
            <li>Sunday</li>
        </ul>
    </div>
    <input type="button" name="previous" class="previous action-button" value="Previous Step" />
    <input type="button" name="next" class="next action-button" value="Next Step" />
</fieldset>
<fieldset class="form-step row">
    <h2 class="fs-title">Upload A Photo</h2>
    <div class="col-xs-6">
        <form action="{{ URL::to('user/' . 1 . '/cover')}}" class="dropzone" id="my-awesome-dropzone">
            <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
        </form>
    </div>
    <div class="col-xs-6">
        <textarea></textarea>
    </div>
    <input type="button" name="previous" class="previous action-button" value="Previous Step" />
    <input type="submit" name="submit" class="submit action-button" value="Finish"/>
</fieldset>

{{ Form::close() }}
@stop
