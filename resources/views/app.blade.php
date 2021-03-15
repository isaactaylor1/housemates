<!doctype html>
<html lang="{{ config('app.locale') }}">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
	<title>Housemates</title>
	<meta name="author" content="pixelcave">
	<meta name="robots" content="noindex, nofollow">
	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<!-- Fonts and Styles -->
	<link rel="stylesheet" id="css-main" href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,400i,600,700">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css">
	<link rel="stylesheet" id="css-theme" href="{{ mix('css/dashmix.css') }}">

</head>

<body>
	<div id="app">
		<div id="page-container">
			<main id="main-container">
				<router-view></router-view>
			</main>
		</div>
	</div>
	<script src="{{ mix('js/staff/app.app.js') }}"></script>
	<script src="{{ mix('js/dashmix.app.js') }}"></script>
</body>

</html>