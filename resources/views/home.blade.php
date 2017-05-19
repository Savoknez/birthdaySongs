@extends('layouts.main')

@section('content')

	<div class='view_parent_image1'>
        <div class="row">
            <div class="col-md-12">
                <div class="jumbotron">
                    <h1>Chansons d'anniversaire</h1>
					{{-- <p>Select your date of birth to get songs from Youtube that were popular in those days</p> --}}
                    <p>Sélectionnez votre date de naissance pour obtenir des chansons de Youtube qui étaient populaires à cette époque.</p>
                </div>
            </div>
        </div> <!-- end .row -->

        <div class="panel panel-default">
            <div class="panel-heading"><h4>Sélectionnez votre anniversaire:</h4></div>
            <div class="panel-body">
                <form action="{{ route('songs.store') }}" role="form" method="GET">
                {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="day">Le Jour (Day)</label>
                                <select name="day" id="day" class="form-control">
                                    {{-- @foreach($weeks as $week)
                                        <option value={{ $week->week }}>{{ $week->week }}</option>
                                    @endforeach --}}

									@for ($i=1; $i <=31 ; $i++)
										<option value="{{ $i }}">{{ $i }}</option>
									@endfor

                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="month">Le Mois (Month)</label>
                                <select name="month" id="month" class="form-control">

                                    @foreach($months as $month)
                                            @continue($month->month === '')
                                            <option value="{{ $month->month }}">{{ $month->month }}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="year">L'Année (Year)</label>
                                <select name="year" id="year" class="form-control">

                                    @foreach($years as $year)
                                        <option value="{{ $year->year }}">{{ $year->year }}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>
                    </div><br><hr><br>

                    <div class="row">
                        <div class="col-md-12 pull-right">
							<button type="submit" class="btn btn-primary btn-lg active">Envoyer</button>
						</div>
                    </div>
                </form>
            </div>
        </div>
	</div>
@endsection

	{{-- This is an example of another section named 'script'
	@section('scripts')
		<script type="text/javascript">
			confirm('I loaded up some JS!')
		</script>
	@endsection --}}
