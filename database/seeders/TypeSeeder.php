<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

//models
use App\Models\Type;

//helpers
use Illuminate\Support\Facades\Schema;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::withoutForeignKeyConstraints(function () {
            Type::truncate();
        });

        $types = [
            'FrontEnd',
            'BackEnd',
            'FullStack',
        ];

        foreach ($types as $title) {
            $slug = str()->slug($title);

            Type::create([
                'title' => $title,
                'slug' => $slug,
            ]);
        }

        // for ($i=0; $i < 10; $i++) { 
        //     $title = substr(fake()->word(),0,255);
        //     $slug = str()->slug($title);



        //     Type::create([
        //         'title' => $title,
        //         'slug' => $slug,
        //     ]);
        // }
    }
}
