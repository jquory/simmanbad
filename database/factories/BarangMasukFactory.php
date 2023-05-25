<?php

namespace Database\Factories;

use App\Models\IndexBarang;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BarangMasuk>
 */
class BarangMasukFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $indexbarang = IndexBarang::factory()->create();
        return [
            'uuid' => Str::uuid(),
            'id_barang' => $indexbarang->id,
            'nama_barang' => $indexbarang->nama_barang,
            'kode_barang' => $indexbarang->kode_barang,
            'satuan' => $indexbarang->satuan,
            'jumlah_masuk' => $this->faker->numberBetween(1, 100),
            'waktu_masuk' => $this->faker->date()
        ];
    }
}
