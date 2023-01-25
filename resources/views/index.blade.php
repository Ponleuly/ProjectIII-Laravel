 <!-- /*
* Bootstrap 5
* Template Name: Furni
* Template Author: Untree.co
* Template URI: https://untree.co/
* License: https://creativecommons.org/licenses/by/3.0/
*/ -->
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="author" content="Untree.co">
  <link rel="shortcut icon" href="favicon.png">

  <meta name="description" content="" />
  <meta name="keywords" content="bootstrap, bootstrap4" />

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="{{url('frontend/css/bootstrap.min.css')}}">
		<link rel="stylesheet" href="{{url('frontend/css/tiny-slider.css')}}">
		<link rel="stylesheet" href="{{url('frontend/css/style.css')}}">
		<link rel="stylesheet" href="{{url('frontend/js/bootstrap.bundle.min.js')}}">
		<link rel="stylesheet" href="{{url('frontend/js/custom.js')}}">
		<link rel="stylesheet" href="{{url('frontend/js/tiny-slider.js')}}">
		<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
		<!-- Styles -->
		<link href="{{ asset('css/app.css') }}" rel="stylesheet">
		<title>Home</title>
	</head>

	<body>

		<!-- Start Header/Navigation -->
		@include('nav')
		<!-- End Header/Navigation -->
 	
		<!-- main display/body  -->
		@yield('content')
		<!-- End main display -->

		<!-- Start Footer Section -->
		@include('footer')
		<!-- End Footer Section -->	

		<script src="{{url('frontend/js/bootstrap.bundle.min.js')}}"></script>
		<script src="{{url('frontend/js/tiny-slider.js')}}"></script>
		<script src="{{url('frontend/js/custom.js')}}"></script>
	</body>
</html>
