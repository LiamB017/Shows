<?php

namespace Database\Seeders;

use App\Models\Network;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class NetworkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Network::factory()
        ->times(3)
        ->hasShows(4)
        ->create();
    }
}
