<?php

namespace Database\Seeders;

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
        \App\Models\User::factory(10)->create();
        \App\Models\Costumers::factory(10)->create();
        \App\Models\Products::factory(50)->create();
        \App\Models\Orders::factory(20)->create();
    }
}
