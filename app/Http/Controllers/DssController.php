<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\KriteriaBobot;
use Illuminate\Support\Facades\Auth;

class DssController extends Controller
{
    public function index()
    {
        return view('dss.index', [
            'title' => 'Rekomendasi Paket Pariwisata',
            'active' => 'dss',
            'categories' => Category::all()
        ]);
    }

    public function store(Request $request)
    {
        // ddd($request);
        // return $request->file('image')->store('post-image');
        if (Auth::check()) {
            $validatedData = $request->validate([
                'kriteria_1' => ['required'],
                'kriteria_2' => ['required'],
                'kriteria_3' => ['required'],
                'kriteria_4' => ['required'],
                'kriteria_5' => ['required'],
            ]);

            $validatedData['user_id'] = auth()->user()->id;

            KriteriaBobot::create($validatedData);
        }

        $kriteriaBobot = KriteriaBobot::latest()->first();
        $kriteriaBobotArray = $kriteriaBobot->toArray();

        // TFN
        $skalaFuzzy = [
            [1, 1, 1],
            [1, 2, 4],
            [1, 3, 5],
            [2, 4, 6],
            [3, 5, 7],
            [4, 6, 8],
            [5, 7, 9],
            [6, 8, 9],
            [7, 9, 9]
        ];

        $skalaFuzzyTerbalik = [
            [1, 1, 1],
            [1 / 4, 1 / 2, 1],
            [1 / 5, 1 / 3, 1 / 2],
            [1 / 6, 1 / 4, 1 / 2],
            [1 / 7, 1 / 5, 1 / 3],
            [1 / 8, 1 / 6, 1 / 4],
            [1 / 9, 1 / 7, 1 / 5],
            [1 / 9, 1 / 8, 1 / 6],
            [1 / 9, 1 / 9, 1 / 7]
        ];

        $baris = 5;
        $kolom = 5;

        for ($i = 1; $i <= $baris; $i++) {
            for ($j = 1; $j <= $kolom; $j++) {
                // $PerbandinganKriteria[$1 - 1][$5 - 1] = (5-7) = -2 
                $PerbandinganKriteria[$i - 1][$j - 1] = $kriteriaBobotArray['kriteria_' . $i] - $kriteriaBobotArray['kriteria_' . $j];
                // kalau perbadingan bernilai negatif
                if ($PerbandinganKriteria[$i - 1][$j - 1] < 1) {
                    $PerbandinganKriteria[$i - 1][$j - 1] =
                        $kriteriaBobotArray['kriteria_' . $j] - $kriteriaBobotArray['kriteria_' . $i];
                    $matriksPairwaise[$i - 1][$j - 1] = $skalaFuzzyTerbalik[$PerbandinganKriteria[$i - 1][$j - 1]];
                }
                // kalau perbadingan bernilai 0
                elseif ($PerbandinganKriteria[$i - 1][$j - 1] = 0) {
                    $PerbandinganKriteria[$i - 1][$j - 1] = 1;
                    $matriksPairwaise[$i - 1][$j - 1] = $skalaFuzzyTerbalik[$PerbandinganKriteria[$i - 1][$j - 1]];
                }
                // kalau perbadingan bernilai postifi 
                else {
                    $matriksPairwaise[$i - 1][$j - 1] = $skalaFuzzy[$PerbandinganKriteria[$i - 1][$j - 1]];
                }
            }
        }

        $totalMatriksPairwaise = [];

        for ($i = 0; $i < $baris; $i++) {
            for ($k = 0; $k < 3; $k++) {
                for ($j = 0; $j < $kolom; $j++) {
                    $totalMatriksPairwaise[$i][$k] += $matriksPairwaise[$i][$j][$k];
                }
            }
        }

        $jumlahMatriksPairwaise = [];
        for ($i = 0; $i < 3; $i++) {
            for ($j = 0; $j < $baris; $j++) {
                $jumlahMatriksPairwaise[$j] += $totalMatriksPairwaise[$j][$i];
            }
        }

        $sintesisNilaiKriteria = [];
        for ($i = 0; $i < $baris; $i++) {
            for ($j = 0; $j < 3; $j++) {
                $sintesisNilaiKriteria[$i][$j] = $totalMatriksPairwaise[$i][$j] / $jumlahMatriksPairwaise[2 - $i];
            }
        }

        $nilaiDerajat = [];
        for ($i = 0; $i < $baris; $i++) {
            for ($j = 0; $j < $kolom; $j++) {
                // Syarat 1 Jika Mkriteria 2 >= MKriteria 1
                if ($sintesisNilaiKriteria[$j][1] >= $sintesisNilaiKriteria[$i][1]) {
                    $nilaiDerajat[$i][$j] = 1;
                }
                // Syarat 2 Jika Lkriteria 2 >= UKriteria 1
                elseif ($sintesisNilaiKriteria[$j][0] >= $sintesisNilaiKriteria[$i][2]) {
                    $PerbandinganKriteria[$i - 1][$j - 1] = 1;
                    $nilaiDerajat[$i][$j] = 0;
                }
                // kalau syarat 1 dan syarat 2 tidak benar
                else {
                    $nilaiDerajat[$i][$j] =
                        ($nilaiDerajat[$i][0] - $nilaiDerajat[$i][2]) /
                        ($nilaiDerajat[$i][1] - $nilaiDerajat[$i][2]) -
                        ($nilaiDerajat[$i][1] - $nilaiDerajat[$i][0]);
                }
            }
        }

        $nilaiVektor = [];
        for ($i = 0; $i < $baris; $i++) {
            for ($j = 0; $j < $kolom; $j++) {
                $nilaiVektor[$i] += $nilaiDerajat[$j][$i];
            }
        }

        $totNilaiVektor = array_sum($nilaiVektor);

        $nilaiVektorNormalisasi = [];
        for ($i = 0; $i < $baris; $i++) {
            $nilaiVektorNormalisasi[$i] = $nilaiVektor[$i] / $totNilaiVektor;
        }

        return redirect('dashboard/posts');
    }

    public function calculate()
    {
        return view('dss.calculate', [
            'title' => 'Rekomendasi Paket Pariwisata',
            'active' => 'dss',
            'categories' => Category::all()
        ]);
    }

    public function rekomendasi()
    {
        return view('dss.rekomendasi', [
            'title' => 'Rekomendasi Paket Pariwisata',
            'active' => 'dss',
            'categories' => Category::all()
        ]);
    }
}
