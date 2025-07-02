<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ComponentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $components = [
            ['name' => 'Blade'],
            ['name' => 'Rotor'],
            ['name' => 'Hub'],
            ['name' => 'Generator'],
            ['name' => 'Nacelle'],
            ['name' => 'Drive Train'],
        ];

        foreach ($components as $component) {
            $result = DB::table('components')->insert($component);
        }

        if ($result) {
            $turbineComponentData = [
                ['turbine_id' => 1, 'component_id' => 1],
                ['turbine_id' => 1, 'component_id' => 2],
                ['turbine_id' => 1, 'component_id' => 3],
                ['turbine_id' => 1, 'component_id' => 4],
                ['turbine_id' => 1, 'component_id' => 5],
                
                ['turbine_id' => 2, 'component_id' => 2],
                ['turbine_id' => 2, 'component_id' => 3],
                ['turbine_id' => 2, 'component_id' => 4],
                ['turbine_id' => 2, 'component_id' => 5],
                ['turbine_id' => 2, 'component_id' => 6],

                ['turbine_id' => 3, 'component_id' => 6],
                ['turbine_id' => 3, 'component_id' => 1],
                ['turbine_id' => 3, 'component_id' => 2],
                ['turbine_id' => 3, 'component_id' => 3],
                ['turbine_id' => 3, 'component_id' => 5],

                ['turbine_id' => 4, 'component_id' => 1],
                ['turbine_id' => 4, 'component_id' => 2],
                ['turbine_id' => 4, 'component_id' => 3],
                ['turbine_id' => 4, 'component_id' => 5],
                ['turbine_id' => 4, 'component_id' => 6],
            ];
            
            DB::table('turbine_component')->insert($turbineComponentData);
        }
    }
}
