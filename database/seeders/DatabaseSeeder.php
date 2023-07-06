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


        $paketwisata = [
            [
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
            ],

            [
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
            ],
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
            ],


            [
                'nama' => 'Paket Legian Shopping',
                'user_id' => 2,
                'slug' => 'paket-legian-shopping',
                'durasi' => 0.5, 'jumlah_wisata_dikunjungi' => 2, 'popularitas' => 30, 'rating' => 8, 'harga' => 300000, 'harga_bobot' => 3, 'popularitas_bobot' => 9, 'rating_bobot' => 6, 'durasi_bobot' => 9, 'jumlah_wisata_bobot' => 6
            ],


            [
                'nama' => 'Paket Tanah Lot-Bedugul',
                'user_id' => 2,
                'slug' => 'paket-tanah-lot-bedugul', 'durasi' => 1, 'jumlah_wisata_dikunjungi' => 2, 'popularitas' => 20, 'rating' => 9, 'harga' => 850000, 'harga_bobot' => 9, 'popularitas_bobot' => 9, 'rating_bobot' => 6, 'durasi_bobot' => 9, 'jumlah_wisata_bobot' => 6
            ],


            [
                'nama' => 'Paket Kintamani-Besakih', 'slug' => 'paket-kintamani-besakih', 'durasi' => 1, 'jumlah_wisata_dikunjungi' => 2, 'popularitas' => 15, 'rating' => 8, 'harga' => 900000, 'harga_bobot' => 9, 'popularitas_bobot' => 9, 'rating_bobot' => 3, 'durasi_bobot' => 6, 'jumlah_wisata_bobot' => 6
            ],


            [
                'nama' => 'Paket Canggu-Tanah Lot', 'slug' => 'paket-canggu-tanah-lot', 'durasi' => 1, 'jumlah_wisata_dikunjungi' => 2, 'popularitas' => 10, 'rating' => 7, 'harga' => 600000, 'harga_bobot' => 6, 'popularitas_bobot' => 6, 'rating_bobot' => 3, 'durasi_bobot' => 6, 'jumlah_wisata_bobot' => 6
            ],


            [
                'nama' => 'Paket Uluwatu-Pandawa', 'slug' => 'paket-uluwatu-pandawa', 'durasi' => 0.5, 'jumlah_wisata_dikunjungi' => 2, 'popularitas' => 12, 'rating' => 8, 'harga' => 500000, 'harga_bobot' => 6, 'popularitas_bobot' => 6, 'rating_bobot' => 6, 'durasi_bobot' => 9, 'jumlah_wisata_bobot' => 9
            ],


            [
                'nama' => 'Paket Mengwi-Jatiluwih', 'slug' => 'paket-mengwi-jatiluwih', 'durasi' => '1', 'jumlah_wisata_dikunjungi' => 2, 'popularitas' => 8, 'rating' => 9, 'harga' => 600000, 'harga_bobot' => 6, 'popularitas_bobot' => 9, 'rating_bobot' => 6, 'durasi_bobot' => 9, 'jumlah_wisata_bobot' => 3
            ],


            [
                'nama' => 'Paket Nusa Penida-Crystal Bay', 'slug' => 'paket-nusa-penida-crystal-bay', 'durasi' => '1', 'jumlah_wisata_dikunjungi' => 3, 'popularitas' => 5, 'rating' => 9, 'harga' => 1300000, 'harga_bobot' => 9, 'popularitas_bobot' => 6, 'rating_bobot' => 9, 'durasi_bobot' => 9, 'jumlah_wisata_bobot' => 3
            ],


            [
                'nama' => 'Paket Seminyak-Ubud', 'slug' => 'paket-seminyak-ubud', 'durasi' => '1', 'jumlah_wisata_dikunjungi' => 2, 'popularitas' => 7, 'rating' => 8, 'harga' => 500000, 'harga_bobot' => 6, 'popularitas_bobot' => 6, 'rating_bobot' => 6, 'durasi_bobot' => 9, 'jumlah_wisata_bobot' => 3
            ],


            [
                'nama' => 'Paket Bedugul-Lovina', 'slug' => 'paket-bedugul-lovina', 'durasi' => '1', 'jumlah_wisata_dikunjungi' => 2, 'popularitas' => 4, 'rating' => 7, 'harga' => 1200000, 'harga_bobot' => 9, 'popularitas_bobot' => 6, 'rating_bobot' => 3, 'durasi_bobot' => 6, 'jumlah_wisata_bobot' => 3
            ],


            [
                'nama' => 'Paket Kuta-Nusa Penida', 'slug' => 'paket-kuta-nusa-penida', 'durasi' => '1', 'jumlah_wisata_dikunjungi' => 3, 'popularitas' => 3, 'rating' => 8, 'harga' => 1000000, 'harga_bobot' => 6, 'popularitas_bobot' => 6, 'rating_bobot' => 9, 'durasi_bobot' => 9, 'jumlah_wisata_bobot' => 3
            ],


            [
                'nama' => 'Paket Badung Round Trip', 'slug' => 'paket-badung-round-trip', 'durasi' => 0.5, 'jumlah_wisata_dikunjungi' => 4, 'popularitas' => 2, 'rating' => 9, 'harga' => 450000, 'harga_bobot' => 6, 'popularitas_bobot' => 6, 'rating_bobot' => 9, 'durasi_bobot' => 9, 'jumlah_wisata_bobot' => 9
            ],


            [
                'nama' => 'Paket Explore Badung', 'slug' => 'paket-explore-badung', 'durasi' => 0.5, 'jumlah_wisata_dikunjungi' => 5, 'popularitas' => 1, 'rating' => 8, 'harga' => 450000, 'harga_bobot' => 6, 'popularitas_bobot' => 6, 'rating_bobot' => 6, 'durasi_bobot' => 9, 'jumlah_wisata_bobot' => 6
            ],


            [
                'nama' => 'Paket Kuta-Canggu', 'slug' => 'paket-kuta-canggu', 'durasi' => 0.5, 'jumlah_wisata_dikunjungi' => 3, 'popularitas' => 45, 'rating' => 8, 'harga' => 400000, 'harga_bobot' => 3, 'popularitas_bobot' => 9, 'rating_bobot' => 6, 'durasi_bobot' => 9, 'jumlah_wisata_bobot' => 9
            ],


            [
                'nama' => 'Paket Ubud-Tegalalang', 'slug' => 'paket-ubud-tegalalang', 'durasi' => '1', 'jumlah_wisata_dikunjungi' => 2, 'popularitas' => 30, 'rating' => 9, 'harga' => 500000, 'harga_bobot' => 6, 'popularitas_bobot' => 6, 'rating_bobot' => 9, 'durasi_bobot' => 9, 'jumlah_wisata_bobot' => 3
            ],


            [
                'nama' => 'Paket Nusa Dua-Uluwatu', 'slug' => 'paket-nusa-dua-uluwatu', 'durasi' => 0.5, 'jumlah_wisata_dikunjungi' => 2, 'popularitas' => 25, 'rating' => 7, 'harga' => 700000, 'harga_bobot' => 9, 'popularitas_bobot' => 9, 'rating_bobot' => 6, 'durasi_bobot' => 9, 'jumlah_wisata_bobot' => 9
            ],


            [
                'nama' => 'Paket Jimbaran-Seminyak', 'slug' => 'paket-jimbaran-seminyak', 'durasi' => '1', 'jumlah_wisata_dikunjungi' => 2, 'popularitas' => 35, 'rating' => 8, 'harga' => 700000, 'harga_bobot' => 9, 'popularitas_bobot' => 9, 'rating_bobot' => 6, 'durasi_bobot' => 9, 'jumlah_wisata_bobot' => 3
            ],


            [
                'nama' => 'Paket Ubud Artistic Journey', 'slug' => 'paket-ubud-artistic-journey', 'durasi' => '1', 'jumlah_wisata_dikunjungi' => 2, 'popularitas' => 40, 'rating' => 9, 'harga' => 700000, 'harga_bobot' => 9, 'popularitas_bobot' => 9, 'rating_bobot' => 9, 'durasi_bobot' => 9, 'jumlah_wisata_bobot' => 3
            ],


            [
                'nama' => 'Paket Nusa Dua Waterblow', 'slug' => 'paket-nusa-dua-waterblow', 'durasi' => 0.5, 'jumlah_wisata_dikunjungi' => 2, 'popularitas' => 35, 'rating' => 8, 'harga' => 400000, 'harga_bobot' => 3, 'popularitas_bobot' => 9, 'rating_bobot' => 6, 'durasi_bobot' => 9, 'jumlah_wisata_bobot' => 9
            ],


            [
                'nama' => 'Paket Seminyak Nightlife', 'slug' => 'paket-seminyak-nightlife', 'durasi' => 0.5, 'jumlah_wisata_dikunjungi' => 2, 'popularitas' => 50, 'rating' => 9, 'harga' => 500000, 'harga_bobot' => 6, 'popularitas_bobot' => 6, 'rating_bobot' => 9, 'durasi_bobot' => 9, 'jumlah_wisata_bobot' => 9
            ],


            [
                'nama' => 'Paket Bedugul Nature Escape', 'slug' => 'paket-bedugul-nature-escape', 'durasi' => '1', 'jumlah_wisata_dikunjungi' => 2, 'popularitas' => 15, 'rating' => 8, 'harga' => 900000, 'harga_bobot' => 9, 'popularitas_bobot' => 9, 'rating_bobot' => 6, 'durasi_bobot' => 9, 'jumlah_wisata_bobot' => 3
            ],


            [
                'nama' => 'Paket Nusa Penida Adventure', 'slug' => 'paket-nusa-penida-adventure', 'durasi' => '1', 'jumlah_wisata_dikunjungi' => 3, 'popularitas' => 10, 'rating' => 7, 'harga' => 1200000, 'harga_bobot' => 9, 'popularitas_bobot' => 6, 'rating_bobot' => 3, 'durasi_bobot' => 6, 'jumlah_wisata_bobot' => 3
            ],


            [
                'nama' => 'Paket Kuta Beach Experience',
                'slug' => 'paket-kuta-beach-experience',
                'durasi' => 0.5,
                'jumlah_wisata_dikunjungi' => 2,
                'popularitas' => 20, 'rating' => 9,
                'harga' => 400000, 'harga_bobot' => 3, 'popularitas_bobot' => 9, 'rating_bobot' => 9, 'durasi_bobot' => 9, 'jumlah_wisata_bobot' => 9
            ]
        ];



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
                'title' => 'Pantai Kuta',
                'body' => 'Pantai Kuta adalah pantai yang terkenal dengan kehidupan malam yang sibuk, pusat perbelanjaan, dan ombak yang cocok untuk berselancar.',
                'Kategori Umum' => 5,
                'Kategori Detail' => 'Pantai',
                'Lokasi Umum' => 'Kuta, Badung',
                'Lokasi Detail' => 'Jalan Pantai Kuta',
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
                'title' => 'Pantai Nusa Dua',
                'body' => 'Pantai Nusa Dua adalah pantai yang terkenal dengan pasir putih yang lembut dan terletak di kompleks resor Nusa Dua.',
                'Kategori Umum' => 5,
                'Kategori Detail' => 'Pantai',
                'Lokasi Umum' => 'Nusa Dua, Badung',
                'Lokasi Detail' => 'Jalan Pantai Nusa Dua',
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
                'title' => 'Pantai Suluban',
                'body' => 'Pantai Suluban adalah pantai tersembunyi dengan akses melalui jalan setapak di antara tebing.',
                'Kategori Umum' => 5,
                'Kategori Detail' => 'Pantai',
                'Lokasi Umum' => 'Pecatu, Badung',
                'Lokasi Detail' => 'Jalan Pantai Suluban',
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
        ];

        foreach ($data as $post) {
            $slug = Str::slug($post['title']);
            $judul = ($post['title']);
            $imagePath = "/post-image/{$judul}.jpg";

            // Simpan gambar ke storage
            Storage::copy("public/storage/post-image/{$judul}.jpg", "public/{$imagePath}");

            Post::create([
                'category_id' => $post['Kategori Umum'],
                'user_id' => 1,
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
    }
}
