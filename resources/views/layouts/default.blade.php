<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Admin Dashboard</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="{{asset('Dss/img/icon.ico')}}" type="image/x-icon"/>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
	<!-- Fonts and icons -->
	<script src="{{ asset('Dss/js/plugin/webfont/webfont.min.js')}}"></script>
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 BranDss", "simple-line-icons"], urls: [{{ 'asset(Dss/css/fonts.min.css)'}}]},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>
	<!-- CSS Files -->
	<link rel="stylesheet" href="{{ asset('Dss/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{ asset('Dss/css/atlantis.min.css')}}">
	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link rel="stylesheet" href="{{ asset('Dss/css/demo.css')}}">
</head>
<body data-background-color="dark">
	<div class="wrapper">
@include('includes.navbar')
        
        <!-- Slidebar -->
 @include('includes.slidebar')
		<!-- End Sidebar -->

		<div class="main-panel">
			<div class="content">
				@yield('content')
			</div>
			<!-- footer -->
		</div>
		
		
	</div>
@include('includes.js')	
@include('sweetalert::alert')
</body>
</html>