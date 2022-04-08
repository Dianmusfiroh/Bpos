<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class BoothFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama_toko'=> $this->faker->name(),
            'alamat' =>$this->faker->name(),
            'email'=> $this->faker->unique()->safeEmail(),
            'no_hp'=>$this->faker->name(),
            'image'=>$this->faker->name(),
        'status_toko ' => 0,

        ];
    }
}
