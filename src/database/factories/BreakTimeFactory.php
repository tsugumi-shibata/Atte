<?php

namespace Database\Factories;

use App\Models\BreakTime;
use App\Models\User;
use App\Models\Work;
use Illuminate\Database\Eloquent\Factories\Factory;


class BreakTimeFactory extends Factory
{
    protected $model = BreakTime::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $start = $this->faker->dateTimeBetween('-1 month', 'now');
        return [
            'user_id' => User::factory(),
            'work_id' => Work::factory(),
            'break_start' => $start,
            'break_end' => $this->faker->dateTImeBetween($start, '+1 hour'),
        ];
    }
}
