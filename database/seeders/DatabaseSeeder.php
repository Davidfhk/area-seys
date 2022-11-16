<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        \App\Models\Grupo::factory(10)->create();
        \App\Models\Recinto::factory(10)->create();
        \App\Models\Medio::factory(10)->create();
        \App\Models\Promotor::factory(10)->create();
    }
}
