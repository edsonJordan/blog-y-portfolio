<?php

namespace Database\Seeders;

use App\Models\User;
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
        User::factory([
            'name' => 'Edson Jordan Huamani Ñahuin',
            'email' => 'edson_4555@hotmail.com',
            'password' => bcrypt('12345678')
        ])->create();
        User::factory(99)->create();
    }
}
