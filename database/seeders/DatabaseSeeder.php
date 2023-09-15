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
        Plateforme::factory()->create(['nom' => 'Anaxago']);
        Plateforme::factory()->create(['nom' => 'Baltis']);
        Plateforme::factory()->create(['nom' => 'Citesia']);
        Plateforme::factory()->create(['nom' => 'Clubfunding']);
        Plateforme::factory()->create(['nom' => 'Homunity']);
        Plateforme::factory()->create(['nom' => 'Immocratie']);
        Plateforme::factory()->create(['nom' => 'La Première Brique']);
        Plateforme::factory()->create(['nom' => 'Les Entreprêteurs']);
        Plateforme::factory()->create(['nom' => 'Lymo']);
        Plateforme::factory()->create(['nom' => 'Raizers']);
        Plateforme::factory()->create(['nom' => 'Upstone']);
        Plateforme::factory()->create(['nom' => 'Wiseed']);

        Status::factory()->create(['nom' => 'En cours']);
        Status::factory()->create(['nom' => 'Remboursé']);
        Status::factory()->create(['nom' => 'Retard']);
     
        Versement::factory()->create(['nom' => 'Mensuel']);
        Versement::factory()->create(['nom' => 'Semestriel']);
        Versement::factory()->create(['nom' => 'Annuel']);
        Versement::factory()->create(['nom' => 'Infine']);

    }

}
