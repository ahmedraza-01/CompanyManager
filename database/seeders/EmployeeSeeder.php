<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Employee;
use App\Models\Company;

class EmployeeSeeder extends Seeder
{
    public function run()
    {
        $companyIds = [1, 2, 5];

        foreach ($companyIds as $companyId) {
            // Create 5 employees for each specified company
            for ($i = 0; $i < 5; $i++) {
                Employee::create([
                    'first_name' => 'First' . $i,
                    'last_name'  => 'Last' . $i,
                    'email'      => 'employee' . $i . '@example.com',
                    'phone'      => '0302-00000' . $i,
                    'company_id' => $companyId,
                ]);
            }
        }
    }
}

