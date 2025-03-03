<?php

namespace Database\Seeders;

use App\Models\FormType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FormTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $form = FormType::create([
            'name' => 'test form',

        ]);
    }
}
