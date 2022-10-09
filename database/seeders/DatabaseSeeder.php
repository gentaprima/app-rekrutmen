<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $data = [
            'email' => "admin@gmail.com",
            'password' => Hash::make('admin'),
            'role'  => 1
        ];

        DB::table('tbl_users')->insert($data);
    }
}
