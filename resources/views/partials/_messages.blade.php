@if  (Session::has('success'))

	<div class="alert alert-success alert-dismissible" role="alert" data-dismiss="alert">
		<strong>Success:</strong> {{ Session::get('success') }}
	</div>

@endif

@if (Session::has('errors'))

	<div class="alert alert-danger alert-dismissible" role ="alert" data-dismiss="alert">
		<strong>Error:</strong> {{ Session::get('errors') }}
	</div>

@endif

{{-- @if  (!$errors->isEmpty())
	Object $errors is from class Session
	<div class="alert alert-danger" role="alert">
		<strong>Errors:</strong>
		<ul>
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>

@endif --}}
