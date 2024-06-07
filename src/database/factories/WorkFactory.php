<?php

namespace Database\Factories;

use App\Models\Work;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;


class WorkFactory extends Factory
{
    protected $model = Work::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'work_start' => $this->faker->dateTimeBetween('-1 month', 'now'),
            'work_end' => $this->faker->dateTimeBetween('now','+8 hours'),
        ];
    }
}
