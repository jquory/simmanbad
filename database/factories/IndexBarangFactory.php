<?php

namespace Database\Factories;

use App\Models\IndexBarang;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\IndexBarang>
 */
class IndexBarangFactory extends Factory
{
    protected $model = IndexBarang::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'uuid' => Str::uuid(),
            'kode_barang' => $this->faker->date(),
            'nama_barang' => $this->faker->randomElement(['Triplek', 'Terpal', 'Mesin', 'Baut', 'Kancing']),
            'spek' => $this->faker->numberBetween(1, 1000),
            'satuan' => $this->faker->randomElement(['pcs', 'mtr', 'kg', 'roll', 'ml']),
        ];
    }
}
