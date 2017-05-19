<!DOCTYPE html>
<html lang="en">
	<head>
		@include('partials._head')
	</head>
	{{-- Class for achieved different background-images on pages --}}
	<body class="{{ $bodyClass or "default" }}">

	    <div class="container">
				{{-- @include('partials._messages') --}}
				@include('flash::message')

				@yield('content')

				@include('partials._footer')

	    </div> <!-- end .container -->

				@include('partials._javascript')
				{{-- An example another yield which will be used in 'home' view
				@yield('scripts') --}}
	</body>
</html>
