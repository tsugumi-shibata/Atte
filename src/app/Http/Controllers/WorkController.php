<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Work;
use App\Models\BreakTime;
use Auth;

class WorkController extends Controller
{
    public function start(Request $request)
    {
        $currentWork = Work::where('user_id', Auth::id())
                        ->whereNull('work_end')
                        ->latest()->first();

        if($currentWork) {
            return redirect()->route('stamp')->with('error','すでに勤務中です');
        }

        $work = new Work();
        $work->user_id = Auth::id();
        $work->work_start = now();
        $work->save();

        return redirect()->route('stamp')->with('status', '勤務を開始しました');
    }

    public function end(Request $request)
    {
        $work = Work::where('user_id', Auth::id())
                        ->whereNull('work_end')
                        ->latest()->first();

        if (!$work) {
            return redirect()->route('stamp')->with('error','勤務が開始されていません');
        }

        //休憩が終了しているか確認
        $activeBreak = BreakTime::where('user_id',Auth::id())
                                    ->where('work_id',$work->id)
                                    ->whereNull('break_end')
                                    ->exists();

        if ($activeBreak) {
            return redirect()->route('stamp')->with('error','休憩中です');
        }

        $work->work_end = now();
        $work->save();

        return redirect()->route('stamp')->with('status', '勤務を終了しました');
    }
}
