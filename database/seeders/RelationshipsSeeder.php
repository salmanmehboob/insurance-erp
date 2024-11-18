<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Relationship;

class RelationshipsSeeder extends Seeder
{
    public function run()
    {
        $relationships = [
            ['name' => 'Parent'],
            ['name' => 'Sibling'],
            ['name' => 'Spouse'],
            ['name' => 'Child'],
            ['name' => 'Friend'],
        ];

        foreach ($relationships as $relationship) {
            Relationship::firstOrCreate($relationship);
        }
    }
}
