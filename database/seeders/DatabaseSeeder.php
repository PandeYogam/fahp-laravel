<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use App\Models\HasilDss;
use App\Models\PaketWisata;
use App\Models\Subkriteria;
use App\Models\KriteriaBobot;
use Illuminate\Database\Seeder;
use App\Models\HasilBobotVektor;
use App\Models\HasilPerangkingan;

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
        Subkriteria::create([
            'nama' => 'budget',
            'rentang_min' => 0,
            'rentang_max' => 500000,
            'bobot' => 3,
        ]);
        Subkriteria::create([
            'nama' => 'budget',
            'rentang_min' => 500000,
            'rentang_max' => 1000000,
            'bobot' => 6,
        ]);

        // Kriteria
        KriteriaBobot::create([
            'kriteria_1' => 5,
            'kriteria_2' => 2,
            'kriteria_3' => 8,
            'kriteria_4' => 9,
            'kriteria_5' => 4,
        ]);

        // HasilDss
        HasilDss::create([
            'user_id' => 1,
            'kriteria_bobot_id' => 1,
            'hasil_bobot_vektor_id' => 1,
            'hasil_perangkingan_id' => 1,
        ]);


        PaketWisata::create([
            'nama' => 'Paket Uluwatu Exploration',
            'slug' => 'paket-uluwatu-exploration',
            'harga' => 300000,
            'popularitas' => 8,
            'rating' => 9,
            'durasi' => 2,
            'deskripsi' => 'Paket wisata A',
            'jumlah_wisata_dikunjungi' => 5,

            'harga_bobot' => 1,
            'popularitas_bobot' => 5,
            'rating_bobot' => 8,
            'durasi_bobot' => 2,
            'jumlah_wisata_bobot' => 7,
        ]);

        PaketWisata::create([

            'nama' => 'Paket Tanjung Benoa Watersports',
            'slug' => 'paket-tanjung-benoa-watersports',
            'durasi' => 0.5,
            'jumlah_wisata_dikunjungi' => 1,
            'popularitas' => 15,
            'rating' => 7,
            'harga' => 500000,
            'harga_bobot' => 6,
            'popularitas_bobot' => 6,
            'rating_bobot' => 3,
            'durasi_bobot' => 6,
            'jumlah_wisata_bobot' => 9

        ]);


        paketwisata::create(
            [
                'nama' => 'Paket Jimbaran Sunset Dinner',
                'slug' => 'paket-jimbaran-sunset-dinner',
                'durasi' => 0.5,
                'jumlah_wisata_dikunjungi' => 2,
                'popularitas' => 25,
                'rating' => 9,
                'harga' => 400000,
                'harga_bobot' => 3,
                'popularitas_bobot' => 9,
                'rating_bobot' => 6, 'durasi_bobot' => 9, 'jumlah_wisata_bobot' => 9
            ]
        );

        paketwisata::create(
            [
                'nama' => 'Paket Legian Shopping',
                'slug' => 'paket-legian-shopping',
                'durasi' => 0.5, 'jumlah_wisata_dikunjungi' => 2, 'popularitas' => 30, 'rating' => 8, 'harga' => 300000, 'harga_bobot' => 3, 'popularitas_bobot' => 9, 'rating_bobot' => 6, 'durasi_bobot' => 9, 'jumlah_wisata_bobot' => 6
            ]
        );

        paketwisata::create(
            [
                'nama' => 'Paket Tanah Lot-Bedugul', 'slug' => 'paket-tanah-lot-bedugul', 'durasi' => 1, 'jumlah_wisata_dikunjungi' => 2, 'popularitas' => 20, 'rating' => 9, 'harga' => 850000, 'harga_bobot' => 9, 'popularitas_bobot' => 9, 'rating_bobot' => 6, 'durasi_bobot' => 9, 'jumlah_wisata_bobot' => 6
            ]
        );

        paketwisata::create(
            [
                'nama' => 'Paket Kintamani-Besakih', 'slug' => 'paket-kintamani-besakih', 'durasi' => 1, 'jumlah_wisata_dikunjungi' => 2, 'popularitas' => 15, 'rating' => 8, 'harga' => 900000, 'harga_bobot' => 9, 'popularitas_bobot' => 9, 'rating_bobot' => 3, 'durasi_bobot' => 6, 'jumlah_wisata_bobot' => 6
            ]
        );

        paketwisata::create(
            [
                'nama' => 'Paket Canggu-Tanah Lot', 'slug' => 'paket-canggu-tanah-lot', 'durasi' => 1, 'jumlah_wisata_dikunjungi' => 2, 'popularitas' => 10, 'rating' => 7, 'harga' => 600000, 'harga_bobot' => 6, 'popularitas_bobot' => 6, 'rating_bobot' => 3, 'durasi_bobot' => 6, 'jumlah_wisata_bobot' => 6
            ]
        );

        paketwisata::create(
            [
                'nama' => 'Paket Uluwatu-Pandawa', 'slug' => 'paket-uluwatu-pandawa', 'durasi' => 0.5, 'jumlah_wisata_dikunjungi' => 2, 'popularitas' => 12, 'rating' => 8, 'harga' => 500000, 'harga_bobot' => 6, 'popularitas_bobot' => 6, 'rating_bobot' => 6, 'durasi_bobot' => 9, 'jumlah_wisata_bobot' => 9
            ]
        );

        paketwisata::create(
            [
                'nama' => 'Paket Mengwi-Jatiluwih', 'slug' => 'paket-mengwi-jatiluwih', 'durasi' => '1', 'jumlah_wisata_dikunjungi' => 2, 'popularitas' => 8, 'rating' => 9, 'harga' => 600000, 'harga_bobot' => 6, 'popularitas_bobot' => 9, 'rating_bobot' => 6, 'durasi_bobot' => 9, 'jumlah_wisata_bobot' => 3
            ]
        );

        paketwisata::create(
            [
                'nama' => 'Paket Nusa Penida-Crystal Bay', 'slug' => 'paket-nusa-penida-crystal-bay', 'durasi' => '1', 'jumlah_wisata_dikunjungi' => 3, 'popularitas' => 5, 'rating' => 9, 'harga' => 1300000, 'harga_bobot' => 9, 'popularitas_bobot' => 6, 'rating_bobot' => 9, 'durasi_bobot' => 9, 'jumlah_wisata_bobot' => 3
            ]
        );

        paketwisata::create(
            [
                'nama' => 'Paket Seminyak-Ubud', 'slug' => 'paket-seminyak-ubud', 'durasi' => '1', 'jumlah_wisata_dikunjungi' => 2, 'popularitas' => 7, 'rating' => 8, 'harga' => 500000, 'harga_bobot' => 6, 'popularitas_bobot' => 6, 'rating_bobot' => 6, 'durasi_bobot' => 9, 'jumlah_wisata_bobot' => 3
            ]
        );

        paketwisata::create(
            [
                'nama' => 'Paket Bedugul-Lovina', 'slug' => 'paket-bedugul-lovina', 'durasi' => '1', 'jumlah_wisata_dikunjungi' => 2, 'popularitas' => 4, 'rating' => 7, 'harga' => 1200000, 'harga_bobot' => 9, 'popularitas_bobot' => 6, 'rating_bobot' => 3, 'durasi_bobot' => 6, 'jumlah_wisata_bobot' => 3
            ]
        );

        paketwisata::create(
            [
                'nama' => 'Paket Kuta-Nusa Penida', 'slug' => 'paket-kuta-nusa-penida', 'durasi' => '1', 'jumlah_wisata_dikunjungi' => 3, 'popularitas' => 3, 'rating' => 8, 'harga' => 1000000, 'harga_bobot' => 6, 'popularitas_bobot' => 6, 'rating_bobot' => 9, 'durasi_bobot' => 9, 'jumlah_wisata_bobot' => 3
            ]
        );

        paketwisata::create(
            [
                'nama' => 'Paket Badung Round Trip', 'slug' => 'paket-badung-round-trip', 'durasi' => 0.5, 'jumlah_wisata_dikunjungi' => 4, 'popularitas' => 2, 'rating' => 9, 'harga' => 450000, 'harga_bobot' => 6, 'popularitas_bobot' => 6, 'rating_bobot' => 9, 'durasi_bobot' => 9, 'jumlah_wisata_bobot' => 9
            ]
        );

        paketwisata::create(
            [
                'nama' => 'Paket Explore Badung', 'slug' => 'paket-explore-badung', 'durasi' => 0.5, 'jumlah_wisata_dikunjungi' => 5, 'popularitas' => 1, 'rating' => 8, 'harga' => 450000, 'harga_bobot' => 6, 'popularitas_bobot' => 6, 'rating_bobot' => 6, 'durasi_bobot' => 9, 'jumlah_wisata_bobot' => 6
            ]
        );

        paketwisata::create(
            [
                'nama' => 'Paket Kuta-Canggu', 'slug' => 'paket-kuta-canggu', 'durasi' => 0.5, 'jumlah_wisata_dikunjungi' => 3, 'popularitas' => 45, 'rating' => 8, 'harga' => 400000, 'harga_bobot' => 3, 'popularitas_bobot' => 9, 'rating_bobot' => 6, 'durasi_bobot' => 9, 'jumlah_wisata_bobot' => 9
            ]
        );

        paketwisata::create(
            [
                'nama' => 'Paket Ubud-Tegalalang', 'slug' => 'paket-ubud-tegalalang', 'durasi' => '1', 'jumlah_wisata_dikunjungi' => 2, 'popularitas' => 30, 'rating' => 9, 'harga' => 500000, 'harga_bobot' => 6, 'popularitas_bobot' => 6, 'rating_bobot' => 9, 'durasi_bobot' => 9, 'jumlah_wisata_bobot' => 3
            ]
        );

        paketwisata::create(
            [
                'nama' => 'Paket Nusa Dua-Uluwatu', 'slug' => 'paket-nusa-dua-uluwatu', 'durasi' => 0.5, 'jumlah_wisata_dikunjungi' => 2, 'popularitas' => 25, 'rating' => 7, 'harga' => 700000, 'harga_bobot' => 9, 'popularitas_bobot' => 9, 'rating_bobot' => 6, 'durasi_bobot' => 9, 'jumlah_wisata_bobot' => 9
            ]
        );

        paketwisata::create(
            [
                'nama' => 'Paket Jimbaran-Seminyak', 'slug' => 'paket-jimbaran-seminyak', 'durasi' => '1', 'jumlah_wisata_dikunjungi' => 2, 'popularitas' => 35, 'rating' => 8, 'harga' => 700000, 'harga_bobot' => 9, 'popularitas_bobot' => 9, 'rating_bobot' => 6, 'durasi_bobot' => 9, 'jumlah_wisata_bobot' => 3
            ]
        );

        paketwisata::create(
            [
                'nama' => 'Paket Ubud Artistic Journey', 'slug' => 'paket-ubud-artistic-journey', 'durasi' => '1', 'jumlah_wisata_dikunjungi' => 2, 'popularitas' => 40, 'rating' => 9, 'harga' => 700000, 'harga_bobot' => 9, 'popularitas_bobot' => 9, 'rating_bobot' => 9, 'durasi_bobot' => 9, 'jumlah_wisata_bobot' => 3
            ]
        );

        paketwisata::create(
            [
                'nama' => 'Paket Nusa Dua Waterblow', 'slug' => 'paket-nusa-dua-waterblow', 'durasi' => 0.5, 'jumlah_wisata_dikunjungi' => 2, 'popularitas' => 35, 'rating' => 8, 'harga' => 400000, 'harga_bobot' => 3, 'popularitas_bobot' => 9, 'rating_bobot' => 6, 'durasi_bobot' => 9, 'jumlah_wisata_bobot' => 9
            ]
        );

        paketwisata::create(
            [
                'nama' => 'Paket Seminyak Nightlife', 'slug' => 'paket-seminyak-nightlife', 'durasi' => 0.5, 'jumlah_wisata_dikunjungi' => 2, 'popularitas' => 50, 'rating' => 9, 'harga' => 500000, 'harga_bobot' => 6, 'popularitas_bobot' => 6, 'rating_bobot' => 9, 'durasi_bobot' => 9, 'jumlah_wisata_bobot' => 9
            ]
        );

        paketwisata::create(
            [
                'nama' => 'Paket Bedugul Nature Escape', 'slug' => 'paket-bedugul-nature-escape', 'durasi' => '1', 'jumlah_wisata_dikunjungi' => 2, 'popularitas' => 15, 'rating' => 8, 'harga' => 900000, 'harga_bobot' => 9, 'popularitas_bobot' => 9, 'rating_bobot' => 6, 'durasi_bobot' => 9, 'jumlah_wisata_bobot' => 3
            ]
        );

        paketwisata::create(
            [
                'nama' => 'Paket Nusa Penida Adventure', 'slug' => 'paket-nusa-penida-adventure', 'durasi' => '1', 'jumlah_wisata_dikunjungi' => 3, 'popularitas' => 10, 'rating' => 7, 'harga' => 1200000, 'harga_bobot' => 9, 'popularitas_bobot' => 6, 'rating_bobot' => 3, 'durasi_bobot' => 6, 'jumlah_wisata_bobot' => 3
            ]
        );

        paketwisata::create(
            [
                'nama' => 'Paket Kuta Beach Experience',
                'slug' => 'paket-kuta-beach-experience',
                'durasi' => 0.5,
                'jumlah_wisata_dikunjungi' => 2,
                'popularitas' => 20, 'rating' => 9,
                'harga' => 400000, 'harga_bobot' => 3, 'popularitas_bobot' => 9, 'rating_bobot' => 9, 'durasi_bobot' => 9, 'jumlah_wisata_bobot' => 9
            ]
        );

        User::create([
            'name' => 'Sandhika Galih',
            'username' => 'sandika',
            'email' => 'sandhika@gmail.com',
            'password' => bcrypt('12345'),
            'is_admin' => 1
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

        // Category
        Category::create([
            'name' => 'Seni Cipta',
            'slug' => 'seni-cipta',
            'body' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quod, optio!'
        ]);
        Category::create([
            'name' => 'Hotel',
            'slug' => 'hotel',
            'body' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quod, optio!',
        ]);
        Category::create([
            'name' => 'Pantai',
            'slug' => 'pantai',
            'body' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quod, optio!',
        ]);
        Category::create([
            'name' => 'Makanan & Minuman',
            'slug' => 'makanan-minuman',
            'body' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quod, optio!',
        ]);

        // Post
        Post::factory(20)->create();
    }
}
