<?php

namespace Database\Factories;

use App\Models\IndexProduk;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProdukKeluar>
 */
class ProdukKeluarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $indexproduk = IndexProduk::factory()->create();
        return [
            'uuid' => Str::uuid(),
            'id_produk' => $indexproduk->id,
            'nama_produk' => $indexproduk->nama_produk,
            'kode_produk' => $indexproduk->kode_produk,
            'satuan' => $indexproduk->satuan,
            'jumlah_keluar' => $this->faker->numberBetween(1, 100),
            'waktu_keluar' => $this->faker->date()
        ];
    }
}
