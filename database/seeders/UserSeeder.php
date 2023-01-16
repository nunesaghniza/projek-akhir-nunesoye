<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

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
            'username' => 'nunes',
            'password' => bcrypt('nunes'),
        ]);
        User::create([
            'username' => 'admin',
            'password' => bcrypt('admin'),
        ]);
    }
}
