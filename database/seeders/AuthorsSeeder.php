<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AuthorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('authors')->insert([
            ['name' => 'Napoleon Bonaparte'],
            ['name' => 'Franklin Roosevelt'],
            ['name' => 'Faina Ranevskaja'],
            ['name' => 'Julius Caesar']
        ]);
    }
}
