@extends('layouts.main')

@section('title', ' | Error')

@section('content')
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="{{ route('/home') }}">Chansons d'anniversaire</a>
			</div>

			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li class="active"><a href="{{ route('/home') }}" title="Home">Home </a></li>
				</ul>

				<ul class="nav navbar-nav navbar-right">
					<li class="date-today" title="Current date">
						<i><h4>{{ $today }}</h4></i>
					</li>
				 </ul>
			</div><!-- /.navbar-collapse -->
		</div><!-- /.container-fluid -->
	</nav>

	<div class="col-lg-12">
		<div class="well">
			<h1 id = "main-title">Aucun résultat. Réessayer.</h1><br>
			<ul class="song-titles">
				<p>Your current address is: <a href="{{ url()->current() }}">{{ url()->current() }}</a> </p><hr>
				<h4>Vous avez choisi les résultats pour la date: <i><u id ="date" title="Date">{{ $day . '-' . $month . '-' . $year }}</u> </i></h4><br>
			</ul>
		</div>
	</div>
@endsection
