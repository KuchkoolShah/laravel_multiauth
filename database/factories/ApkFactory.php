<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ApkFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'apk_name' => 'messanger',
            'apk_url' => 'messanger.apk',
            'image' => 'messanger.png',
             'apk_count' => '0',
        ];
    }
}
