<?php

namespace Database\Factories;

use App\Models\IndexBarang;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Stok>
 */
class StokFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'id' => Str::uuid(),
            'id_barang' => function () {
                return IndexBarang::factory()->create()->id;
            },
            'stok_awal' => $this->faker->numberBetween(1, 100),
            'stok_akhir' => $this->faker->numberBetween(1, 100)
        ];
    }
}
