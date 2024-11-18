<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Term;

class TermsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $terms = [
            ['name' => '1 Month'],
            ['name' => '2 Months'],
            ['name' => '3 Months'],
            ['name' => '6 Months'],
            ['name' => '12 Months'],
            ['name' => '24 Months'],
        ];

        foreach ($terms as $term) {
            Term::firstOrCreate($term);
        }
    }
}
