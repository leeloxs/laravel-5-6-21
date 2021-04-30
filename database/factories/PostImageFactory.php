<?php

namespace Database\Factories;

use App\Models\PostImage;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostImageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PostImage::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'post_image_path' => 'https://images.pexels.com/photos/302743/pexels-photo-302743.jpeg?cs=srgb&dl=ball-ball-shaped-blur-bubble-302743.jpg'
        ];
    }
}
