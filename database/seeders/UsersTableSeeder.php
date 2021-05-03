<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::factory()
            ->count(5)
            ->hasImages(2)
            ->hasPosts(2)
            ->hasItems(2)
            ->create();
        foreach($users->load(['images', 'posts', 'items']) as $user) {
            foreach($user->posts as $post) {
                Image::factory()->count(2)->for($post, 'imageable')->create();
            }
            foreach($user->items as $item) {
                Image::factory()->count(2)->for($item, 'imageable')->create();
            }
        }
    }
}
