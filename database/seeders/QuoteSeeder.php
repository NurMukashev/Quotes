<?php

namespace Database\Seeders;

use App\Models\Quote;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('quotes')->insert([
            ['name' => 'The beginning is the most important part of the work.'],
            ['name' => 'From small beginnings comes great things'],
            ['name' => 'Well begun is half done.']
        ]);
    }
}
