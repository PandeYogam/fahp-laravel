<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\User;
use App\Models\Post;
use App\Models\Kriteria;
use App\Models\SubKriteria;

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
        Kriteria::create([
            'name' => '500 K - 1 Juta',
            'kriteria_id' => 1, //Bisa pake factory buat acak
            // 'Keterangan' => 'Biaya yang diperkirakan',

            // $table->id();
            // $table->string('nama');
            // $table->unsignedBigInteger('kriteria_id');
            // $table->foreign('kriteria_id')->references('id')->on('kriterias')->onDelete('cascade');
            // $table->float('bobot', 5, 2);
            // $table->string('keterangan')->nullable();
            // $table->timestamps();
        ]);
        
        // Kriteria
        Kriteria::create([
            'name' => 'Budget',
            'Keterangan' => 'Biaya yang diperkirakan',
        ]);
        Kriteria::create([
            'name' => 'Rating',
            'Keterangan' => 'Penilaian Paket',
        ]);
        Kriteria::create([
            'name' => 'Jumlah Destinasi',
            'Keterangan' => 'Jumlah Destinasi',
        ]);
        Kriteria::create([
            'name' => 'Durasi Paket Perjalanan',
            'Keterangan' => 'Durasi Paket Perjalanan',
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
            'is_admin' => 1
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
