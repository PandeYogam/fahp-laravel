<?php

namespace App\Models;

class Post
{
    private static $blog_posts = [
        [
            "title" => "Judul Post Pertama",
            "slug" => "judul-post-pertama",
            "author" => "Sandhika Galih",
            "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime in enim id soluta voluptatem, maiores ducimus facere neque, eius voluptatum eum. Beatae ea, nesciunt dolorem voluptatem dolore harum qui et."
        ],
        [
            "title" => "Judul Post Kedua",
            "slug" => "judul-post-kedua",
            "author" => "Pande Yogam",
            "body" => "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Corporis dolor numquam totam in at. Corrupti, eveniet alias explicabo quas velit non cupiditate fuga laboriosam dignissimos esse nostrum eum quibusdam magnam aut dolore consequatur molestiae suscipit fugit! Veritatis, debitis impedit rerum sequi perspiciatis assumenda eum delectus ipsam, nemo fuga deserunt consectetur."
        ]
    ];

    public static function all()
    {
        return collect(self::$blog_posts);
    }

    public static function find($slug)
    {
        $posts = static::all();

        return $posts->firstWhere('slug',$slug);
    }
}
