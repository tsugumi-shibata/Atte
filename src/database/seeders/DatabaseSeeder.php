<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Work;
use App\Models\BreakTime;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(100)->create()->each(function ($user) {
            Work::factory(20)->create(['user_id' => $user->id])->each(function ($work) use ($user) {
                BreakTime::factory(2)->create(['user_id' => $user->id, 'work_id' => $work->id]);
            });
        });
        // \App\Models\User::factory(10)->create();
    }
}
