<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Constacts;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class ConstactsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = App\Models\Constacts::class;
    public function definition()
    {
        return [
            'title' => Str::random(10),
            'description' => Str::random(10),
            'user_id' => \App\Models\User::all()->random()->id,
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    // public function unverified()
    // {
    //     return $this->state(
    //         fn(array $attributes) => [
    //             'email_verified_at' => null,
    //         ]
    //     );
    // }
}
