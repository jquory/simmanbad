<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\BarangKeluar;
use App\Models\BarangMasuk;
use App\Models\History;
use App\Models\IndexBarang;
use App\Models\Stok;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->count(30)->create();
        IndexBarang::factory()->count(10)->create();
        Stok::factory()->count(10)->create();
        BarangKeluar::factory()->count(10)->create();
        History::factory()->count(10)->create();
        BarangMasuk::factory()->count(10)->create();
    }
}
