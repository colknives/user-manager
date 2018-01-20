<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'first_name' => 'Super',
            'last_name' => 'Admin',
            'email' => 'superadmin@gmail.com',
            'username' => 'admin',
            'password' => bcrypt('password'),
            'address' => 'Manila',
            'postcode' => '1234',
            'phone' => '1234567'
        ]);
    }
}
