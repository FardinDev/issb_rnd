<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AssignRolesSeeder::class);
        // $this->call(RolesAndPermissionsSeeder::class);
        // $this->call(UsersTableSeeder::class);
        // $this->call(PostModifierSeeder::class);
        // $this->call(UserEmailSeeder::class);
        // $this->call(UserPhoneNumberSeeder::class);
    }
}
