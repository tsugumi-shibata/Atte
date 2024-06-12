<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Work;
use Auth;

class StampController extends Controller
{
    public function index()
    {
        $currentWork = Work::where('user_id',auth()->id())
                                ->latest()
                                ->first();

        $currentWorkId = $currentWork->id ?? null;

        return view('stamp', compact('currentWorkId'));
    }
}
