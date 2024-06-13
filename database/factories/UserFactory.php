<?php

namespace Database\Factories;

use App\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'active' => $this->faker->randomElement([User::ACTIVE,User::NON_ACTIVE]),
            'email' => $this->faker->email,
            'photo' => $this->faker->word,
            //'email_verified_at' => $this->faker->date('Y-m-d H:i:s'),
            //'password' => '$2y$10$3v.lLgQmWfLh6lV7uI9Lp.77X2D.gYpw/kMhUcycQ5Q0LjVUQX54C', //password
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
            //'deleted_at' => $this->faker->date('Y-m-d H:i:s'),
            /*'created_at' => $this->faker->date('Y-m-d H:i:s'),
            'updated_at' => $this->faker->date('Y-m-d H:i:s')*/
        ];
    }
}
