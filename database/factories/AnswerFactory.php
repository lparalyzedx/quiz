<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Answer;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Answer>
 */
class AnswerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model= Answer::class;

    public function definition()
    {
        return [
            'user_id' => mt_rand(1,10),
            'question_id' => mt_rand(1,50),
            'answer' => 'answer'.mt_rand(1,4)
        ];
    }
}
