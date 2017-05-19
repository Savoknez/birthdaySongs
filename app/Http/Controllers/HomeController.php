<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Song;

class HomeController extends Controller
{
    public function getDate()
    {
		$songs = Song::all();

        //Getting DISTINCT value from columns with Eloquent Query Builder

		$weeks = Song::select('week')->distinct()->get();
		$months = Song::select('month')->distinct()->get();
        $years = Song::select('year')->distinct()->get();

        return view('home')
            ->withYears($years)
            ->withMonths($months)
            ->withWeeks($weeks);
    }
}
