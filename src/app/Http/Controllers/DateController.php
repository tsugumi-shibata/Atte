<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Work;
use Carbon\Carbon;
use Auth;

class DateController extends Controller
{
    public function index($date = null)
    {
        $carbonDate = $date ? Carbon::parse($date) : Carbon::now();
        $works = Work::with('breakTimes','user')
                        ->whereDate('work_start',$carbonDate)
                        ->paginate(5);

        return view('date',compact('works','carbonDate'));
    }
}
