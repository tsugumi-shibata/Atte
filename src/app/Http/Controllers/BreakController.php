<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BreakTime;
use App\Models\Work;
use Auth;

class BreakController extends Controller
{
    public function start(Request $request, $workId)
    {
        $work = Work::where('id',$workId)
                        ->where('user_id',Auth::id())
                        ->whereNull('work_end')
                        ->first();

        // 勤務が開始されていない場合、休憩開始不可
        if(!$work) {
            return redirect()->route('stamp')->with('error','勤務が開始されていません');
        }

                // 現在のユーザーがこの勤務に属しているか確認
        if ($work->user_id !== Auth::id()) {
            return redirect()->route('stamp')->with('error','不正な操作です');
        }

        //休憩が開始されていないこと確認
        $currentBreak = BreakTime::where('user_id', Auth::id())
                                    ->where('work_id',$work->id)
                                    ->whereNull('break_end')
                                    ->latest()->first();

        if ($currentBreak) {
            return redirect()->route('stamp')->with('error', '現在休憩中です');
        }

        //休憩を開始
        $break = new BreakTime();
        $break->user_id = Auth::id();
        $break->work_id = $work->id;
        $break->break_start = now();
        $break->save();

        return redirect()->route('stamp')->with('status', '休憩を開始しました');
    }

    public function end(Request $request, $workId)
    {
        $work = Work::where('id',$workId)
                        ->where('user_id',Auth::id())
                        ->whereNull('work_end')
                        ->first();

        if (!$work) {
            return redirect()->route('stamp')->with('error','勤務が開始されていません');
        }

        // 休憩が開始されていることを確認
        $break = BreakTime::where('user_id', Auth::id())
                            ->where('work_id', $work->id)
                            ->whereNull('break_end')
                            ->latest()->first();

        if (!$break) {
            return redirect()->route('stamp')->with('error', '休憩中ではありません');
        }

        // 休憩を終了
        $break->break_end = now();
        $break->save();

        return redirect()->route('stamp')->with('status', '休憩を終了しました');
    }
}

