<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TurbineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('turbines')->insert([
            ['name' => 'Horizontal Turbine'],
            ['name' => 'Vertical Turbine'],
            ['name' => 'Micro Turbine'],
            ['name' => 'Macro Turbine'],
        ]);
    }
}
