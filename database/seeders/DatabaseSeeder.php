<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use App\Models\HasilBobotVektor;
use App\Models\HasilDss;
use App\Models\HasilPerangkingan;
use App\Models\KriteriaBobot;
use App\Models\PaketWisata;
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
        // Sub Kriteria
        // Kriteria::create([
        //     'name' => '500 K - 1 Juta',
        //     // 'id' => 1, //Bisa pake factory buat acak
        //     // 'Keterangan' => 'Biaya yang diperkirakan',

        //     // $table->id();
        //     // $table->string('nama');
        //     // $table->unsignedBigInteger('kriteria_id');
        //     // $table->foreign('kriteria_id')->references('id')->on('kriterias')->onDelete('cascade');
        //     // $table->float('bobot', 5, 2);
        //     // $table->string('keterangan')->nullable();
        //     // $table->timestamps();
        // ]);

        // Kriteria
        KriteriaBobot::create([
            'kriteria_1' => 5,
            'kriteria_2' => 2,
            'kriteria_3' => 8,
            'kriteria_4' => 9,
            'kriteria_5' => 4,
        ]);

        // HasilBobotVektor
        HasilBobotVektor::create([
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

        // 
        HasilPerangkingan::create([
            'paket_wisata_id' => 1,
            'nilai_perangkingan' => 0.85,
        ]);

        // 
        PaketWisata::create([
            'nama' => 'Paket Uluwatu Exploration',
            'slug' => 'paket-uluwatu-exploration',
            'user_id' => 2,
            'harga' => 300000,
            'popularitas' => 8,
            'rating' => 9,
            'durasi' => '2 Hari',
            'deskripsi' => 'Paket wisata A',
            'jumlah_wisata_dikunjungi' => 5,
        ]);
        PaketWisata::create([
            'nama' => 'Paket Tanjung Benoa Watersports',
            'slug' => 'paket-tanjung-benoa-watersports',
            'user_id' => 1,
            'harga' => 450000,
            'popularitas' => 9,
            'rating' => 10,
            'durasi' => '3 Hari',
            'deskripsi' => 'Paket wisata B',
            'jumlah_wisata_dikunjungi' => 3,
        ]);

        // User
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
        User::factory(5)->create();

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

        // Post::create([
        //     'title' => 'Judul Pertama',
        //     'slug' => 'judul-pertama',
        //     'excerpt' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quibusdam nam quia eius,',
        //     'body' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quibusdam nam quia eius, dolore facere consequuntur quaerat voluptate repudiandae officia enim asperiores, quae tempore. Commodi officia cum distinctio placeat nam ut minus molestiae exercitationem optio dolorem doloremque porro, sunt animi veritatis, facilis saepe tempora, nobis ipsum voluptatum. Ratione delectus qui magni, a magnam iusto accusantium saepe voluptates distinctio placeat omnis iure sunt sed ut deserunt fugit odit, consequatur ipsum. Totam ea nobis deleniti nemo, repellendus minus rem possimus in odio, facilis amet minima perferendis vitae! Incidunt dolore iste veritatis quia dolorem nihil, dolorum soluta inventore molestias ipsam aut rem fugiat minus?',
        //     'category_id' => 1,
        //     'user_id' => 2
        // ]);
    }
}
