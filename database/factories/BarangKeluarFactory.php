<?php

namespace Database\Factories;

use App\Models\IndexBarang;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BarangKeluar>
 */
class BarangKeluarFactory extends Factory
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
            'jumlah_keluar' => $this->faker->numberBetween(1, 100),
            'waktu_keluar' => $this->faker->date()
        ];
    }
}
