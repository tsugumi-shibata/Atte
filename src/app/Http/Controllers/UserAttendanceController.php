<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Work;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UserAttendanceController extends Controller
{
    public function show(User $user, Request $request)
    {
        $date = $request->input('date');
        $carbonDate = $date ? Carbon::parse($date) : Carbon::now();

        $works = Work::with('breakTimes')
                        ->where('user_id', $user->id)
                        ->whereDate('work_start', $carbonDate)
                        ->paginate(5);

        return view('users.attendance', compact('user', 'works', 'carbonDate'));
    }
}