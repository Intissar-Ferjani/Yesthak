<html>
    <head>
		<title>Yesthak</title>
		<meta charset="UTF-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="{{ asset('assets/css/main.css') }}" />
		<noscript><link rel="stylesheet" href="{{ asset('assets/css/noscript.css') }}" /></noscript>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
		@livewireStyles
		{{-- ------------------- --}}
		<link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
		<script type="text/javascript" src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>

	</head>
    <body class="is-preload landing">
        @yield('content')

		<!-- Footer -->
		<footer id="footer">
			<ul class="icons">
				<li><a href="#" class="icon brands alt fa-twitter"><span class="label">Twitter</span></a></li>
				<li><a href="#" class="icon brands alt fa-facebook-f"><span class="label">Facebook</span></a></li>
				<li><a href="#" class="icon brands alt fa-linkedin-in"><span class="label">LinkedIn</span></a></li>
				<li><a href="#" class="icon brands alt fa-instagram"><span class="label">Instagram</span></a></li>
				<li><a href="#" class="icon solid alt fa-envelope"><span class="label">Email</span></a></li>
			</ul>
		</footer>

        <!-- Scripts -->
		<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
		<script src="{{ asset('assets/js/jquery.scrolly.min.js') }}"></script>
		<script src="{{ asset('assets/js/jquery.dropotron.min.js') }}"></script>
		<script src="{{ asset('assets/js/jquery.scrollex.min.js') }}"></script>
		<script src="{{ asset('assets/js/browser.min.js') }}"></script>
		<script src="{{ asset('assets/js/breakpoints.min.js') }}"></script>
		<script src="{{ asset('assets/js/util.js') }}"></script>
		<script src="{{ asset('assets/js/main.js') }}"></script>
		@livewireScripts

    </body>
</html>