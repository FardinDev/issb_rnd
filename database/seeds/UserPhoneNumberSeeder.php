<?php

use Illuminate\Database\Seeder;
use App\User;
use Faker\Generator as Faker;


class UserPhoneNumberSeeder extends Seeder
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
            ->update(['phone' => $faker->regexify('^(\+8801[3-9]\d{8})$')]);

        }
    }
}
