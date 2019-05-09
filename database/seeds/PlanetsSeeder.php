<?php

use Illuminate\Database\Seeder;

class PlanetsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('planets')->insert([
            'name' => "A",
            'XCoordinate' => 0,
            'YCoordinate' => 200,
        ]);
        
        DB::table('planets')->insert([
            'name' => "B",
            'XCoordinate' => 180,
            'YCoordinate' => 400,
        ]);
        
        DB::table('planets')->insert([
            'name' => "Bumber",
            'XCoordinate' => 90,
            'YCoordinate' => 40,
        ]);
        DB::table('planets')->insert([
            'name' => "Bumber",
            'XCoordinate' => 180,
            'YCoordinate' => 400,
        ]);
        DB::table('planets')->insert([
            'name' => "Bumber",
            'XCoordinate' => 270,
            'YCoordinate' => 430,
        ]);
        DB::table('planets')->insert([
            'name' => "Bumber",
            'XCoordinate' => 90,
            'YCoordinate' => 700,
        ]);
        DB::table('planets')->insert([
            'name' => "Bumber",
            'XCoordinate' => 40,
            'YCoordinate' => 105,
        ]);
        DB::table('planets')->insert([
            'name' => "Bumber",
            'XCoordinate' => 49,
            'YCoordinate' => 290,
        ]);
        DB::table('planets')->insert([
            'name' => "Bumber",
            'XCoordinate' => 37,
            'YCoordinate' => 550,
        ]);

    }
}
