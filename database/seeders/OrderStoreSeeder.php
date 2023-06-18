<?php

namespace Database\Seeders;

use App\Models\OrderStore;
use Illuminate\Database\Seeder;

class OrderStoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        OrderStore::factory()
        ->count(20)->create();

    }
}
