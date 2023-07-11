<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Models\PaketWisata;
use Illuminate\Http\Request;
use App\Models\KriteriaBobot;
use App\Models\HasilBobotVektor;
use App\Models\HasilDss;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class DssController extends Controller
{

    public function index()
    {

        return view('dss.index', [
            'title' => 'Rekomendasi Paket Pariwisata',
            'active' => 'dss',
            'categories' => Category::all(),
            "total_posts" => Post::all(),
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'kriteria_1' => ['required'],
            'kriteria_2' => ['required'],
            'kriteria_3' => ['required'],
            'kriteria_4' => ['required'],
            'kriteria_5' => ['required'],
        ]);

        if (Auth::check()) {

            $validatedData['user_id'] = auth()->user()->id;
            KriteriaBobot::create($validatedData);
            // $kriteriaBobot = KriteriaBobot::Where('user_id', auth()->user()->id)->get();
            $kriteriaBobot = KriteriaBobot::latest()->first();


            // $kriteriaBobot = KriteriaBobot::latest()->first();
        } else {
            KriteriaBobot::create($validatedData);
            $kriteriaBobot = KriteriaBobot::latest()->first();
        }

        // $this->idSesion = $kriteriaBobot->id;
        // $kriteria_id = $kriteriaBobot->id;
        // dd($this->idSesion);
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
                // kalau perbadingan bernilai postifif 
                else {
                    $matriksPairwaise[$i - 1][$j - 1] = $skalaFuzzy[$PerbandinganKriteria[$i - 1][$j - 1]];
                }
            }
        }

        $totalMatriksPairwaise = [];

        for ($i = 0; $i < $baris; $i++) {
            for ($k = 0; $k < 3; $k++) {
                $totalMatriksPairwaise[$i][$k] = 0;
                for ($j = 0; $j < $kolom; $j++) {
                    $totalMatriksPairwaise[$i][$k] += $matriksPairwaise[$i][$j][$k];
                }
            }
        }

        $jumlahMatriksPairwaise = [];
        for ($i = 0; $i < 3; $i++) {
            $jumlahMatriksPairwaise[$i] = 0;
            for ($j = 0; $j < $baris; $j++) {
                $jumlahMatriksPairwaise[$i] += $totalMatriksPairwaise[$j][$i];
            }
        }


        $sintesisNilaiKriteria = [];
        for ($i = 0; $i < $baris; $i++) {
            for ($j = 0; $j < 3; $j++) {
                $sintesisNilaiKriteria[$i][$j] = $totalMatriksPairwaise[$i][$j] / $jumlahMatriksPairwaise[2 - $j];
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
                        ($sintesisNilaiKriteria[$i][0] - $sintesisNilaiKriteria[$i][2]) /
                        ($sintesisNilaiKriteria[$i][1] - $sintesisNilaiKriteria[$i][2]) -
                        ($sintesisNilaiKriteria[$i][1] - $sintesisNilaiKriteria[$i][0]);
                }
            }
        }

        $nilaiVektor = [];
        for ($i = 0; $i < $baris; $i++) {
            $nilaiVektor[$i] = 0;
            for ($j = 0; $j < $kolom; $j++) {
                $nilaiVektor[$i] += $nilaiDerajat[$j][$i];
            }
        }

        $totNilaiVektor = array_sum($nilaiVektor);

        $nilaiVektorNormalisasi = [];
        for ($i = 0; $i < $baris; $i++) {
            $nilaiVektorNormalisasi[$i] = $nilaiVektor[$i] / $totNilaiVektor;
        }

        // dd($nilaiVektorNormalisasi);
        $data = [
            'kriteria_1' => $nilaiVektorNormalisasi[0],
            'kriteria_2' => $nilaiVektorNormalisasi[1],
            'kriteria_3' => $nilaiVektorNormalisasi[2],
            'kriteria_4' => $nilaiVektorNormalisasi[3],
            'kriteria_5' => $nilaiVektorNormalisasi[4]
        ];

        // dd($data);

        HasilBobotVektor::create($data);

        // $hasil = [
        //     'kriteria_bobot_id' => $kriteria_id,
        //     'user_id' => auth()->user()->id,

        // ];


        // HasilDss::create($hasil);

        Session::flash('success', 'Bobot telah tersimpan');
        return redirect('/dss')->with('success', 'Bobot telah tersimpan');
    }

    public function calculate()
    {
        $kriteriaBobot = KriteriaBobot::latest()->first();
        // $this->idSesion = $kriteriaBobot->id;

        // dd($this->idSesion);
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
        $totalkriteria = 5;

        for ($i = 1; $i <= $baris; $i++) {
            for ($j = 1; $j <= $kolom; $j++) {
                if ($kriteriaBobotArray['kriteria_' . $i] == $kriteriaBobotArray['kriteria_' . $j]) {
                    $PerbandinganKriteria[$i - 1][$j - 1] = 1;
                    $matriksPairwaise[$i - 1][$j - 1] = $skalaFuzzy[1];
                } else {
                    // $PerbandinganKriteria[$1 - 1][$5 - 1] = (5-7) = -2 
                    $PerbandinganKriteria[$i - 1][$j - 1] = $kriteriaBobotArray['kriteria_' . $i] - $kriteriaBobotArray['kriteria_' . $j];
                    // kalau perbadingan bernilai negatif
                    if ($PerbandinganKriteria[$i - 1][$j - 1] < 1) {
                        $PerbandinganKriteria[$i - 1][$j - 1] =
                            $kriteriaBobotArray['kriteria_' . $j] - $kriteriaBobotArray['kriteria_' . $i];
                        $matriksPairwaise[$i - 1][$j - 1] = $skalaFuzzyTerbalik[$PerbandinganKriteria[$i - 1][$j - 1]];
                        $PerbandinganKriteria[$i - 1][$j - 1] = 1 / $PerbandinganKriteria[$i - 1][$j - 1];
                    }
                    // kalau perbadingan bernilai postifif
                    else {
                        $matriksPairwaise[$i - 1][$j - 1] = $skalaFuzzy[$PerbandinganKriteria[$i - 1][$j - 1]];
                    }
                }
            }
        }

        $totalMatriksPairwaise = [];

        for ($i = 0; $i < $baris; $i++) {
            for ($k = 0; $k < 3; $k++) {
                $totalMatriksPairwaise[$i][$k] = 0;
                for ($j = 0; $j < $kolom; $j++) {
                    $totalMatriksPairwaise[$i][$k] += $matriksPairwaise[$i][$j][$k];
                }
            }
        }

        $jumlahMatriksPairwaise = [];
        for ($i = 0; $i < 3; $i++) {
            $jumlahMatriksPairwaise[$i] = 0;
            for ($j = 0; $j < $baris; $j++) {
                $jumlahMatriksPairwaise[$i] += $totalMatriksPairwaise[$j][$i];
            }
        }


        $sintesisNilaiKriteria = [];
        for ($i = 0; $i < $baris; $i++) {
            for ($j = 0; $j < 3; $j++) {
                $sintesisNilaiKriteria[$i][$j] = $totalMatriksPairwaise[$i][$j] / $jumlahMatriksPairwaise[2 - $j];
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
                        ($sintesisNilaiKriteria[$i][0] - $sintesisNilaiKriteria[$i][2]) /
                        ($sintesisNilaiKriteria[$i][1] - $sintesisNilaiKriteria[$i][2]) -
                        ($sintesisNilaiKriteria[$i][1] - $sintesisNilaiKriteria[$i][0]);
                }
            }
        }

        $nilaiVektor = [];
        for ($i = 0; $i < $baris; $i++) {
            $nilaiVektor[$i] = 0;
            for ($j = 0; $j < $kolom; $j++) {
                $nilaiVektor[$i] += $nilaiDerajat[$j][$i];
            }
        }

        $totNilaiVektor = array_sum($nilaiVektor);

        $nilaiVektorNormalisasi = [];
        for ($i = 0; $i < $baris; $i++) {
            $nilaiVektorNormalisasi[$i] = $nilaiVektor[$i] / $totNilaiVektor;
        }

        // dd($nilaiVektorNormalisasi);
        $data = [
            'kriteria_1' => $nilaiVektorNormalisasi[0],
            'kriteria_2' => $nilaiVektorNormalisasi[1],
            'kriteria_3' => $nilaiVektorNormalisasi[2],
            'kriteria_4' => $nilaiVektorNormalisasi[3],
            'kriteria_5' => $nilaiVektorNormalisasi[4]
        ];

        HasilBobotVektor::create($data);

        $paketwisata = PaketWisata::all();
        $hasilBobotVektor = HasilBobotVektor::latest()->first();

        $paketwisataArray = $paketwisata->toArray();
        $hasilBobotVektorArray = $hasilBobotVektor->toArray();

        $totalpaketwisata = $paketwisata->count();

        $hasilRanking = [];

        foreach ($paketwisataArray as $paket) {
            $id = $paket['id'];
            $hargaBobot = $paket['harga_bobot'];
            $popularitasBobot = $paket['popularitas_bobot'];
            $ratingBobot = $paket['rating_bobot'];
            $durasiBobot = $paket['durasi_bobot'];
            $jumlahWisataBobot = $paket['jumlah_wisata_bobot'];

            // Kalikan setiap atribut paket dengan bobot dari hasilBobotVektor
            $hargaBobot *= $hasilBobotVektorArray['kriteria_1'];
            $popularitasBobot *= $hasilBobotVektorArray['kriteria_2'];
            $ratingBobot *= $hasilBobotVektorArray['kriteria_3'];
            $durasiBobot *= $hasilBobotVektorArray['kriteria_4'];
            $jumlahWisataBobot *= $hasilBobotVektorArray['kriteria_5'];

            // Simpan hasil perhitungan dalam array 2 dimensi
            $hasilRanking[] = [
                'id' => $id,
                'hasil' => $hargaBobot + $popularitasBobot + $ratingBobot + $durasiBobot + $jumlahWisataBobot,
            ];
        }

        usort($hasilRanking, function ($a, $b) {
            return $b['hasil'] <=> $a['hasil'];
        });

        // $bobot = KriteriaBobot::latest()->first();
        // dd($PerbandinganKriteria);
        return view('dss.calculate', [
            'title' => 'Rekomendasi Paket Pariwisata',
            'active' => 'dss',
            'bobot' => KriteriaBobot::latest()->first(),
            'categories' => Category::all(),
            'hasilRanking' => $hasilRanking,
            'hasilBobotVektorArray' => $hasilBobotVektorArray,

            'totalkriteria' => $totalkriteria,
            'perbandingankriteria' => $PerbandinganKriteria,
            'matrikspairwaise' => $matriksPairwaise,
            'totalMatriksPairwaise' => $totalMatriksPairwaise,
            'jumlahMatriksPairwaise' => $jumlahMatriksPairwaise,
            'sintesisNilaiKriteria' => $sintesisNilaiKriteria,
            'nilaiDerajat' => $nilaiDerajat,

        ]);
    }

    public function rekomendasi()
    {
        $paketwisata = PaketWisata::all();
        $hasilBobotVektor = HasilBobotVektor::latest()->first();

        $paketwisataArray = $paketwisata->toArray();
        $hasilBobotVektorArray = $hasilBobotVektor->toArray();

        $totalpaketwisata = $paketwisata->count();

        $hasilRanking = [];

        foreach ($paketwisataArray as $paket) {
            $id = $paket['id'];
            $hargaBobot = $paket['harga_bobot'];
            $popularitasBobot = $paket['popularitas_bobot'];
            $ratingBobot = $paket['rating_bobot'];
            $durasiBobot = $paket['durasi_bobot'];
            $jumlahWisataBobot = $paket['jumlah_wisata_bobot'];

            // Kalikan setiap atribut paket dengan bobot dari hasilBobotVektor
            $hargaBobot *= $hasilBobotVektorArray['kriteria_1'];
            $popularitasBobot *= $hasilBobotVektorArray['kriteria_2'];
            $ratingBobot *= $hasilBobotVektorArray['kriteria_3'];
            $durasiBobot *= $hasilBobotVektorArray['kriteria_4'];
            $jumlahWisataBobot *= $hasilBobotVektorArray['kriteria_5'];

            // Simpan hasil perhitungan dalam array 2 dimensi
            $hasilRanking[] = [
                'id' => $id,
                'hasil' => $hargaBobot + $popularitasBobot + $ratingBobot + $durasiBobot + $jumlahWisataBobot,
            ];
        }

        usort($hasilRanking, function ($a, $b) {
            return $b['hasil'] <=> $a['hasil'];
        });

        // foreach ($hasilRanking as $hasil) {
        //     $id = $hasil['id'];
        //     $hasilPerankingan = $hasil['hasil'];
        // }

        // dd($hasilRanking);

        return view('dss.rekomendasi', [
            'title' => 'Rekomendasi Paket Pariwisata',
            'active' => 'dss',
            'categories' => Category::all(),
            'paketwisata' => PaketWisata::all(),
            'hasilRanking' => $hasilRanking,
            'hasilBobotVektorArray' => $hasilBobotVektorArray,
        ]);
    }
}
