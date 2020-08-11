<?php

use Illuminate\Database\Seeder;
use App\Post;
use Faker\Generator as Faker;

class PostModifierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $posts = Post::all();

        foreach ($posts as $post) {
          
            Post::where('id', $post->id)
            ->update(['location' => $faker->city.' ('.$faker->state .')' , 'title' => $faker->sentence($nbWords = 6, $variableNbWords = true)]);

        }
    }
}
