<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use App\Models\HasilDss;
use App\Models\PaketWisata;
use App\Models\Subkriteria;
use Illuminate\Support\Str;
use App\Models\KriteriaBobot;
use App\Models\HasilBobotVektor;
use App\Models\HasilPerangkingan;
use App\Models\Paketwisata_pariwisata;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Seeder;
use Intervention\Image\Facades\Image;



class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Kriteria
        $subkriterias = [
            // BUDGET
            [
                'kriteria' => 'harga',
                'rentang_min' => 0,
                'rentang_max' => 300000,
                'bobot' => 7,
            ],
            [
                'kriteria' => 'harga',
                'rentang_min' => 300001,
                'rentang_max' => 500000,
                'bobot' => 9,
            ],
            [
                'kriteria' => 'harga',
                'rentang_min' => 500001,
                'rentang_max' => 800000,
                'bobot' => 5,
            ],
            [
                'kriteria' => 'harga',
                'rentang_min' => 800001,
                'rentang_max' => 2000000,
                'bobot' => 3,
            ],
            # RATING
            [
                'kriteria' => 'rating',
                'rentang_min' => 1,
                'rentang_max' => 3,
                'bobot' => 5,
            ],
            [
                'kriteria' => 'rating',
                'rentang_min' => 4,
                'rentang_max' => 6,
                'bobot' => 7,
            ],
            [
                'kriteria' => 'rating',
                'rentang_min' => 7,
                'rentang_max' => 10,
                'bobot' => 9,
            ],
            // DURASI
            [
                'kriteria' => 'durasi',
                'rentang_min' => 0.5,
                'rentang_max' => 1,
                'bobot' => 4,
            ],
            [
                'kriteria' => 'durasi',
                'rentang_min' => 1.5,
                'rentang_max' => 3,
                'bobot' => 8,
            ],
            [
                'kriteria' => 'durasi',
                'rentang_min' => 4,
                'rentang_max' => 7,
                'bobot' => 6,
            ],
            // POPULARITAS
            [
                'kriteria' => 'popularitas',
                'rentang_min' => 1,
                'rentang_max' => 10,
                'bobot' => 4,
            ],
            [
                'kriteria' => 'popularitas',
                'rentang_min' => 11,
                'rentang_max' => 25,
                'bobot' => 6,
            ],
            [
                'kriteria' => 'popularitas',
                'rentang_min' => 26,
                'rentang_max' => 35,
                'bobot' => 8,
            ],
            [
                'kriteria' => 'popularitas',
                'rentang_min' => 50,
                'rentang_max' => 100,
                'bobot' => 9,
            ],
            // RATING
            [
                'kriteria' => 'rating',
                'rentang_min' => 1,
                'rentang_max' => 3,
                'bobot' => 5,
            ],
            [
                'kriteria' => 'rating',
                'rentang_min' => 4,
                'rentang_max' => 6,
                'bobot' => 7,
            ],
            [
                'kriteria' => 'rating',
                'rentang_min' => 7,
                'rentang_max' => 10,
                'bobot' => 9,
            ],
            // Jumlah Wisata
            [
                'kriteria' => 'jumlah_wisata_dikunjungi',
                'rentang_min' => 1,
                'rentang_max' => 2,
                'bobot' => 5,
            ],
            [
                'kriteria' => 'jumlah_wisata_dikunjungi',
                'rentang_min' => 3,
                'rentang_max' => 5,
                'bobot' => 7,
            ],
            [
                'kriteria' => 'jumlah_wisata_dikunjungi',
                'rentang_min' => 7,
                'rentang_max' => 10,
                'bobot' => 9,
            ],
        ];

        foreach ($subkriterias as $sub) {

            Subkriteria::create([
                'nama' => $sub['kriteria'],
                'rentang_min' => $sub['rentang_min'],
                'rentang_max' => $sub['rentang_max'],
                'bobot' => $sub['bobot'],
            ]);
        }

        // HasilDss
        HasilDss::create([
            'user_id' => 1,
            'kriteria_bobot_id' => 1,
            'hasil_bobot_vektor_id' => 1,
            'hasil_perangkingan_id' => 1,
        ]);


        // $paketwisata = [
        //     [
        //         'nama' => 'Paket Uluwatu Exploration',
        //         'slug' => 'paket-uluwatu-exploration',
        //         'harga' => 300000,
        //         'popularitas' => 8,
        //         'rating' => 9,
        //         'durasi' => 2,
        //         'deskripsi' => 'Paket wisata A',
        //         'jumlah_wisata_dikunjungi' => 5,

        //         'harga_bobot' => 1,
        //         'popularitas_bobot' => 5,
        //         'rating_bobot' => 8,
        //         'durasi_bobot' => 2,
        //         'jumlah_wisata_bobot' => 7,
        //     ],

        //     [
        //         'nama' => 'Paket Tanjung Benoa Watersports',
        //         'slug' => 'paket-tanjung-benoa-watersports',
        //         'durasi' => 0.5,
        //         'jumlah_wisata_dikunjungi' => 1,
        //         'popularitas' => 15,
        //         'rating' => 7,
        //         'harga' => 500000,
        //         'harga_bobot' => 6,
        //         'popularitas_bobot' => 6,
        //         'rating_bobot' => 3,
        //         'durasi_bobot' => 6,
        //         'jumlah_wisata_bobot' => 9
        //     ],
        //     [
        //         'nama' => 'Paket Jimbaran Sunset Dinner',
        //         'slug' => 'paket-jimbaran-sunset-dinner',
        //         'durasi' => 0.5,
        //         'jumlah_wisata_dikunjungi' => 2,
        //         'popularitas' => 25,
        //         'rating' => 9,
        //         'harga' => 400000,
        //         'harga_bobot' => 3,
        //         'popularitas_bobot' => 9,
        //         'rating_bobot' => 6, 'durasi_bobot' => 9, 'jumlah_wisata_bobot' => 9
        //     ],


        //     [
        //         'nama' => 'Paket Legian Shopping',
        //         'user_id' => 2,
        //         'slug' => 'paket-legian-shopping',
        //         'durasi' => 0.5, 'jumlah_wisata_dikunjungi' => 2, 'popularitas' => 30, 'rating' => 8, 'harga' => 300000, 'harga_bobot' => 3, 'popularitas_bobot' => 9, 'rating_bobot' => 6, 'durasi_bobot' => 9, 'jumlah_wisata_bobot' => 6
        //     ],


        //     [
        //         'nama' => 'Paket Tanah Lot-Bedugul',
        //         'user_id' => 2,
        //         'slug' => 'paket-tanah-lot-bedugul', 'durasi' => 1, 'jumlah_wisata_dikunjungi' => 2, 'popularitas' => 20, 'rating' => 9, 'harga' => 850000, 'harga_bobot' => 9, 'popularitas_bobot' => 9, 'rating_bobot' => 6, 'durasi_bobot' => 9, 'jumlah_wisata_bobot' => 6
        //     ],


        //     [
        //         'nama' => 'Paket Kintamani-Besakih', 'slug' => 'paket-kintamani-besakih', 'durasi' => 1, 'jumlah_wisata_dikunjungi' => 2, 'popularitas' => 15, 'rating' => 8, 'harga' => 900000, 'harga_bobot' => 9, 'popularitas_bobot' => 9, 'rating_bobot' => 3, 'durasi_bobot' => 6, 'jumlah_wisata_bobot' => 6
        //     ],


        //     [
        //         'nama' => 'Paket Canggu-Tanah Lot', 'slug' => 'paket-canggu-tanah-lot', 'durasi' => 1, 'jumlah_wisata_dikunjungi' => 2, 'popularitas' => 10, 'rating' => 7, 'harga' => 600000, 'harga_bobot' => 6, 'popularitas_bobot' => 6, 'rating_bobot' => 3, 'durasi_bobot' => 6, 'jumlah_wisata_bobot' => 6
        //     ],


        //     [
        //         'nama' => 'Paket Uluwatu-Pandawa', 'slug' => 'paket-uluwatu-pandawa', 'durasi' => 0.5, 'jumlah_wisata_dikunjungi' => 2, 'popularitas' => 12, 'rating' => 8, 'harga' => 500000, 'harga_bobot' => 6, 'popularitas_bobot' => 6, 'rating_bobot' => 6, 'durasi_bobot' => 9, 'jumlah_wisata_bobot' => 9
        //     ],


        //     [
        //         'nama' => 'Paket Mengwi-Jatiluwih', 'slug' => 'paket-mengwi-jatiluwih', 'durasi' => '1', 'jumlah_wisata_dikunjungi' => 2, 'popularitas' => 8, 'rating' => 9, 'harga' => 600000, 'harga_bobot' => 6, 'popularitas_bobot' => 9, 'rating_bobot' => 6, 'durasi_bobot' => 9, 'jumlah_wisata_bobot' => 3
        //     ],


        //     [
        //         'nama' => 'Paket Nusa Penida-Crystal Bay', 'slug' => 'paket-nusa-penida-crystal-bay', 'durasi' => '1', 'jumlah_wisata_dikunjungi' => 3, 'popularitas' => 5, 'rating' => 9, 'harga' => 1300000, 'harga_bobot' => 9, 'popularitas_bobot' => 6, 'rating_bobot' => 9, 'durasi_bobot' => 9, 'jumlah_wisata_bobot' => 3
        //     ],


        //     [
        //         'nama' => 'Paket Seminyak-Ubud', 'slug' => 'paket-seminyak-ubud', 'durasi' => '1', 'jumlah_wisata_dikunjungi' => 2, 'popularitas' => 7, 'rating' => 8, 'harga' => 500000, 'harga_bobot' => 6, 'popularitas_bobot' => 6, 'rating_bobot' => 6, 'durasi_bobot' => 9, 'jumlah_wisata_bobot' => 3
        //     ],


        //     [
        //         'nama' => 'Paket Bedugul-Lovina', 'slug' => 'paket-bedugul-lovina', 'durasi' => '1', 'jumlah_wisata_dikunjungi' => 2, 'popularitas' => 4, 'rating' => 7, 'harga' => 1200000, 'harga_bobot' => 9, 'popularitas_bobot' => 6, 'rating_bobot' => 3, 'durasi_bobot' => 6, 'jumlah_wisata_bobot' => 3
        //     ],


        //     [
        //         'nama' => 'Paket Kuta-Nusa Penida', 'slug' => 'paket-kuta-nusa-penida', 'durasi' => '1', 'jumlah_wisata_dikunjungi' => 3, 'popularitas' => 3, 'rating' => 8, 'harga' => 1000000, 'harga_bobot' => 6, 'popularitas_bobot' => 6, 'rating_bobot' => 9, 'durasi_bobot' => 9, 'jumlah_wisata_bobot' => 3
        //     ],


        //     [
        //         'nama' => 'Paket Badung Round Trip', 'slug' => 'paket-badung-round-trip', 'durasi' => 0.5, 'jumlah_wisata_dikunjungi' => 4, 'popularitas' => 2, 'rating' => 9, 'harga' => 450000, 'harga_bobot' => 6, 'popularitas_bobot' => 6, 'rating_bobot' => 9, 'durasi_bobot' => 9, 'jumlah_wisata_bobot' => 9
        //     ],


        //     [
        //         'nama' => 'Paket Explore Badung', 'slug' => 'paket-explore-badung', 'durasi' => 0.5, 'jumlah_wisata_dikunjungi' => 5, 'popularitas' => 1, 'rating' => 8, 'harga' => 450000, 'harga_bobot' => 6, 'popularitas_bobot' => 6, 'rating_bobot' => 6, 'durasi_bobot' => 9, 'jumlah_wisata_bobot' => 6
        //     ],


        //     [
        //         'nama' => 'Paket Kuta-Canggu', 'slug' => 'paket-kuta-canggu', 'durasi' => 0.5, 'jumlah_wisata_dikunjungi' => 3, 'popularitas' => 45, 'rating' => 8, 'harga' => 400000, 'harga_bobot' => 3, 'popularitas_bobot' => 9, 'rating_bobot' => 6, 'durasi_bobot' => 9, 'jumlah_wisata_bobot' => 9
        //     ],


        //     [
        //         'nama' => 'Paket Ubud-Tegalalang', 'slug' => 'paket-ubud-tegalalang', 'durasi' => '1', 'jumlah_wisata_dikunjungi' => 2, 'popularitas' => 30, 'rating' => 9, 'harga' => 500000, 'harga_bobot' => 6, 'popularitas_bobot' => 6, 'rating_bobot' => 9, 'durasi_bobot' => 9, 'jumlah_wisata_bobot' => 3
        //     ],


        //     [
        //         'nama' => 'Paket Nusa Dua-Uluwatu', 'slug' => 'paket-nusa-dua-uluwatu', 'durasi' => 0.5, 'jumlah_wisata_dikunjungi' => 2, 'popularitas' => 25, 'rating' => 7, 'harga' => 700000, 'harga_bobot' => 9, 'popularitas_bobot' => 9, 'rating_bobot' => 6, 'durasi_bobot' => 9, 'jumlah_wisata_bobot' => 9
        //     ],


        //     [
        //         'nama' => 'Paket Jimbaran-Seminyak', 'slug' => 'paket-jimbaran-seminyak', 'durasi' => '1', 'jumlah_wisata_dikunjungi' => 2, 'popularitas' => 35, 'rating' => 8, 'harga' => 700000, 'harga_bobot' => 9, 'popularitas_bobot' => 9, 'rating_bobot' => 6, 'durasi_bobot' => 9, 'jumlah_wisata_bobot' => 3
        //     ],


        //     [
        //         'nama' => 'Paket Ubud Artistic Journey', 'slug' => 'paket-ubud-artistic-journey', 'durasi' => '1', 'jumlah_wisata_dikunjungi' => 2, 'popularitas' => 40, 'rating' => 9, 'harga' => 700000, 'harga_bobot' => 9, 'popularitas_bobot' => 9, 'rating_bobot' => 9, 'durasi_bobot' => 9, 'jumlah_wisata_bobot' => 3
        //     ],


        //     [
        //         'nama' => 'Paket Nusa Dua Waterblow', 'slug' => 'paket-nusa-dua-waterblow', 'durasi' => 0.5, 'jumlah_wisata_dikunjungi' => 2, 'popularitas' => 35, 'rating' => 8, 'harga' => 400000, 'harga_bobot' => 3, 'popularitas_bobot' => 9, 'rating_bobot' => 6, 'durasi_bobot' => 9, 'jumlah_wisata_bobot' => 9
        //     ],


        //     [
        //         'nama' => 'Paket Seminyak Nightlife', 'slug' => 'paket-seminyak-nightlife', 'durasi' => 0.5, 'jumlah_wisata_dikunjungi' => 2, 'popularitas' => 50, 'rating' => 9, 'harga' => 500000, 'harga_bobot' => 6, 'popularitas_bobot' => 6, 'rating_bobot' => 9, 'durasi_bobot' => 9, 'jumlah_wisata_bobot' => 9
        //     ],


        //     [
        //         'nama' => 'Paket Bedugul Nature Escape', 'slug' => 'paket-bedugul-nature-escape', 'durasi' => '1', 'jumlah_wisata_dikunjungi' => 2, 'popularitas' => 15, 'rating' => 8, 'harga' => 900000, 'harga_bobot' => 9, 'popularitas_bobot' => 9, 'rating_bobot' => 6, 'durasi_bobot' => 9, 'jumlah_wisata_bobot' => 3
        //     ],


        //     [
        //         'nama' => 'Paket Nusa Penida Adventure', 'slug' => 'paket-nusa-penida-adventure', 'durasi' => '1', 'jumlah_wisata_dikunjungi' => 3, 'popularitas' => 10, 'rating' => 7, 'harga' => 1200000, 'harga_bobot' => 9, 'popularitas_bobot' => 6, 'rating_bobot' => 3, 'durasi_bobot' => 6, 'jumlah_wisata_bobot' => 3
        //     ],


        //     [
        //         'nama' => 'Paket Kuta Beach Experience',
        //         'slug' => 'paket-kuta-beach-experience',
        //         'durasi' => 0.5,
        //         'jumlah_wisata_dikunjungi' => 2,
        //         'popularitas' => 20, 'rating' => 9,
        //         'harga' => 400000, 'harga_bobot' => 3, 'popularitas_bobot' => 9, 'rating_bobot' => 9, 'durasi_bobot' => 9, 'jumlah_wisata_bobot' => 9
        //     ]
        // ];

        $paketwisata = [
            [
                'nama' => 'Paket Uluwatu Exploration',
                'slug' => 'paket-uluwatu-exploration',
                'deskripsi' => 'Nikmati perjalanan menjelajahi Uluwatu, kunjungi Pura Uluwatu, saksikan pertunjukan kecak, dan nikmati pemandangan laut.',
                'pariwisata_yang_dikunjungi' => 'Pura Luhur Uluwatu, Pantai Suluban',
                'durasi' => 0.5,
                'jumlah_wisata_dikunjungi' => 2,
                'popularitas' => 20,
                'rating' => 8,
                'harga' => 600000,
                'harga_bobot' => 6,
                'popularitas_bobot' => 6,
                'rating_bobot' => 9,
                'durasi_bobot' => 9,
                'jumlah_wisata_bobot' => 9,
                'terbilang' => 'Rp600.000,00',
            ],
            [
                'nama' => 'Paket Tanjung Benoa Watersports',
                'slug' => 'paket-tanjung-benoa-watersports',
                'deskripsi' => 'Rasakan keseruan aktivitas air di Tanjung Benoa, seperti jet ski, parasailing, banana boat, dan snorkeling.',
                'pariwisata_yang_dikunjungi' => 'Watersports di Tanjung Benoa',
                'durasi' => 0.5,
                'jumlah_wisata_dikunjungi' => 1,
                'popularitas' => 15,
                'rating' => 7,
                'harga' => 500000,
                'harga_bobot' => 6,
                'popularitas_bobot' => 3,
                'rating_bobot' => 6,
                'durasi_bobot' => 6,
                'jumlah_wisata_bobot' => 9,
                'terbilang' => 'Rp500.000,00',
            ],
            [
                'nama' => 'Paket Jimbaran Sunset Dinner',
                'slug' => 'paket-jimbaran-sunset-dinner',
                'deskripsi' => 'Nikmati makan malam romantis dengan pemandangan sunset yang memukau di Jimbaran sambil menikmati hidangan seafood lezat.',
                'pariwisata_yang_dikunjungi' => 'Pantai Jimbaran, Makan Malam Sunset',
                'durasi' => 0.5,
                'jumlah_wisata_dikunjungi' => 2,
                'popularitas' => 25,
                'rating' => 9,
                'harga' => 400000,
                'harga_bobot' => 3,
                'popularitas_bobot' => 9,
                'rating_bobot' => 9,
                'durasi_bobot' => 9,
                'jumlah_wisata_bobot' => 9,
                'terbilang' => 'Rp400.000,00',
            ],
            [
                'nama' => 'Paket Legian Shopping',
                'slug' => 'paket-legian-shopping',
                'deskripsi' => 'Jelajahi pusat perbelanjaan di Legian dan temukan beragam toko fashion, aksesori, dan suvenir khas Bali.',
                'pariwisata_yang_dikunjungi' => 'Jalan Legian, Beachwalk Mall',
                'durasi' => 0.5,
                'jumlah_wisata_dikunjungi' => 2,
                'popularitas' => 30,
                'rating' => 8,
                'harga' => 300000,
                'harga_bobot' => 3,
                'popularitas_bobot' => 9,
                'rating_bobot' => 9,
                'durasi_bobot' => 9,
                'jumlah_wisata_bobot' => 9,
                'terbilang' => 'Rp300.000,00',
            ],
            [
                'nama' => 'Paket Canggu-Tanah Lot',
                'slug' => 'paket-canggu-tanah-lot',
                'deskripsi' => 'Gabungan antara kunjungan ke Pantai Canggu yang populer dan Pura Tanah Lot yang ikonik di tepi laut.',
                'pariwisata_yang_dikunjungi' => 'Pantai Canggu, Pura Tanah Lot',
                'durasi' => 1,
                'jumlah_wisata_dikunjungi' => 2,
                'popularitas' => 10,
                'rating' => 7,
                'harga' => 600000,
                'harga_bobot' => 6,
                'popularitas_bobot' => 6,
                'rating_bobot' => 6,
                'durasi_bobot' => 9,
                'jumlah_wisata_bobot' => 6,
                'terbilang' => 'Rp600.000,00',
            ],
            [
                'nama' => 'Paket Uluwatu-Pandawa',
                'slug' => 'paket-uluwatu-pandawa',
                'deskripsi' => 'Nikmati perjalanan dari Uluwatu ke Pantai Pandawa, menikmati pemandangan tebing dan pantai yang memukau di sepanjang jalan.',
                'pariwisata_yang_dikunjungi' => 'Pura Luhur Uluwatu, Pantai Pandawa',
                'durasi' => 0.5,
                'jumlah_wisata_dikunjungi' => 2,
                'popularitas' => 12,
                'rating' => 8,
                'harga' => 500000,
                'harga_bobot' => 6,
                'popularitas_bobot' => 6,
                'rating_bobot' => 9,
                'durasi_bobot' => 9,
                'jumlah_wisata_bobot' => 9,
                'terbilang' => 'Rp500.000,00',
            ],
            [
                'nama' => 'Paket Mengwi-Jatiluwih',
                'slug' => 'paket-mengwi-jatiluwih',
                'deskripsi' => 'Kunjungi Pura Taman Ayun di Mengwi dan nikmati pemandangan indah serta sawah terasering di Jatiluwih.',
                'pariwisata_yang_dikunjungi' => 'Pura Taman Ayun, Jatiluwih Rice Terrace',
                'durasi' => 1,
                'jumlah_wisata_dikunjungi' => 2,
                'popularitas' => 8,
                'rating' => 9,
                'harga' => 600000,
                'harga_bobot' => 6,
                'popularitas_bobot' => 9,
                'rating_bobot' => 9,
                'durasi_bobot' => 9,
                'jumlah_wisata_bobot' => 3,
                'terbilang' => 'Rp600.000,00',
            ],
            [
                'nama' => 'Paket Nusa Penida-Crystal Bay',
                'slug' => 'paket-nusa-penida-crystal-bay',
                'deskripsi' => 'Jelajahi keindahan Pulau Nusa Penida, kunjungi Crystal Bay, snorkeling di spot terbaik, dan rasakan pesona alamnya.',
                'pariwisata_yang_dikunjungi' => 'Pantai Kelingking, Crystal Bay, Broken Beach',
                'durasi' => 1,
                'jumlah_wisata_dikunjungi' => 3,
                'popularitas' => 5,
                'rating' => 9,
                'harga' => 1300000,
                'harga_bobot' => 9,
                'popularitas_bobot' => 6,
                'rating_bobot' => 9,
                'durasi_bobot' => 9,
                'jumlah_wisata_bobot' => 3,
                'terbilang' => 'Rp1.300.000,00',
            ],
            [
                'nama' => 'Paket Kuta-Nusa Penida',
                'slug' => 'paket-kuta-nusa-penida',
                'deskripsi' => 'Menggabungkan wisata di Kuta dengan petualangan ke Nusa Penida, menikmati pantai-pantai eksotis dan aktivitas air.',
                'pariwisata_yang_dikunjungi' => 'Pantai Kuta, Pantai Atuh, Pulau Seribu',
                'durasi' => 1,
                'jumlah_wisata_dikunjungi' => 3,
                'popularitas' => 3,
                'rating' => 8,
                'harga' => 1000000,
                'harga_bobot' => 6,
                'popularitas_bobot' => 6,
                'rating_bobot' => 9,
                'durasi_bobot' => 9,
                'jumlah_wisata_bobot' => 3,
                'terbilang' => 'Rp1.000.000,00',
            ],
            [
                'nama' => 'Paket Explore Badung',
                'slug' => 'paket-explore-badung',
                'deskripsi' => 'Menjelajahi berbagai tempat menarik di Badung, termasuk pantai, pura, dan tempat wisata lainnya yang terkenal.',
                'pariwisata_yang_dikunjungi' => 'Pantai Kuta, Pantai Sanur, Pura Besakih, Pantai Nusa Dua, Pantai Uluwatu',
                'durasi' => 0.5,
                'jumlah_wisata_dikunjungi' => 5,
                'popularitas' => 1,
                'rating' => 8,
                'harga' => 450000,
                'harga_bobot' => 6,
                'popularitas_bobot' => 6,
                'rating_bobot' => 9,
                'durasi_bobot' => 9,
                'jumlah_wisata_bobot' => 6,
                'terbilang' => 'Rp450.000,00',
            ],
            [
                'nama' => 'Paket Kuta-Canggu',
                'slug' => 'paket-kuta-canggu',
                'deskripsi' => 'Kombinasi perjalanan dari Kuta ke Canggu, mengunjungi pantai-pantai, kafe trendi, dan menikmati suasana yang santai.',
                'pariwisata_yang_dikunjungi' => 'Pantai Kuta, Pantai Canggu, Pantai Berawa',
                'durasi' => 0.5,
                'jumlah_wisata_dikunjungi' => 3,
                'popularitas' => 45,
                'rating' => 8,
                'harga' => 400000,
                'harga_bobot' => 3,
                'popularitas_bobot' => 9,
                'rating_bobot' => 9,
                'durasi_bobot' => 9,
                'jumlah_wisata_bobot' => 9,
                'terbilang' => 'Rp400.000,00',
            ],
            [
                'nama' => 'Paket Nusa Dua-Uluwatu',
                'slug' => 'paket-nusa-dua-uluwatu',
                'deskripsi' => 'Menggabungkan keindahan Nusa Dua dengan Uluwatu, mengunjungi pantai-pantai, Pura Uluwatu, dan menikmati sunset spektakuler.',
                'pariwisata_yang_dikunjungi' => 'Pantai Nusa Dua, Pura Luhur Uluwatu',
                'durasi' => 0.5,
                'jumlah_wisata_dikunjungi' => 2,
                'popularitas' => 25,
                'rating' => 7,
                'harga' => 700000,
                'harga_bobot' => 9,
                'popularitas_bobot' => 9,
                'rating_bobot' => 6,
                'durasi_bobot' => 9,
                'jumlah_wisata_bobot' => 9,
                'terbilang' => 'Rp700.000,00',
            ],
            [
                'nama' => 'Paket Jimbaran-Seminyak',
                'slug' => 'paket-jimbaran-seminyak',
                'deskripsi' => 'Menikmati perjalanan dari Jimbaran ke Seminyak, mengunjungi pantai, restoran, bar, dan berbelanja di Seminyak Square.',
                'pariwisata_yang_dikunjungi' => 'Pantai Jimbaran, Pantai Seminyak',
                'durasi' => 1,
                'jumlah_wisata_dikunjungi' => 2,
                'popularitas' => 35,
                'rating' => 8,
                'harga' => 700000,
                'harga_bobot' => 9,
                'popularitas_bobot' => 9,
                'rating_bobot' => 6,
                'durasi_bobot' => 9,
                'jumlah_wisata_bobot' => 9,
                'terbilang' => 'Rp700.000,00',
            ],
            [
                'nama' => 'Paket Nusa Dua Waterblow',
                'slug' => 'paket-nusa-dua-waterblow',
                'deskripsi' => 'Mengunjungi WaterBlow di Nusa Dua, mengamati fenomena alam unik saat ombak besar memancar melalui celah tebing.',
                'pariwisata_yang_dikunjungi' => 'Pantai Nusa Dua, WaterBlow',
                'durasi' => 0.5,
                'jumlah_wisata_dikunjungi' => 2,
                'popularitas' => 35,
                'rating' => 8,
                'harga' => 400000,
                'harga_bobot' => 3,
                'popularitas_bobot' => 9,
                'rating_bobot' => 6,
                'durasi_bobot' => 9,
                'jumlah_wisata_bobot' => 9,
                'terbilang' => 'Rp400.000,00',
            ],
            [
                'nama' => 'Paket Seminyak Nightlife',
                'slug' => 'paket-seminyak-nightlife',
                'deskripsi' => 'Menikmati kehidupan malam Seminyak, menjelajahi bar dan klub malam yang populer serta suasana hiburan yang seru.',
                'pariwisata_yang_dikunjungi' => 'Pantai Seminyak, Bar dan Klub',
                'durasi' => 0.5,
                'jumlah_wisata_dikunjungi' => 2,
                'popularitas' => 50,
                'rating' => 9,
                'harga' => 500000,
                'harga_bobot' => 6,
                'popularitas_bobot' => 6,
                'rating_bobot' => 9,
                'durasi_bobot' => 9,
                'jumlah_wisata_bobot' => 9,
                'terbilang' => 'Rp500.000,00',
            ],
            [
                'nama' => 'Paket Canggu Surf Adventure',
                'slug' => 'paket-canggu-surf-adventure',
                'deskripsi' => 'Petualangan berselancar di pantai-pantai terbaik di Canggu, mengikuti kelas surfing dan menikmati waktu di tepi pantai.',
                'pariwisata_yang_dikunjungi' => 'Pantai Canggu, Belajar Surfing',
                'durasi' => 1,
                'jumlah_wisata_dikunjungi' => 2,
                'popularitas' => 10,
                'rating' => 7,
                'harga' => 500000,
                'harga_bobot' => 6,
                'popularitas_bobot' => 9,
                'rating_bobot' => 3,
                'durasi_bobot' => 6,
                'jumlah_wisata_bobot' => 6,
                'terbilang' => 'Rp500.000,00',
            ],
            [
                'nama' => 'Paket Nusa Penida Explorer',
                'slug' => 'paket-nusa-penida-explorer',
                'deskripsi' => 'Petualangan eksplorasi penuh di Pulau Nusa Penida, meliputi pantai-pantai indah, gua-gua, dan panorama alam yang luar biasa.',
                'pariwisata_yang_dikunjungi' => 'Pantai Kelingking, Angel\'s Billabong, Broken Beach',
                'durasi' => 1,
                'jumlah_wisata_dikunjungi' => 3,
                'popularitas' => 8,
                'rating' => 9,
                'harga' => 1200000,
                'harga_bobot' => 9,
                'popularitas_bobot' => 6,
                'rating_bobot' => 9,
                'durasi_bobot' => 9,
                'jumlah_wisata_bobot' => 3,
                'terbilang' => 'Rp1.200.000,00',
            ],
            [
                'nama' => 'Paket Tanah Lot-Uluwatu',
                'slug' => 'paket-tanah-lot-uluwatu',
                'deskripsi' => 'Mengunjungi Pura Tanah Lot dan Pura Uluwatu yang terkenal, serta menikmati pemandangan sunset yang menakjubkan.',
                'pariwisata_yang_dikunjungi' => 'Pura Tanah Lot, Pura Luhur Uluwatu',
                'durasi' => 1,
                'jumlah_wisata_dikunjungi' => 2,
                'popularitas' => 6,
                'rating' => 8,
                'harga' => 900000,
                'harga_bobot' => 9,
                'popularitas_bobot' => 9,
                'rating_bobot' => 3,
                'durasi_bobot' => 6,
                'jumlah_wisata_bobot' => 6,
                'terbilang' => 'Rp900.000,00',
            ],
            [
                'nama' => 'Paket Badung Nature Expedition',
                'slug' => 'paket-badung-nature-expedition',
                'deskripsi' => 'Petualangan eksplorasi alam di Badung, menjelajahi pemandangan alam, air terjun, dan trekking di hutan tropis.',
                'pariwisata_yang_dikunjungi' => 'Pantai Kuta, Pantai Balangan, Pantai Green Bowl, Pura Luhur Uluwatu',
                'durasi' => 1,
                'jumlah_wisata_dikunjungi' => 4,
                'popularitas' => 1,
                'rating' => 8,
                'harga' => 500000,
                'harga_bobot' => 6,
                'popularitas_bobot' => 6,
                'rating_bobot' => 9,
                'durasi_bobot' => 9,
                'jumlah_wisata_bobot' => 3,
                'terbilang' => 'Rp500.000,00',
            ],
            [
                'nama' => 'Paket Kuta Beach Getaway',
                'slug' => 'paket-kuta-ber-getaway',
                'deskripsi' => 'Liburan santai di pantai-pantai indah di sekitar Kuta, bersantai, berenang, dan menikmati kehidupan pantai.',
                'pariwisata_yang_dikunjungi' => 'Pantai Kuta, Waterbom Bali',
                'durasi' => 1,
                'jumlah_wisata_dikunjungi' => 2,
                'popularitas' => 12,
                'rating' => 8,
                'harga' => 550000,
                'harga_bobot' => 6,
                'popularitas_bobot' => 9,
                'rating_bobot' => 6,
                'durasi_bobot' => 9,
                'jumlah_wisata_bobot' => 6,
                'terbilang' => 'Rp550.000,00',
            ],
            [
                'nama' => 'Paket Nusa Penida Island Hopping',
                'slug' => 'paket-nusa-penida-island-hopping',
                'deskripsi' => 'Menikmati hopping dari satu pulau ke pulau lain di Nusa Penida, mengunjungi pantai-pantai cantik dan lokasi snorkeling.',
                'pariwisata_yang_dikunjungi' => 'Pantai Kelingking, Pulau Penida',
                'durasi' => 1,
                'jumlah_wisata_dikunjungi' => 3,
                'popularitas' => 15,
                'rating' => 8,
                'harga' => 650000,
                'harga_bobot' => 6,
                'popularitas_bobot' => 6,
                'rating_bobot' => 9,
                'durasi_bobot' => 9,
                'jumlah_wisata_bobot' => 3,
                'terbilang' => 'Rp650.000,00',
            ],
            [
                'nama' => 'Paket Tanah Lot Sunset Tour',
                'slug' => 'paket-tanah-lot-sunset-tour',
                'deskripsi' => 'Mengunjungi Pura Tanah Lot untuk menikmati pemandangan matahari terbenam yang spektakuler.',
                'pariwisata_yang_dikunjungi' => 'Pura Tanah Lot, Taman Ayun',
                'durasi' => 0.5,
                'jumlah_wisata_dikunjungi' => 2,
                'popularitas' => 18,
                'rating' => 7,
                'harga' => 500000,
                'harga_bobot' => 6,
                'popularitas_bobot' => 6,
                'rating_bobot' => 3,
                'durasi_bobot' => 6,
                'jumlah_wisata_bobot' => 9,
                'terbilang' => 'Rp500.000,00',
            ],
            [
                'nama' => 'Paket Seminyak Shopping Spree',
                'slug' => 'paket-seminyak-shopping-spree',
                'deskripsi' => 'Berbelanja di pusat perbelanjaan terkenal di Seminyak, menemukan produk fashion, aksesori, dan kerajinan Bali.',
                'pariwisata_yang_dikunjungi' => 'Jalan Oberoi, Seminyak Square',
                'durasi' => 0.5,
                'jumlah_wisata_dikunjungi' => 1,
                'popularitas' => 10,
                'rating' => 7,
                'harga' => 400000,
                'harga_bobot' => 3,
                'popularitas_bobot' => 6,
                'rating_bobot' => 3,
                'durasi_bobot' => 6,
                'jumlah_wisata_bobot' => 6,
                'terbilang' => 'Rp400.000,00',
            ],
            [
                'nama' => 'Paket Jimbaran Seafood Dinner',
                'slug' => 'paket-jimbaran-seafood-dinner',
                'deskripsi' => 'Makan malam lezat dengan hidangan seafood segar di restoran terkenal di Jimbaran.',
                'pariwisata_yang_dikunjungi' => 'Pantai Jimbaran, Makan Malam Seafood',
                'durasi' => 0.5,
                'jumlah_wisata_dikunjungi' => 1,
                'popularitas' => 14,
                'rating' => 8,
                'harga' => 450000,
                'harga_bobot' => 6,
                'popularitas_bobot' => 6,
                'rating_bobot' => 6,
                'durasi_bobot' => 9,
                'jumlah_wisata_bobot' => 6,
                'terbilang' => 'Rp450.000,00',
            ],
            [
                'nama' => 'Paket Canggu Beach Experience',
                'slug' => 'paket-canggu-beach-experience',
                'deskripsi' => 'Pengalaman pantai yang seru di Canggu, berselancar, berjemur, dan menikmati aktivitas pantai lainnya.',
                'pariwisata_yang_dikunjungi' => 'Pantai Batu Bolong, Finn\'s Beach Club',
                'durasi' => 0.5,
                'jumlah_wisata_dikunjungi' => 1,
                'popularitas' => 13,
                'rating' => 8,
                'harga' => 500000,
                'harga_bobot' => 6,
                'popularitas_bobot' => 6,
                'rating_bobot' => 6,
                'durasi_bobot' => 9,
                'jumlah_wisata_bobot' => 6,
                'terbilang' => 'Rp500.000,00',
            ],
            [
                'nama' => 'Paket Nusa Dua Watersport Adventure',
                'slug' => 'paket-nusa-dua-watersport-adventure',
                'deskripsi' => 'Petualangan seru di Nusa Dua dengan berbagai aktivitas air seperti jet ski, flyboarding, snorkeling, dan diving.',
                'pariwisata_yang_dikunjungi' => 'Watersports di Nusa Dua',
                'durasi' => 0.5,
                'jumlah_wisata_dikunjungi' => 1,
                'popularitas' => 16,
                'rating' => 7,
                'harga' => 450000,
                'harga_bobot' => 6,
                'popularitas_bobot' => 6,
                'rating_bobot' => 6,
                'durasi_bobot' => 9,
                'jumlah_wisata_bobot' => 6,
                'terbilang' => 'Rp450.000',
            ],
            [
                'nama' => 'Paket Mengwi Temple Tour',
                'slug' => 'paket-mengwi-temple-tour',
                'deskripsi' => 'Mengunjungi Pura Taman Ayun dan Pura Mengwi yang terkenal di Mengwi, menggali keindahan arsitektur dan budaya tradisional Bali.',
                'pariwisata_yang_dikunjungi' => 'Pura Taman Ayun, Pura Mengwi',
                'durasi' => 1,
                'jumlah_wisata_dikunjungi' => 2,
                'popularitas' => 10,
                'rating' => 7,
                'harga' => 500000,
                'harga_bobot' => 6,
                'popularitas_bobot' => 9,
                'rating_bobot' => 6,
                'durasi_bobot' => 9,
                'jumlah_wisata_bobot' => 3,
                'terbilang' => 'Rp500.000,00',
            ],
        ];

        foreach ($paketwisata as $data) {
            // $data['slug'] = Str::slug($data['name']);

            $judul = ($data['nama']);
            $imagePath = "/paketwisata-image/{$judul}.jpg";

            PaketWisata::create([
                'nama' => $data['nama'],
                'user_id' => rand(1, 4),
                'slug' => $data['slug'],
                'body' => $data['deskripsi'],

                'harga' => $data['harga'],
                'popularitas' => $data['popularitas'],
                'rating' => $data['rating'],
                'durasi' => $data['durasi'],
                'jumlah_wisata_dikunjungi' => $data['jumlah_wisata_dikunjungi'],

                'harga_bobot' => $data['harga_bobot'],
                'popularitas_bobot' => $data['popularitas_bobot'],
                'rating_bobot' => $data['rating_bobot'],
                'durasi_bobot' => $data['durasi_bobot'],
                'jumlah_wisata_bobot' => $data['jumlah_wisata_bobot'],

                'pariwisata_yang_dikunjungi' => $data['pariwisata_yang_dikunjungi'],
                'terbilang' => $data['terbilang']
            ]);
        }

        User::create([
            'name' => 'Sandhika Galih',
            'username' => 'sandika',
            'email' => 'sandhika@gmail.com',
            'password' => bcrypt('12345'),
            'is_admin' => 0,
            'is_pengelola_paket_wisata' => 1,
            'is_pengelola_wisata' => 1,
        ]);

        User::create([
            'name' => 'Pande Yogam',
            'username' => 'pande',
            'email' => 'pandeyogam321@gmail.com',
            'password' => bcrypt('12345'),
            'is_admin' => 1,
            'is_pengelola_paket_wisata' => 1,
            'is_pengelola_wisata' => 1,
        ]);

        User::factory(3)->create();

        $categories = [
            [
                'name' => 'Relaksasi Alam',
                'body' => 'Nikmati keindahan alam yang menenangkan di destinasi-relaksasi alam terbaik di Badung',
            ],
            [
                'name' => 'Rekreasi Flora & Fauna',
                'body' => 'Jelajahi kekayaan flora dan fauna di tempat rekreasi yang penuh petualangan di Badung',
            ],
            [
                'name' => 'Taman Rekreasi dan Hiburan',
                'body' => 'Temukan keseruan dan hiburan yang tak terlupakan di taman rekreasi terpopuler di Badung',
            ],
            [
                'name' => 'Budaya dan Sejarah',
                'body' => 'Telusuri keunikan budaya dan sejarah yang kaya di destinasi budaya dan sejarah di Badung',
            ],
            [
                'name' => 'Pantai',
                'body' => 'Rasakan keindahan pantai-pantai terbaik yang menakjubkan di Badung',
            ],
            [
                'name' => 'Petualangan dan Ekspedisi',
                'body' => 'Temukan petualangan dan ekspedisi seru di destinasi petualangan dan ekspedisi terbaik di Badung',
            ],
            [
                'name' => 'Kuliner',
                'body' => 'Coba berbagai menu baru dan menggiurkan yang ada di Badung',
            ],
        ];

        foreach ($categories as $data) {
            $data['slug'] = Str::slug($data['name']);

            Category::create([
                'name' => $data['name'],
                'slug' => $data['slug'],
                'body' => $data['body']
            ]);
        }


        $data = [
            [
                'title' => 'Air Terjun Nungnung',
                'body' => 'Air Terjun Nungnung adalah air terjun yang tinggi dengan pemandangan alam yang indah dan trek menantang untuk mencapai lokasinya.',
                'Kategori Umum' => 1,
                'Kategori Detail' => 'Air Terjun',
                'Lokasi Umum' => 'Plaga, Badung',
                'Lokasi Detail' => 'Desa Plaga',
                'Jam Operasional' => '07.00-18.00',
            ],
            [
                'title' => 'Alas Pala Sangeh',
                'body' => 'Alas Pala Sangeh adalah hutan kera yang terkenal dengan populasi kera yang besar dan pura yang terletak di dalam hutan.',
                'Kategori Umum' => 2,
                'Kategori Detail' => 'Hutan Kera',
                'Lokasi Umum' => 'Sangeh, Badung',
                'Lokasi Detail' => 'Jalan Raya Sangeh',
                'Jam Operasional' => '08.00-18.00',
            ],
            [
                'title' => 'Bali Elephant Camp',
                'body' => 'Bali Elephant Camp adalah tempat di mana Anda dapat menikmati pengalaman menunggangi gajah dan berinteraksi dengan gajah-gajah tersebut.',
                'Kategori Umum' => 2,
                'Kategori Detail' => 'Interaksi Hewan',
                'Lokasi Umum' => 'Carangsari, Badung',
                'Lokasi Detail' => 'Jalan Raya Singapadu',
                'Jam Operasional' => '08.00-18.00',
            ],
            [
                'title' => 'Bali Swing',
                'body' => 'Bali Swing adalah taman hiburan yang terkenal dengan ayunan gantung yang besar dan menawarkan pemandangan alam yang spektakuler.',
                'Kategori Umum' => 3,
                'Kategori Detail' => 'Taman Hiburan',
                'Lokasi Umum' => 'Bongkasa, Badung',
                'Lokasi Detail' => 'Jalan Raya Bongkasa',
                'Jam Operasional' => '08.00-17.00',
            ],
            [
                'title' => 'Bumi Perkemahan Blahkiuh',
                'body' => 'Bumi Perkemahan Blahkiuh adalah tempat perkemahan di tengah alam dengan pemandangan hutan dan sungai yang indah.',
                'Kategori Umum' => 3,
                'Kategori Detail' => 'Perkemahan',
                'Lokasi Umum' => 'Plaga, Badung',
                'Lokasi Detail' => 'Desa Plaga',
                'Jam Operasional' => '24 Jam',
            ],
            [
                'title' => 'Garuda Wisnu Kencana (GWK)',
                'body' => 'Garuda Wisnu Kencana (GWK) adalah kompleks taman budaya dengan patung Dewa Wisnu yang megah dan berbagai acara seni dan budaya.',
                'Kategori Umum' => 4,
                'Kategori Detail' => 'Taman Budaya',
                'Lokasi Umum' => 'Ungasan, Badung',
                'Lokasi Detail' => 'Jalan Raya Uluwatu',
                'Jam Operasional' => '08.00-22.00',
            ],

            [
                'title' => 'Kawasan Jembatan Tukad Bangkung',
                'body' => 'Kawasan Jembatan Tukad Bangkung adalah area sekitar jembatan gantung yang indah dan menawarkan pemandangan sungai yang spektakuler.',
                'Kategori Umum' => 3,
                'Kategori Detail' => 'Jembatan',
                'Lokasi Umum' => 'Baha, Badung',
                'Lokasi Detail' => 'Jalan Raya Kuta-Badung',
                'Jam Operasional' => '24 Jam',
            ],

            [
                'title' => 'Kawasan Luar Pura Puncak Tedung',
                'body' => 'Kawasan Luar Pura Puncak Tedung adalah area sekitar Pura Puncak Tedung yang menawarkan pemandangan alam yang menakjubkan.',
                'Kategori Umum' => 4,
                'Kategori Detail' => 'Pura',
                'Lokasi Umum' => 'Mangupura, Badung',
                'Lokasi Detail' => 'Jalan Raya Kapal',
                'Jam Operasional' => '08.00-18.00',
            ],

            [
                'title' => 'Kawasan Luar Pura Taman Ayun',
                'body' => 'Kawasan Luar Pura Taman Ayun adalah area sekitar Pura Taman Ayun yang menawarkan pemandangan dan kegiatan keagamaan yang khas Bali.',
                'Kategori Umum' => 4,
                'Kategori Detail' => 'Pura',
                'Lokasi Umum' => 'Mengwi, Badung',
                'Lokasi Detail' => 'Jalan Raya Mengwi',
                'Jam Operasional' => '08.00-18.00',
            ],
            [
                'title' => 'Kawasan Luar Pura Uluwatu',
                'body' => 'Kawasan Luar Pura Uluwatu adalah area di sekitar Pura Uluwatu yang menawarkan pemandangan spektakuler dan kegiatan budaya Bali.',
                'Kategori Umum' => 4,
                'Kategori Detail' => 'Kawasan Pura',
                'Lokasi Umum' => 'Uluwatu, Badung',
                'Lokasi Detail' => 'Jalan Uluwatu, Pecatu',
                'Jam Operasional' => '08.00-18.00',
            ],
            [
                'title' => 'Kawasan Pura Kereban Langit',
                'body' => 'Kawasan Pura Kereban Langit adalah area sekitar Pura Kereban Langit yang menawarkan pemandangan alam yang indah dan kegiatan keagamaan.',
                'Kategori Umum' => 4,
                'Kategori Detail' => 'Pura',
                'Lokasi Umum' => 'Mengwi, Badung',
                'Lokasi Detail' => 'Jalan Raya Mengwi',
                'Jam Operasional' => '08.00-18.00',
            ],
            [
                'title' => 'Museum Bali',
                'body' => 'Museum Bali adalah museum seni dan budaya yang menampilkan koleksi seni dan artefak sejarah Bali.',
                'Kategori Umum' => 4,
                'Kategori Detail' => 'Museum',
                'Lokasi Umum' => 'Denpasar, Badung',
                'Lokasi Detail' => 'Jalan Mayor Wisnu',
                'Jam Operasional' => '08.00-16.00',
            ],
            [
                'title' => 'Pancoran Solas Taman Mumbul',
                'body' => 'Pancoran Solas Taman Mumbul adalah sumber mata air alami yang diatur dalam taman indah dengan kolam renang.',
                'Kategori Umum' => 1,
                'Kategori Detail' => 'Sumber Mata Air',
                'Lokasi Umum' => 'Carangsari, Badung',
                'Lokasi Detail' => 'Jalan Raya Batubulan',
                'Jam Operasional' => '08.00-18.00',
            ],
            [
                'title' => 'Pantai Batu Pageh',
                'body' => 'Pantai Batu Pageh adalah pantai yang tenang dengan batu-batu besar di sekitarnya, ideal untuk bersantai dan menikmati pemandangan laut.',
                'Kategori Umum' => 5,
                'Kategori Detail' => 'Pantai',
                'Lokasi Umum' => 'Pecatu, Badung',
                'Lokasi Detail' => 'Jalan Batu Pageh',
                'Jam Operasional' => '24 Jam',
            ],
            [
                'title' => 'Pantai Berawa',
                'body' => 'Pantai Berawa adalah pantai yang terkenal dengan ombak yang bagus untuk berselancar dan klub pantai yang populer.',
                'Kategori Umum' => 5,
                'Kategori Detail' => 'Pantai',
                'Lokasi Umum' => 'Canggu, Badung',
                'Lokasi Detail' => 'Jalan Pantai Berawa',
                'Jam Operasional' => '24 Jam',
            ],
            [
                'title' => 'Pantai Canggu',
                'body' => 'Pantai Canggu adalah pantai yang terkenal dengan ombak yang bagus untuk berselancar dan kafe-kafe yang trendi di sekitarnya.',
                'Kategori Umum' => 5,
                'Kategori Detail' => 'Pantai',
                'Lokasi Umum' => 'Canggu, Badung',
                'Lokasi Detail' => 'Jalan Batu Bolong',
                'Jam Operasional' => '24 Jam',
            ],
            [
                'title' => 'Pantai Geger Sawangan',
                'body' => 'Pantai Geger Sawangan adalah pantai yang terkenal dengan pasir putih yang lembut dan air laut yang jernih.',
                'Kategori Umum' => 5,
                'Kategori Detail' => 'Pantai',
                'Lokasi Umum' => 'Sawangan, Badung',
                'Lokasi Detail' => 'Jalan Pantai Geger Sawangan',
                'Jam Operasional' => '24 Jam',
            ],
            [
                'title' => 'Pantai Jimbaran',
                'body' => 'Pantai Jimbaran adalah pantai yang terkenal dengan pemandangan matahari terbenam yang spektakuler dan restoran seafood yang lezat.',
                'Kategori Umum' => 5,
                'Kategori Detail' => 'Pantai',
                'Lokasi Umum' => 'Jimbaran, Badung',
                'Lokasi Detail' => 'Jalan Pantai Jimbaran',
                'Jam Operasional' => '24 Jam',
            ],
            [
                'title' => 'Pantai Kedonganan',
                'body' => 'Pantai Kedonganan adalah pantai yang terkenal dengan restoran-restoran seafood tepi pantai dan pemandangan matahari terbenam yang indah.',
                'Kategori Umum' => 5,
                'Kategori Detail' => 'Pantai',
                'Lokasi Umum' => 'Kedonganan, Badung',
                'Lokasi Detail' => 'Jalan Pantai Kedonganan',
                'Jam Operasional' => '24 Jam',
            ],
            [
                'title' => 'Pantai Labuan Sait',
                'body' => 'Pantai Labuan Sait adalah pantai dengan ombak yang bagus untuk berselancar dan pemandangan tebing yang dramatis.',
                'Kategori Umum' => 5,
                'Kategori Detail' => 'Pantai',
                'Lokasi Umum' => 'Pecatu, Badung',
                'Lokasi Detail' => 'Jalan Labuan Sait',
                'Jam Operasional' => '24 Jam',
            ],
            [
                'title' => 'Pantai Legian',
                'body' => 'Pantai Legian adalah pantai yang terkenal dengan ombak yang bagus untuk berselancar dan suasana pantai yang hidup.',
                'Kategori Umum' => 5,
                'Kategori Detail' => 'Pantai',
                'Lokasi Umum' => 'Legian, Badung',
                'Lokasi Detail' => 'Jalan Pantai Legian',
                'Jam Operasional' => '24 Jam',
            ],
            [
                'title' => 'Pantai Melasti',
                'body' => 'Pantai Melasti adalah pantai yang terkenal dengan upacara Melasti yang diadakan di sini setiap tahunnya.',
                'Kategori Umum' => 5,
                'Kategori Detail' => 'Pantai',
                'Lokasi Umum' => 'Kutuh, Badung',
                'Lokasi Detail' => 'Jalan Pantai Melasti',
                'Jam Operasional' => '24 Jam',
            ],
            [
                'title' => 'Pantai Nyang - Nyang',
                'body' => 'Pantai Nyang-Nyang adalah pantai yang jarang dikunjungi dengan pemandangan yang indah dan ombak yang cocok untuk berselancar.',
                'Kategori Umum' => 5,
                'Kategori Detail' => 'Pantai',
                'Lokasi Umum' => 'Pecatu, Badung',
                'Lokasi Detail' => 'Jalan Pantai Nyang-Nyang',
                'Jam Operasional' => '24 Jam',
            ],
            [
                'title' => 'Pantai Padang - Padang',
                'body' => 'Pantai Padang-Padang adalah pantai yang terkenal dengan ombak yang bagus untuk berselancar dan pasir putih yang indah.',
                'Kategori Umum' => 5,
                'Kategori Detail' => 'Pantai',
                'Lokasi Umum' => 'Pecatu, Badung',
                'Lokasi Detail' => 'Jalan Labuan Sait',
                'Jam Operasional' => '08.00-20.00',
            ],
            [
                'title' => 'Pantai Pandawa',
                'body' => 'Pantai Pandawa adalah pantai yang terkenal dengan pasir putih dan tebing-tebing kapur yang indah.',
                'Kategori Umum' => 5,
                'Kategori Detail' => 'Pantai',
                'Lokasi Umum' => 'Kutuh, Badung',
                'Lokasi Detail' => 'Jalan Pantai Pandawa',
                'Jam Operasional' => '24 Jam',
            ],
            [
                'title' => 'Pantai Petitenget',
                'body' => 'Pantai Petitenget adalah pantai yang terkenal dengan restoran-restoran dan klub pantai yang trendi.',
                'Kategori Umum' => 5,
                'Kategori Detail' => 'Pantai',
                'Lokasi Umum' => 'Seminyak, Badung',
                'Lokasi Detail' => 'Jalan Petitenget',
                'Jam Operasional' => '24 Jam',
            ],
            [
                'title' => 'Pantai Samuh',
                'body' => 'Pantai Samuh adalah pantai yang jarang dikunjungi dengan ombak yang tenang dan pasir putih yang indah.',
                'Kategori Umum' => 5,
                'Kategori Detail' => 'Pantai',
                'Lokasi Umum' => 'Pecatu, Badung',
                'Lokasi Detail' => 'Jalan Samuh',
                'Jam Operasional' => '24 Jam',
            ],
            [
                'title' => 'Pantai Seseh',
                'body' => 'Pantai Seseh adalah pantai yang tenang dengan pasir hitam dan ombak yang cocok untuk berselancar.',
                'Kategori Umum' => 5,
                'Kategori Detail' => 'Pantai',
                'Lokasi Umum' => 'Seseh, Badung',
                'Lokasi Detail' => 'Jalan Pantai Seseh',
                'Jam Operasional' => '24 Jam',
            ],
            [
                'title' => 'Pantai Tanjung Benoa',
                'body' => 'Pantai Tanjung Benoa adalah pantai yang terkenal dengan kegiatan air seperti jet ski, banana boat, dan snorkeling.',
                'Kategori Umum' => 5,
                'Kategori Detail' => 'Pantai',
                'Lokasi Umum' => 'Tanjung Benoa, Badung',
                'Lokasi Detail' => 'Jalan Pantai Tanjung Benoa',
                'Jam Operasional' => '24 Jam',
            ],
            [
                'title' => 'Pantai Tegal Wangi',
                'body' => 'Pantai Tegal Wangi adalah pantai yang terkenal dengan pemandangan matahari terbenam yang spektakuler dan batu-batu karang yang unik.',
                'Kategori Umum' => 5,
                'Kategori Detail' => 'Pantai',
                'Lokasi Umum' => 'Jimbaran, Badung',
                'Lokasi Detail' => 'Jalan Pantai Tegal Wangi',
                'Jam Operasional' => '24 Jam',
            ],
            [
                'title' => 'Pantai Thomas',
                'body' => 'Pantai Thomas adalah pantai yang jarang dikunjungi dengan ombak yang bagus untuk berselancar dan pemandangan alam yang indah.',
                'Kategori Umum' => 5,
                'Kategori Detail' => 'Pantai',
                'Lokasi Umum' => 'Pecatu, Badung',
                'Lokasi Detail' => 'Jalan Pantai Thomas',
                'Jam Operasional' => '24 Jam',
            ],
            ['title' => 'Paralayang Gunung Payung',    'body' => 'Paralayang Gunung Payung adalah tempat untuk melakukan olahraga paralayang dengan pemandangan pantai yang indah.',    'Kategori Umum' => 6,    'Kategori Detail' => 'Paralayang',    'Lokasi Umum' => 'Kutuh, Badung',    'Lokasi Detail' => 'Jalan Gunung Payung',    'Jam Operasional' => '09.00-18.00',],
            ['title' => 'Pelestarian Penyu Deluang Sari',    'body' => 'Pelestarian Penyu Deluang Sari adalah tempat konservasi penyu yang berdedikasi untuk melindungi spesies penyu yang terancam punah.',    'Kategori Umum' => 2,    'Kategori Detail' => 'Pelestarian Alam',    'Lokasi Umum' => 'Serangan, Badung',    'Lokasi Detail' => 'Jalan Pura Penataran Agung',    'Jam Operasional' => '08.00-18.00',],
            ['title' => 'Penglukatan Air Panas Pinikit',    'body' => 'Penglukatan Air Panas Pinikit adalah sumber air panas alami di lereng Gunung Batukaru yang terkenal dengan efek penyembuhan.',    'Kategori Umum' => 1,    'Kategori Detail' => 'Air Panas',    'Lokasi Umum' => 'Belok/Sidan, Badung',    'Lokasi Detail' => 'Jalan Raya Penebel-Sidan',    'Jam Operasional' => '08.00-17.00',],
            ['title' => 'Pura Sada Kapal',    'body' => 'Pura Sada Kapal adalah pura yang terletak di atas tebing dengan pemandangan laut yang indah.',    'Kategori Umum' => 4,    'Kategori Detail' => 'Pura',    'Lokasi Umum' => 'Tibubeneng, Badung',    'Lokasi Detail' => 'Jalan Pantai Batu Mejan',    'Jam Operasional' => '08.00-17.00',],
            ['title' => 'Royal Sporthorse Bali',    'body' => 'Royal Sporthorse Bali adalah pusat berkuda yang menawarkan pelatihan berkuda, trek menunggangi kuda, dan acara berkuda.',    'Kategori Umum' => 6,    'Kategori Detail' => 'Berkuda',    'Lokasi Umum' => 'Kerobokan, Badung',    'Lokasi Detail' => 'Jalan Babakan Madang',    'Jam Operasional' => '09.00-17.00',],
            ['title' => 'Taman Ayun',    'body' => 'Taman Ayun adalah taman dan pura yang terkenal dengan arsitektur Bali yang indah dan taman yang luas.',    'Kategori Umum' => 4,    'Kategori Detail' => 'Taman dan Pura',    'Lokasi Umum' => 'Mengwi, Badung',    'Lokasi Detail' => 'Jalan Raya Mengwi',    'Jam Operasional' => '08.00-18.00',],
            ['title' => 'Taman Bunga Belok',    'body' => 'Taman Bunga Belok/Sidan adalah taman bunga yang indah dengan berbagai macam jenis bunga yang berwarna-warni.',    'Kategori Umum' => 3,    'Kategori Detail' => 'Taman Bunga',    'Lokasi Umum' => 'Sidan, Badung',    'Lokasi Detail' => 'Jalan Raya Penebel-Sidan',    'Jam Operasional' => '08.00-17.00',],
            ['title' => 'Taman Rekreasi Hutan Bakau',    'body' => 'Taman Rekreasi Hutan Bakau Tanjung Benoa adalah taman rekreasi yang memperkenalkan pengunjung pada ekosistem hutan bakau.',    'Kategori Umum' => 3,    'Kategori Detail' => 'Taman Rekreasi',    'Lokasi Umum' => 'Tanjung Benoa, Badung',    'Lokasi Detail' => 'Jalan Tukad Pakerisan',    'Jam Operasional' => '08.00-17.00',],
            ['title' => 'Tanah Wuk',    'body' => 'Tanah Wuk adalah hamparan sawah yang indah dengan pemandangan persawahan yang hijau dan kegiatan pertanian tradisional.',    'Kategori Umum' => 2,    'Kategori Detail' => 'Pertanian',    'Lokasi Umum' => 'Kerambitan, Badung',    'Lokasi Detail' => 'Jalan Raya Kerambitan',    'Jam Operasional' => '24 Jam',],
            ['title' => 'Via Ferrata Malini Agro Park',    'body' => 'Via Ferrata Malini Agro Park adalah taman petualangan dengan rute hiking dan pemandangan pegunungan yang menakjubkan.',    'Kategori Umum' => 6,    'Kategori Detail' => 'Petualangan Alam',    'Lokasi Umum' => 'Petang, Badung',    'Lokasi Detail' => 'Jalan Subak Malini',    'Jam Operasional' => '09.00-17.00',],
            ['title' => 'Water Blow Peninsula Nusa Dua',    'body' => 'Water Blow Peninsula Nusa Dua adalah atraksi alam yang menakjubkan di mana ombak laut menghantam tebing dan menciptakan semburan air.',    'Kategori Umum' => 6,    'Kategori Detail' => 'Atraksi Alam',    'Lokasi Umum' => 'Nusa Dua, Badung',    'Lokasi Detail' => 'Jalan Pantai Nusa Dua',    'Jam Operasional' => '06.00-19.00',],
            ['title' => 'Wisata Agro Plaga',    'body' => 'Wisata Agro Plaga adalah tempat wisata pertanian di pegunungan dengan pemandangan sawah dan kebun-kebun sayuran.',    'Kategori Umum' => 2,    'Kategori Detail' => 'Pertanian',    'Lokasi Umum' => 'Plaga, Badung',    'Lokasi Detail' => 'Desa Plaga',    'Jam Operasional' => '08.00-17.00',],
            [
                'title' => 'Pantai Suluban',
                'body' => 'Pantai indah di Pecatu dengan akses melalui gua, cocok untuk berselancar dan menikmati pemandangan sunset.',
                'Kategori Umum' => 5,
                'Kategori Detail' => 'Pantai',
                'Lokasi Umum' => 'Badung',
                'Lokasi Detail' => 'Suluban, Pecatu',
                'Jam Operasional' => '24 Jam',
            ],
            [
                'title' => 'Watersports di Tanjung Benoa',
                'body' => 'Tempat yang populer untuk aktivitas air seperti jet ski, banana boat, dan parasailing di sepanjang pantai Benoa.',
                'Kategori Umum' => 6,
                'Kategori Detail' => 'Watersports',
                'Lokasi Umum' => 'Badung',
                'Lokasi Detail' => 'Tanjung Benoa',
                'Jam Operasional' => '24 Jam',
            ],
            [
                'title' => 'Makan Malam Sunset',
                'body' => 'Nikmati makan malam romantis sambil menikmati pemandangan sunset yang memukau di salah satu restoran di Badung.',
                'Kategori Umum' => 7,
                'Kategori Detail' => 'Restoran',
                'Lokasi Umum' => 'Badung',
                'Lokasi Detail' => '-',
                'Jam Operasional' => '24 Jam',
            ],
            [
                'title' => 'Jalan Legian',
                'body' => 'Jalan terkenal di Badung dengan beragam toko, restoran, dan tempat hiburan yang ramai di malam hari.',
                'Kategori Umum' => 3,
                'Kategori Detail' => 'Jalan',
                'Lokasi Umum' => 'Badung',
                'Lokasi Detail' => 'Legian',
                'Jam Operasional' => '24 Jam',
            ],
            [
                'title' => 'Beachwalk Mall',
                'body' => 'Mall modern di Kuta yang menawarkan pusat perbelanjaan, restoran, bioskop, dan hiburan keluarga.',
                'Kategori Umum' => 3,
                'Kategori Detail' => 'Mall',
                'Lokasi Umum' => 'Badung',
                'Lokasi Detail' => 'Kuta',
                'Jam Operasional' => '24 Jam',
            ],
            [
                'title' => 'Pura Tanah Lot',
                'body' => 'Pura ikonik di atas batu karang di tepi laut, menawarkan pemandangan matahari terbenam yang spektakuler.',
                'Kategori Umum' => 4,
                'Kategori Detail' => 'Pura',
                'Lokasi Umum' => 'Badung',
                'Lokasi Detail' => 'Beraban, Kediri',
                'Jam Operasional' => '24 Jam',
            ],
            [
                'title' => 'Jatiluwih Rice Terrace',
                'body' => 'Pemandangan sawah terasering yang menakjubkan dengan latar belakang pegunungan, tempat ideal untuk trekking.',
                'Kategori Umum' => 1,
                'Kategori Detail' => 'Pemandangan',
                'Lokasi Umum' => 'Badung',
                'Lokasi Detail' => 'Jatiluwih',
                'Jam Operasional' => '09.00-18.00',
            ],
            [
                'title' => 'Pantai Kelingking',
                'body' => 'Pantai dengan pemandangan ikonik tebing berbentuk T-Rex di Nusa Penida, sering disebut sebagai "Pantai Dinosaur".',
                'Kategori Umum' => 5,
                'Kategori Detail' => 'Pantai',
                'Lokasi Umum' => 'Badung',
                'Lokasi Detail' => 'Nusa Penida',
                'Jam Operasional' => '08.00-18.00',
            ],
            [
                'title' => 'Crystal Bay',
                'body' => 'Pantai dengan air jernih dan terumbu karang yang indah, tempat yang sempurna untuk snorkeling dan menyelam.',
                'Kategori Umum' => 5,
                'Kategori Detail' => 'Pantai',
                'Lokasi Umum' => 'Badung',
                'Lokasi Detail' => 'Nusa Penida',
                'Jam Operasional' => '08.00-17.00',
            ],
            [
                'title' => 'Pantai Atuh',
                'body' => 'Pantai yang menakjubkan dengan air biru dan karang-karang eksotis di Nusa Penida, populer untuk foto-foto.',
                'Kategori Umum' => 5,
                'Kategori Detail' => 'Pantai',
                'Lokasi Umum' => 'Badung',
                'Lokasi Detail' => 'Nusa Penida',
                'Jam Operasional' => '08.00-17.00',
            ],
            [
                'title' => 'Pulau Seribu',
                'body' => 'Pulau kecil di Serangan dengan pantai berpasir putih dan air jernih, cocok untuk snorkeling dan piknik.',
                'Kategori Umum' => 1,
                'Kategori Detail' => 'Pulau',
                'Lokasi Umum' => 'Badung',
                'Lokasi Detail' => 'Serangan',
                'Jam Operasional' => '09.00-17.00',
            ],
            [
                'title' => 'Pantai Sanur',
                'body' => 'Pantai yang tenang dengan sunrise indah, penuh dengan restoran, hotel, dan aktivitas air di sepanjang pantai.',
                'Kategori Umum' => 5,
                'Kategori Detail' => 'Pantai',
                'Lokasi Umum' => 'Badung',
                'Lokasi Detail' => 'Sanur',
                'Jam Operasional' => '08.00-18.00',
            ],
            [
                'title' => 'Pantai Uluwatu',
                'body' => 'Pantai yang terkenal dengan ombak besar, juga terdapat Pura Uluwatu yang menawarkan pertunjukan tari kecak.',
                'Kategori Umum' => 5,
                'Kategori Detail' => 'Pantai',
                'Lokasi Umum' => 'Badung',
                'Lokasi Detail' => 'Uluwatu',
                'Jam Operasional' => '08.00-17.00',
            ],
            [
                'title' => 'Pantai Nusa Dua',
                'body' => 'Pantai yang terkenal dengan pasir putih dan fasilitas resor mewah, tempat yang sempurna untuk bersantai dan berenang.',
                'Kategori Umum' => 5,
                'Kategori Detail' => 'Pantai',
                'Lokasi Umum' => 'Badung',
                'Lokasi Detail' => 'Nusa Dua',
                'Jam Operasional' => '08.00-17.00',
            ],
            [
                'title' => 'Bar dan Klub',
                'body' => 'Tempat hiburan malam yang beragam di Badung, mulai dari bar tepi pantai hingga klub malam dengan musik live.',
                'Kategori Umum' => 3,
                'Kategori Detail' => 'Bar dan Klub',
                'Lokasi Umum' => 'Badung',
                'Lokasi Detail' => '-',
                'Jam Operasional' => '24 Jam',
            ],
            [
                'title' => 'Belajar Surfing',
                'body' => 'Pelajari seni berselancar di salah satu sekolah selancar yang terkenal di Badung dan rasakan sensasi berselancar.',
                'Kategori Umum' => 6,
                'Kategori Detail' => 'Surfing',
                'Lokasi Umum' => 'Badung',
                'Lokasi Detail' => '',
                'Jam Operasional' => '06.00-19.00',
            ],
            [
                'title' => "Angel's Billabong",
                'body' => 'Kolam alami dengan air hijau jernih di Nusa Penida, tempat yang sempurna untuk berenang dan menikmati keindahan.',
                'Kategori Umum' => 1,
                'Kategori Detail' => 'Alam',
                'Lokasi Umum' => 'Badung',
                'Lokasi Detail' => 'Nusa Penida',
                'Jam Operasional' => '08.00-17.00',
            ],
            [
                'title' => 'Broken Beach',
                'body' => 'Teluk alami dengan pemandangan yang dramatis di Nusa Penida, diapit oleh tebing-tebing yang spektakuler.',
                'Kategori Umum' => 5,
                'Kategori Detail' => 'Pantai',
                'Lokasi Umum' => 'Badung',
                'Lokasi Detail' => 'Nusa Penida',
                'Jam Operasional' => '24 Jam',
            ],
            [
                'title' => 'Pantai Balangan',
                'body' => 'Pantai yang tenang di Bukit Peninsula dengan ombak yang bagus untuk berselancar dan pemandangan matahari terbenam.',
                'Kategori Umum' => 5,
                'Kategori Detail' => 'Pantai',
                'Lokasi Umum' => 'Badung',
                'Lokasi Detail' => 'Balangan',
                'Jam Operasional' => '24 Jam',
            ],
            [
                'title' => 'Pantai Green Bowl',
                'body' => 'Pantai tersembunyi di Badung dengan akses melalui tangga, menawarkan keindahan alam yang masih alami.',
                'Kategori Umum' => 5,
                'Kategori Detail' => 'Pantai',
                'Lokasi Umum' => 'Badung',
                'Lokasi Detail' => 'Ungasan',
                'Jam Operasional' => '24 Jam',
            ],
            [
                'title' => 'Pantai Kuta',
                'body' => 'Pantai yang terkenal di Badung dengan ombak yang bagus untuk berselancar, juga terdapat berbagai tempat hiburan.',
                'Kategori Umum' => 5,
                'Kategori Detail' => 'Pantai',
                'Lokasi Umum' => 'Badung',
                'Lokasi Detail' => 'Kuta',
                'Jam Operasional' => '24 Jam',
            ],
            [
                'title' => 'Waterbom Bali',
                'body' => 'Taman air terbesar di Badung dengan beragam wahana perosotan, kolam renang, dan area bermain air untuk keluarga.',
                'Kategori Umum' => 3,
                'Kategori Detail' => 'Taman Hiburan',
                'Lokasi Umum' => 'Badung',
                'Lokasi Detail' => 'Kuta',
                'Jam Operasional' => '24 Jam',
            ],
            [
                'title' => 'Pulau Penida',
                'body' => 'Pulau yang indah dan eksotis di sebelah tenggara Bali, terkenal dengan pantai-pantai yang memukau dan snorkeling.',
                'Kategori Umum' => 1,
                'Kategori Detail' => 'Pantai',
                'Lokasi Umum' => 'Badung',
                'Lokasi Detail' => 'Nusa Penida',
                'Jam Operasional' => '09.00-18.00',
            ],
            [
                'title' => 'Jalan Oberoi',
                'body' => 'Jalan di Seminyak yang terkenal dengan bar, restoran, dan butik-boutik yang mewah, menjadi pusat gaya hidup Bali.',
                'Kategori Umum' => 3,
                'Kategori Detail' => 'Jalan',
                'Lokasi Umum' => 'Badung',
                'Lokasi Detail' => 'Seminyak',
                'Jam Operasional' => '08.00-18.00',
            ],
            [
                'title' => 'Seminyak Square',
                'body' => 'Pusat perbelanjaan dan hiburan di Seminyak dengan berbagai toko, restoran, dan pertunjukan seni.',
                'Kategori Umum' => 3,
                'Kategori Detail' => 'Pusat Perbelanjaan',
                'Lokasi Umum' => 'Badung',
                'Lokasi Detail' => 'Seminyak',
                'Jam Operasional' => '08.00-17.00',
            ],
            [
                'title' => 'Makan Malam Seafood',
                'body' => 'Nikmati hidangan seafood segar yang lezat di salah satu restoran di Badung, terutama di daerah pantai.',
                'Kategori Umum' => 7,
                'Kategori Detail' => 'Restoran',
                'Lokasi Umum' => 'Badung',
                'Lokasi Detail' => '',
                'Jam Operasional' => '08.00-17.00',
            ],
            [
                'title' => 'Pantai Batu Bolong',
                'body' => 'Pantai yang populer di Canggu dengan suasana yang santai, cocok untuk berselancar, berjemur, dan menikmati sunset.',
                'Kategori Umum' => 5,
                'Kategori Detail' => 'Pantai',
                'Lokasi Umum' => 'Badung',
                'Lokasi Detail' => 'Canggu',
                'Jam Operasional' => '09.00-17.00',
            ],
            [
                'title' => "Finn's Beach Club",
                'body' => 'Tempat yang populer di Canggu untuk bersantai di tepi pantai dengan kolam renang, bar, dan pemandangan laut.',
                'Kategori Umum' => 3,
                'Kategori Detail' => 'Beach Club',
                'Lokasi Umum' => 'Badung',
                'Lokasi Detail' => 'Canggu',
                'Jam Operasional' => '08.00-18.00',
            ],
            [
                'title' => 'Watersports di Nusa Dua',
                'body' => 'Nikmati beragam aktivitas air seperti snorkeling, jet ski, dan flyboarding di perairan Nusa Dua yang indah.',
                'Kategori Umum' => 3,
                'Kategori Detail' => 'Watersports',
                'Lokasi Umum' => 'Badung',
                'Lokasi Detail' => 'Nusa Dua',
                'Jam Operasional' => '08.00-17.00',
            ],
            [
                'title' => 'Pura Taman Ayun',
                'body' => 'Pura yang terkenal di Mengwi dengan taman yang indah dan arsitektur tradisional Bali yang megah.',
                'Kategori Umum' => 4,
                'Kategori Detail' => 'Pura',
                'Lokasi Umum' => 'Badung',
                'Lokasi Detail' => 'Mengwi',
                'Jam Operasional' => '08.00-17.00',
            ],
            [
                'title' => 'Pura Mengwi',
                'body' => 'Pura bersejarah di Mengwi dengan arsitektur yang menakjubkan, menjadi tempat penting dalam budaya Bali.',
                'Kategori Umum' => 4,
                'Kategori Detail' => 'Pura',
                'Lokasi Umum' => 'Badung',
                'Lokasi Detail' => 'Mengwi',
                'Jam Operasional' => '24 Jam',
            ],
            // new
            ['title' => 'Pantai Seminyak',    'body' => 'Pantai dengan pasir putih yang indah di Seminyak, Bali. Terkenal dengan ombaknya yang cocok untuk berselancar.',    'Kategori Umum' => 5,    'Kategori Detail' => 'Pantai',    'Lokasi Umum' => 'Badung',    'Lokasi Detail' => 'Seminyak',    'Jam Operasional' => '24 Jam',],
            ['title' => 'Pura Besakih',    'body' => 'Pura terbesar dan paling suci di Bali, terletak di Desa Besakih, Kabupaten Karangasem. Dikenal sebagai "Pura Agung Besakih" atau "Pura Besakih Mother Temple".',    'Kategori Umum' => 4,    'Kategori Detail' => 'Pura',    'Lokasi Umum' => 'Karangasem',    'Lokasi Detail' => 'Desa Besakih',    'Jam Operasional' => '08:00 - 17:00',]
        ];

        foreach ($data as $post) {
            $slug = Str::slug($post['title']);
            $judul = ($post['title']);
            $imagePath = "/post-image/{$judul}.jpg";

            // Simpan gambar ke storage
            Storage::copy("public/storage/post-image/{$judul}.jpg", "public/{$imagePath}");

            Post::create([
                'category_id' => $post['Kategori Umum'],
                'user_id' => rand(1, 4),
                'title' => $post['title'],
                'body' => $post['body'],
                'excerpt' => Str::words($post['body'], 200),
                'slug' => $slug,
                'image' => $imagePath,
                'category_detail' => $post['Kategori Detail'],
                'lokasi' => $post['Lokasi Umum'],
                'lokasi_detail' => $post['Lokasi Detail'],
                'jam' => $post['Jam Operasional'],
            ]);
        }

        $dataAdditional = [
            ['paketwisata_id' => 1, 'post_id' => 10],
            ['paketwisata_id' => 2, 'post_id' => 45],
            ['paketwisata_id' => 3, 'post_id' => 18],
            ['paketwisata_id' => 4, 'post_id' => 47],
            ['paketwisata_id' => 5, 'post_id' => 16],
            ['paketwisata_id' => 6, 'post_id' => 10],
            ['paketwisata_id' => 7, 'post_id' => 73],
            ['paketwisata_id' => 8, 'post_id' => 52],
            ['paketwisata_id' => 9, 'post_id' => 64],
            ['paketwisata_id' => 10, 'post_id' => 64],
            ['paketwisata_id' => 11, 'post_id' => 64],
            ['paketwisata_id' => 12, 'post_id' => 57],
            ['paketwisata_id' => 13, 'post_id' => 18],
            ['paketwisata_id' => 14, 'post_id' => 57],
            ['paketwisata_id' => 15, 'post_id' => 75],
            ['paketwisata_id' => 16, 'post_id' => 16],
            ['paketwisata_id' => 17, 'post_id' => 52],
            ['paketwisata_id' => 18, 'post_id' => 49],
            ['paketwisata_id' => 19, 'post_id' => 64],
            ['paketwisata_id' => 20, 'post_id' => 64],
            ['paketwisata_id' => 21, 'post_id' => 52],
            ['paketwisata_id' => 22, 'post_id' => 49],
            ['paketwisata_id' => 23, 'post_id' => 67],
            ['paketwisata_id' => 24, 'post_id' => 18],
            ['paketwisata_id' => 25, 'post_id' => 70],
            ['paketwisata_id' => 26, 'post_id' => 72],
            ['paketwisata_id' => 27, 'post_id' => 73],
            ['paketwisata_id' => 1, 'post_id' => 44],
            ['paketwisata_id' => 3, 'post_id' => 46],
            ['paketwisata_id' => 4, 'post_id' => 48],
            ['paketwisata_id' => 5, 'post_id' => 49],
            ['paketwisata_id' => 6, 'post_id' => 25],
            ['paketwisata_id' => 7, 'post_id' => 50],
            ['paketwisata_id' => 8, 'post_id' => 52],
            ['paketwisata_id' => 9, 'post_id' => 53],
            ['paketwisata_id' => 10, 'post_id' => 55],
            ['paketwisata_id' => 11, 'post_id' => 16],
            ['paketwisata_id' => 12, 'post_id' => 10],
            ['paketwisata_id' => 13, 'post_id' => 75],
            ['paketwisata_id' => 14, 'post_id' => 42],
            ['paketwisata_id' => 15, 'post_id' => 58],
            ['paketwisata_id' => 16, 'post_id' => 59],
            ['paketwisata_id' => 17, 'post_id' => 60],
            ['paketwisata_id' => 18, 'post_id' => 10],
            ['paketwisata_id' => 19, 'post_id' => 62],
            ['paketwisata_id' => 20, 'post_id' => 65],
            ['paketwisata_id' => 21, 'post_id' => 66],
            ['paketwisata_id' => 22, 'post_id' => 73],
            ['paketwisata_id' => 23, 'post_id' => 68],
            ['paketwisata_id' => 24, 'post_id' => 69],
            ['paketwisata_id' => 25, 'post_id' => 71],
            ['paketwisata_id' => 8, 'post_id' => 61],
            ['paketwisata_id' => 9, 'post_id' => 54],
            ['paketwisata_id' => 10, 'post_id' => 76],
            ['paketwisata_id' => 17, 'post_id' => 61],
            ['paketwisata_id' => 19, 'post_id' => 63],
            ['paketwisata_id' => 10, 'post_id' => 57],
            ['paketwisata_id' => 10, 'post_id' => 10],
            ['paketwisata_id' => 19, 'post_id' => 10],
        ];

        foreach ($dataAdditional as $post) {
            Paketwisata_pariwisata::create([
                'paketwisata_id' => $post['paketwisata_id'],
                'post_id' => $post['post_id']
            ]);
        }
    }
}
