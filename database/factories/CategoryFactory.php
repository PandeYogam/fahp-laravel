<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * 
     * 
     * @return array<string, mixed>
     */
    // protected $mode = Post::class;

    public function definition()
    {
        return [
            'name' => $this->faker->sentence(mt_rand(2, 4)),
            'slug' => $this->faker->slug(),
            // 'excerpt' => $this->faker->sentence(mt_rand(10, 25)),
            // 'body' => '<p>'. implode('<p></p>'), $this->faker->paragraphs(mt_rand(5, 10)) . '</p>',
            // 'body' => collect($this->faker->pawragraphs(mt_rand(5, 10)))
            //             ->map(function($p){
            //                 return "<p>$p</p>"
            //             }),
            'body' => collect($this->faker->paragraphs(mt_rand(5, 10)))
                ->map(fn ($p) => "<p>$p</p>")
                ->implode(''),
            'user_id' => mt_rand(1, 3),
            'category_id' => mt_rand(1, 2)
        ];
    }
}
