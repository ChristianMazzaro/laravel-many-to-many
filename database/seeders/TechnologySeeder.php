<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

//models
use App\Models\Technology;

//helpers
use Illuminate\Support\Facades\Schema;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::withoutForeignKeyConstraints(function () {
            Technology::truncate();
        });

        $technologies = [
            'PHP',
            'JavaScript',
            'HTML',
            'CSS',
            'SCSS',
            'Laravel',
            'Bootstrap',
            'Vue',
            'SQL',
        ];

        foreach ($technologies as $title) {
            $slug = str()->slug($title);

            Technology::create([
                'title' => $title,
                'slug' => $slug,
            ]);
        }
    }
}
