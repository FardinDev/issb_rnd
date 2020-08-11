<?php

use Illuminate\Database\Seeder;
use App\User;
use Faker\Generator as Faker;

class UserEmailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $users = User::all();

        foreach ($users as $user) {
          
            User::where('id', $user->id)
            ->update(['email' => $faker->email]);

        }
    }
}
