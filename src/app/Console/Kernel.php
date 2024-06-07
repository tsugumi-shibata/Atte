<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();
        $schedule->call(function () {
            $this->handleMidnightShift();
        })->dailyAt('00:00');
    }

    protected function handleMidnightShift()
    {
        $workingUrs = Work::whereNull('work_end')->get();
        $currentDate = Carbon::now()->toDateString();
        $nextDate = Carbon::now()->addDay()->toDateString();

        foreach ($workingUsers as $work) {
            $work->work_end = Carbon::now()->startOfDay();
            $work->save();

            $newWork = Work::create([
                'user_id' => $work->user_id,
                'work_start' =>Carbon::now()->startOfDay(),
            ]);

            $ongoingBreak = $work->breakTimes()->whereNull('break_end')->first();
            if ($ongoingBreak) {
                $ongoingBreak->break_end = Carbon::now()->startOfDay();
                $ongoingBreak->save();

                $newBreak = $newWork->breakTimes()->create([
                    'break_start' =>Carbon::now()->startOfDay(),
                ]);
            }
        }
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
