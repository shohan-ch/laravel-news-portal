<?php

namespace Database\Factories;

use App\Models\Article;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Article::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'category_id'=>$this->faker->numberBetween($min = 1, $max = 10),
            'title' => $this->faker->text(70),
            'description' => $this->faker->unique()->text(200),
            'tag' =>$this->faker->slug(1),
            'image' =>  Str::random(10).'.jpg',
        ];
    }
}