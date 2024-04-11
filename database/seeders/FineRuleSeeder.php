<?php

namespace Database\Seeders;

use App\Models\FineRule;
use Illuminate\Database\Seeder;

class FineRuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FineRule::create([
            'condition' => 'over 1 day',
            'fine_amount' => 1000
        ]);
    }
}
