<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Plateforme;
use App\Models\Status;
use App\Models\Versement;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Plateforme::factory()->count(3)->create();
        Status::factory()->count(3)->create();
        Versement::factory()->count(3)->create();

    }

}
