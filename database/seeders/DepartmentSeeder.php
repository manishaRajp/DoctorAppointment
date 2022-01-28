<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('admins')->truncate();

        $department = 
        [
            ['department' => 'Anesthesiologists',],
            ['department' => 'Cardiologists',],
            ['department' => 'Dermatologists',],
            ['department' => 'Endocrinologists',],
            ['department' => 'Emergency Medicine Specialists',],
            ['department' => 'Hematologists',],
        ];
        Department::insert($department);
    }
}

