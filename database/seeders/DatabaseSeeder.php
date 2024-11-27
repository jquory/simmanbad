<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->count(10)->create();

        // DB::table('kriteria')->insert([
        //     ['nama_kriteria' => 'Harga (cost)', 'bobot' => 1.5, 'simbol' => 'C1'],
        //     ['nama_kriteria' => 'Merk (cost)', 'bobot' => 1.25, 'simbol' => 'C2'],
        //     ['nama_kriteria' => 'Model (benefit)', 'bobot' => 0.5, 'simbol' => 'C3'],
        //     ['nama_kriteria' => 'Kapasitas (benefit)', 'bobot' => 1, 'simbol' => 'C4'],
        //     ['nama_kriteria' => 'Tahun (benefit)', 'bobot' => 0.5, 'simbol' => 'C5'],
        //     ['nama_kriteria' => 'Negara (benefit)', 'bobot' => 0.25, 'simbol' => 'C6'],
        // ]);

        // $criteria = DB::table('kriteria')->pluck('id', 'simbol');

        // DB::table('sub_kriteria')->insert([
        //     // Sub Kriteria for Harga (C1)
        //     ['criteria_id' => $criteria['C1'], 'sub_kriteria' => '2.000.000 - 3.800.000', 'bobot' => 5],
        //     ['criteria_id' => $criteria['C1'], 'sub_kriteria' => '4.000.000 - 5.300.000', 'bobot' => 4],
        //     ['criteria_id' => $criteria['C1'], 'sub_kriteria' => '5.400.000 - 6.250.000', 'bobot' => 3],
        //     ['criteria_id' => $criteria['C1'], 'sub_kriteria' => '6.300.000 - 7.000.000', 'bobot' => 2],
        //     ['criteria_id' => $criteria['C1'], 'sub_kriteria' => '8.000.000 - 10.000.000', 'bobot' => 1],

        //     // Sub Kriteria for Merk (C2)
        //     ['criteria_id' => $criteria['C2'], 'sub_kriteria' => '1 merk di setiap jenis alat berat', 'bobot' => 5],
        //     ['criteria_id' => $criteria['C2'], 'sub_kriteria' => '2 merk di setiap jenis alat berat', 'bobot' => 4],
        //     ['criteria_id' => $criteria['C2'], 'sub_kriteria' => '3 merk di setiap jenis alat berat', 'bobot' => 3],

        //     // Sub Kriteria for Model (C3)
        //     ['criteria_id' => $criteria['C3'], 'sub_kriteria' => '3 model di setiap jenis alat berat', 'bobot' => 3],
        //     ['criteria_id' => $criteria['C3'], 'sub_kriteria' => '2 model di setiap jenis alat berat', 'bobot' => 2],
        //     ['criteria_id' => $criteria['C3'], 'sub_kriteria' => '1 model di setiap jenis alat berat', 'bobot' => 1],

        //     // Sub Kriteria for Kapasitas (C4)
        //     ['criteria_id' => $criteria['C4'], 'sub_kriteria' => '33 Ton - 40 Ton', 'bobot' => 5],
        //     ['criteria_id' => $criteria['C4'], 'sub_kriteria' => '31 Ton - 34 Ton', 'bobot' => 4],
        //     ['criteria_id' => $criteria['C4'], 'sub_kriteria' => '26 Ton - 30 Ton', 'bobot' => 3],
        //     ['criteria_id' => $criteria['C4'], 'sub_kriteria' => '20 Ton - 25 Ton', 'bobot' => 2],
        //     ['criteria_id' => $criteria['C4'], 'sub_kriteria' => '1 Ton - 10 Ton', 'bobot' => 1],

        //     // Sub Kriteria for Tahun (C5)
        //     ['criteria_id' => $criteria['C5'], 'sub_kriteria' => '2020 - 2024', 'bobot' => 5],
        //     ['criteria_id' => $criteria['C5'], 'sub_kriteria' => '2016 - 2019', 'bobot' => 4],
        //     ['criteria_id' => $criteria['C5'], 'sub_kriteria' => '2014 - 2015', 'bobot' => 3],
        //     ['criteria_id' => $criteria['C5'], 'sub_kriteria' => '2011 - 2013', 'bobot' => 2],
        //     ['criteria_id' => $criteria['C5'], 'sub_kriteria' => '2008 - 2010', 'bobot' => 1],

        //     // Sub Kriteria for Negara (C6)
        //     ['criteria_id' => $criteria['C6'], 'sub_kriteria' => 'Produk Luar Negeri', 'bobot' => 5],
        //     ['criteria_id' => $criteria['C6'], 'sub_kriteria' => 'Produk Dalam Negeri', 'bobot' => 4],
        // ]);

        // DB::table('alternatif')->insert([
        //     ['name' => 'V1', 'C1' => 1, 'C2' => 5, 'C3' => 1, 'C4' => 3, 'C5' => 3, 'C6' => 5],
        //     ['name' => 'V2', 'C1' => 2, 'C2' => 5, 'C3' => 1, 'C4' => 5, 'C5' => 2, 'C6' => 5],
        //     ['name' => 'V3', 'C1' => 4, 'C2' => 4, 'C3' => 2, 'C4' => 5, 'C5' => 4, 'C6' => 4],
        //     ['name' => 'V4', 'C1' => 5, 'C2' => 3, 'C3' => 4, 'C4' => 1, 'C5' => 1, 'C6' => 5],
        //     ['name' => 'V5', 'C1' => 3, 'C2' => 4, 'C3' => 2, 'C4' => 2, 'C5' => 5, 'C6' => 5],
        // ]);
    }
}
