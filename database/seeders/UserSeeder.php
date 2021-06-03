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
            'password' => bcrypt('asd123')
        ])->create();
        User::factory(20)->create();
    }
}
