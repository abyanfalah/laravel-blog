<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->sentence(mt_rand(1, 8));
        $long_text = collect($this->faker->paragraphs(mt_rand(5, 30), false));
        $body = $long_text
            ->map(fn ($p) => "<p>" . $p . "</p>")
            ->implode("");

        $excerpt = substr($long_text[0], 0);

        $slug = strtolower($title);
        $slug = str_replace(" ", "-", $slug);
        $slug = str_replace(".", "", $slug);

        return [
            'title'       => $title,
            'slug'        => $slug,
            'excerpt'     => $excerpt,
            'body'        => $body,
            'category_id' => mt_rand(1, 3),
            'user_id'     => mt_rand(1, 5)
        ];
    }
}
