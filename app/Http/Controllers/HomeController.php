<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    private $subKriteria = [
        'C1' => [
            [5, '2000000', '3800000'],
            [4, '4000000', '5300000'],
            [3, '5400000', '6250000'],
            [2, '6300000', '7000000'],
            [1, '8000000', '10000000']
        ],
        'C2' => [
            [5, '1'],
            [4, '2'],
            [3, '3']
        ],
        'C3' => [
            [3, '3'],
            [2, '2'],
            [1, '1']
        ],
        'C4' => [
            [5, '33', '40'],
            [4, '31', '34'],
            [3, '26', '30'],
            [2, '20', '25'],
            [1, '1', '10']
        ],
        'C5' => [
            [5, '2020', '2024'],
            [4, '2016', '2019'],
            [3, '2014', '2015'],
            [2, '2011', '2013'],
            [1, '2008', '2010']
        ],
        'C6' => [
            [5, 'Produk Luar Negeri'],
            [4, 'Produk Dalam Negeri']
        ]
    ];

    private $kriteria = [
        'C1' => 1.5,
        'C2' => 1.25,
        'C3' => 0.5,
        'C4' => 1,
        'C5' => 0.5,
        'C6' => 0.25
    ];

    public function getNormalizedValue($value, $kriteria) {
        foreach ($this->subKriteria[$kriteria] as $sub) {
            if ($kriteria == 'C6') {
                if ($value != 'Indonesia' && $sub[1] == 'Produk Luar Negeri') {
                    return $sub[0];
                } elseif ($value == 'Indonesia' && $sub[1] == 'Produk Dalam Negeri') {
                    return $sub[0];
                }
            } elseif ($kriteria == 'C2') {
                if ($value == $sub[1]) {
                    return $sub[0];
                }
            }
            else {
                if (isset($sub[2]) && $value >= $sub[1] && $value <= $sub[2]) {
                    return $sub[0];
                }
            }
        }
        return 0; // Default if no match
    }

    public function index() {
        $produk = IndexProduk::all()->toArray();

        // Hitung jumlah unik merk dan model
        $uniqueMerks = array_count_values(array_column($produk, 'merk'));
        $uniqueModels = array_count_values(array_column($produk, 'model'));

        foreach ($produk as &$p) {
            $p['C1'] = $this->getNormalizedValue($p['harga'], 'C1');
            $p['C2'] = $this->getNormalizedValue($uniqueMerks[$p['merk']], 'C2');
            $p['C3'] = $this->getNormalizedValue($uniqueModels[$p['model']], 'C3');
            $p['C4'] = $this->getNormalizedValue($p['kapasitas'], 'C4');
            $p['C5'] = $this->getNormalizedValue($p['tahun'], 'C5');
            $p['C6'] = $this->getNormalizedValue($p['negara'], 'C6');
        }

        $maxC = [];
        $minC = [];

        foreach (array_keys($this->kriteria) as $k) {
            $values = array_column($produk, $k);
            $maxC[$k] = max($values);
            $minC[$k] = min($values);
        }

        foreach ($produk as &$p) {
            foreach (array_keys($this->kriteria) as $k) {
                if (in_array($k, ['C1', 'C2'])) {
                    $p['normalized_' . $k] = $p[$k] != 0 ? $minC[$k] / $p[$k] : 0;
                } else {
                    $p['normalized_' . $k] = $maxC[$k] != 0 ? $p[$k] / $maxC[$k] : 0;
                }
            }
        }

        foreach ($produk as &$p) {
            $p['final_value'] = 0;
            foreach (array_keys($this->kriteria) as $k) {
                $p['final_value'] += $p['normalized_' . $k] * $this->kriteria[$k];
            }
        }

        usort($produk, function ($a, $b) {
            return $b['final_value'] <=> $a['final_value'];
        });

        $top3products = array_slice($produk, 0, 3);

        return view('landing', compact('produk'));
    }

    public function dashboardUser() {
        $event = Event::all();
        $user = Auth::user();
        $prestasiUser = DB::table('prestasi')->where('user_id', $user->uuid)->count();
        $jadwalUser = DB::table('jadwal')->where('user_id', $user->uuid)->count();
        return view('user.dashboard', compact(['event', 'prestasiUser', 'jadwalUser']));
    }

    public function dashboardAdmin() {
        $jadwal = DB::table('jadwal')->count();
        $totalPelatih = DB::table('users')->whereIn('role', ['admin'])->count();
        $totalAtlet = DB::table('users')->whereIn('role', ['user'])->count();
        $prestasi = DB::table('prestasi')->count();

        return view('admin.dashboard', compact(['jadwal', 'totalPelatih', 'totalAtlet', 'prestasi']));
    }
}
