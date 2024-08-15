<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompaniesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    DB::table('companies')->insert([
        'name' => 'Company One',
        'email' => 'contact@companyone.com',
        'website' => 'https://www.companyone.com',
        'logo' => 'logo1.png', // Ensure this file exists in the `storage/app/public/logos` directory
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    DB::table('companies')->insert([
        'name' => 'Company Two',
        'email' => 'contact@companytwo.com',
        'website' => 'https://www.companytwo.com',
        'logo' => 'logo2.png', // Ensure this file exists in the `storage/app/public/logos` directory
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    DB::table('companies')->insert([
        'name' => 'Company Three',
        'email' => 'contact@companythree.com',
        'website' => 'https://www.companythree.com',
        'logo' => 'logo3.png', // Ensure this file exists in the `storage/app/public/logos` directory
        'created_at' => now(),
        'updated_at' => now(),
    ]);
    }
}

