<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
        DB::table("admins")->insert([
            "name"=>"Administrator",
            "email"=>"admin@gmail.com",
            "password"=>bcrypt("12345678")
        ]);
        DB::table("students")->insert([
            "name"=>"Administrator",
            "email"=>"studen0@gmail.com",
            "phone"=>"0123456789",
        ]);
    }
}
