
<!DOCTYPE html>
<html lang="fr">

<head>
<meta charset="utf-8" />
    <link rel="icon" href="" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
	<link rel="preload"
		href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
		as="style" onload="this.onload=null;this.rel='stylesheet'">
	<link rel="preload"
		href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100..900;1,100..900&display=swap">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
		integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
		crossorigin="anonymous" referrerpolicy="no-referrer" />
	<meta name="viewport" content="width=device-width" />
	<meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('assets/front/css/main.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/front/css/main-dev.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/front/css/responsive.css') }}">
</head>
    <body>
    @include('frontend.tft.layouts.partials.header')
    @yield('content')
    @include('frontend.tft.layouts.partials.footer')
    @include('frontend.tft.layouts.partials.scripts')
    </body>
</html>