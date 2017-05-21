<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Song;
use Alaouy\Youtube\Facades\Youtube;
use Carbon\Carbon;

class YoutubeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
	 *Showing a list of all songs
	 *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $songs = Song::all();

		return view('songs.index')->withSongs('songs');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
			'week' => 'required',
			'month' => 'required',
			'year' => 'required'
		]);

		$songs = Song::all();

		return view('songs.show');
    }

    /**
     * Display the specified resource.
     *
	 * Showing individual Song by ID
	 *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
		// $song = Song::find($id);
        return view('songs.show');
		// 	->withSong($song);
    }

	public function getVideos(Request $request)
	{
		$songs = Song::all();

		//Getting input values for day, month and year via request.
		// $week = (int) $request->get('week');

		$day = $request->get('day');
		$month = $request->get('month');
		$monthNum = $month;
		$year = (int) $request->get('year');

		switch ($monthNum) {
			case 'Janvier':
				$monthNum = 1;
				break;
			case 'Février':
				$monthNum = 2;
				break;
			case 'Mars':
				$monthNum = 3;
				break;
			case 'Avril':
				$monthNum = 4;
				break;
			case 'Mai':
				$monthNum = 5;
				break;
			case 'Juin':
				$monthNum = 6;
				break;
			case 'Juillet':
				$monthNum = 7;
				break;
			case 'Août':
				$monthNum = 8;
				break;
			case 'Septembre':
				$monthNum = 9;
				break;
			case 'Octobre':
				$monthNum = 10;
				break;
			case 'Novembre':
				$monthNum = 11;
				break;
			case 'Décembre':
				$monthNum = 12;
				break;
			default:
				'No month';
		}

		//Getting number of week in year by date
		$date_string = "$year-$monthNum-$day";
		$week = date('W', strtotime($date_string) );

		//Current day and day of birth
		$today = Carbon::now()->format('l jS \\of F Y');		
		$date = "$day-$monthNum-$year";
		$dayOfBirth = date('l', strtotime($date));

		//GETTING ARTISTS AND SONGS NAMES!!!
		$first_artist = DB::table('songs')->where([['week', '=' ,$week], ['month', '=' ,$month], ['year', '=', $year]])->value('first_artist');
		$first_song = DB::table('songs')->where([['week', '=' ,$week], ['month', '=' ,$month], ['year', '=', $year]])->value('first_song');
		$second_artist = DB::table('songs')->where([['week', '=' ,$week], ['month', '=' ,$month], ['year', '=', $year]])->value('second_artist');
		$second_song = DB::table('songs')->where([['week', '=' ,$week], ['month', '=' ,$month], ['year', '=', $year]])->value('second_song');
		$third_artist = DB::table('songs')->where([['week', '=' ,$week], ['month', '=' ,$month], ['year', '=', $year]])->value('third_artist');
		$third_song = DB::table('songs')->where([['week', '=' ,$week], ['month', '=' ,$month], ['year', '=', $year]])->value('third_song');


		if($first_artist === "" || $first_artist === NULL  ){
			// Session::flash('errors', 'Sorry, for this request we have no songs! Try again. Click here to dismiss this alert.');
			// $request->session()->flash('errors', 'Sorry, for this request we have no songs! Try again. Click here to dismiss this alert.');
			flash('Sorry, for this request we have no songs! Try again. This message will disappear now.')->error();

			return view('errors.error')
				->withToday($today)
				->withDateString($date_string)
				->withWeek($week)
				->withDay($day)
				->withMonth($month)
				->withYear($year);
		} else {

			//Getting first video
			$firstVideoList = Youtube::search($first_artist . ' ' . $first_song);
			 $first_array = array_first($firstVideoList);
			 //Getting value of videoId from stdClass. This is going to get a value of 'videoId'.
			 $first_video = $first_array->id->videoId;

			//Getting second video
			$secondVideoList = Youtube::search($second_artist . ' ' . $second_song);
			$second_array = array_first($secondVideoList);
			$second_video = $second_array->id->videoId;

			//Getting third video
			$thirdVideoList = Youtube::search($third_artist . ' ' . $third_song);
			$third_array = array_first($thirdVideoList);
			$third_video = $third_array->id->videoId;

			flash('You found what you needed! This message will disappear now.')->success();

			return view('songs.show')
				->with('bodyClass', 'imageOne')
				->withSongs($songs)
				->withDateString($date_string)
				->withToday($today)
				->with('dayOfBirth', $dayOfBirth)
				//this value is for testing
				->withWeek($week)
				//Nedded
				->withDay($day)
				->withMonth($month)
				->withYear($year)
				->withFirstArtist($first_artist)->withFirstSong($first_song)
				->withSecondArtist($second_artist)->withSecondSong($second_song)
				->withThirdArtist($third_artist)->withThirdSong($third_song)
				->withFirstVideo($first_video)
				->withSecondVideo($second_video)
				->withThirdVideo($third_video);
		}
	}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
		//
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
