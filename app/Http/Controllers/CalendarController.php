<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class CalendarController extends Controller
{
 

    public function index()
    {
        return view('calendar'); // your Blade view
    }

    public function fetchEvents(Request $request)
    {
        $events = Event::select('id', 'title', 'start_date as start', 'end_date as end')->get();
        return response()->json($events);
    }
}
//

