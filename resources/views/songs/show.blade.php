@extends('layouts.main')

@section('title', ' | Show Songs')

@section('content')
	<div class='view_parent_image2'>
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
			        	<li class="active"><a href="{{ route('/home') }}" title="Home">Home</a></li>
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
                <h1 id = "main-title">Ces chansons ont été populaires lorsque vous êtes né</h1><br>
				<ul class="center-content">
					<h4 class="song-titles">Vous avez choisi les résultats pour la date: <i><u class ="date" title="Date">{{ $day . '-' . $month . '-' . $year }}</u></i></h4>
					<h4 class="song-titles">Le jour où vous êtes né était: <i><u class ="date" title="Day of birth">{{ $dayOfBirth }}</u></i></h4><br>					

					<!-- 16:9 aspect ratio -->
					<h2 class="song-titles">{{ $first_artist . ' - ' .  $first_song}}</h2>
					<div class="embed-responsive embed-responsive-16by9">
						<iframe class="embed-responsive-item" src="//www.youtube.com/embed/{{ $first_video }}"></iframe>
					</div><br><hr>

					<h2 class="song-titles">{{ $second_artist . ' - ' .  $second_song}}</h2>
					<div class="embed-responsive embed-responsive-16by9">
						<iframe class="embed-responsive-item" src="//www.youtube.com/embed/{{ $second_video }}"></iframe>
					</div><br><hr>

					<h2 class="song-titles">{{ $third_artist . ' - ' .  $third_song}}</h2>
					<div class="embed-responsive embed-responsive-16by9">
						<iframe class="embed-responsive-item" src="//www.youtube.com/embed/{{ $third_video }}"></iframe>
					</div><br>
                </ul>
            </div>
        </div>
    </div>
@endsection
