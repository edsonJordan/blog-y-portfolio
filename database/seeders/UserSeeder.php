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
        User::create([
            'name' => 'Edson Jordan Huamani Ñahuin',
            'email' => 'edson_4555@hotmail.com',
            'password' => bcrypt('asd123')
        ])->assignRole('Admin');
        User::factory(20)->create();
    }
}
