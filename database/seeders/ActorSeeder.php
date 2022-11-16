<?php

namespace Database\Seeders;

use App\Models\Show;
use App\Models\Actor;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ActorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       Actor::factory()
       ->times(3)
      
       ->create();

       foreach(Actor::all() as $actor) 
       {
        $shows = Show::inRandomOrder()->take(rand(1,3))->pluck('id');
        $actor->shows()->attach($shows);
       }
    }
}
