<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Basic Page Needs
		================================================== -->
		<meta charset="utf-8" />
		<title>
			@section('title')
                Laravel Buyer and Seller Template Site
			@show
		</title>
		<meta name="keywords" content="buyer, seller" />
		<meta name="author" content="actkatiemacias" />
		<meta name="description" content="Default buyer and seller template site" />

		<!-- Mobile Specific Metas
		================================================== -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- CSS
		================================================== -->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="{{asset('assets/css/ww.css')}}">

		<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
		<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css">
        <!-- Favicons
        ================================================== -->
		<link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{{ asset('assets/ico/apple-touch-icon-144-precomposed.png') }}}">
		<link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{{ asset('assets/ico/apple-touch-icon-114-precomposed.png') }}}">
		<link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{{ asset('assets/ico/apple-touch-icon-72-precomposed.png') }}}">
		<link rel="apple-touch-icon-precomposed" href="{{{ asset('assets/ico/apple-touch-icon-57-precomposed.png') }}}">
		<link rel="shortcut icon" href="{{{ asset('assets/ico/favicon.png') }}}">
	</head>

	<body>
		<!-- To make sticky footer need to wrap in a div -->
		<div id="wrap">
            <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
                <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="/">Site Logo</a>
                    </div>
                </div><!-- /.container-fluid -->
            </nav>
            <div class="content">
                <div class="container">
                @include('notifications')
                @yield('content')
                </div>
                <div id="footer">
                    <div class="container">
                        <div class="row">
                        <div class="col-xs-12 col-sm-3">
                            <h5>Support Us</h5>
                            <ul>
                                <li><span class="fa fa-facebook"></span></li>
                                <li><span class="fa fa-linkedin"></span></li>
                                <li><span class="fa fa-twitter"></span></li>
                                <a href="#">Contact Us</a>
                            </ul>
                        </div>
                        <div class="col-xs-12 col-sm-3">
                            <h5>Company</h5>
                            <ul>
                                <li><a href="/about">About</a></li>
                                <li><a href="/contact">Terms & Privacy</a></li>
                            </ul>
                        </div>
                        <div class="col-xs-12 col-sm-3">
                            <h5>Fiance-To-Be</h5>
                            <ul>
                                <li><a href="/signup">Signup</a></li>
                                <li><a href="/user/login">Login</a></li>
                            </ul>
                        </div>
                        <div class="col-xs-12 col-sm-3">
                            <h5>Jewelers</h5>
                            <ul>
                                <li><a href="/seller-signup">Signup</a></li>
                                <li><a href="/user/login">Login</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
		</div>


		<!-- Javascripts TODO: Need to download them and all assets to be relative for ssl cert
		================================================== -->
            <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
            <script src="{{asset('assets/js/vendor/bootstrap-datetimepicker.js')}}"></script>
            <script src="{{asset('assets/js/wheatandwildflower-cms.js')}}"></script>

        @yield('scripts')
	</body>
</html>
