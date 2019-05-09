<?php

use Illuminate\Database\Seeder;

class SystemsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('systems')->insert([
            'name' => "BLAzer Kitchen",
            'XCoordinate' => 0,
            'YCoordinate' => 200, 
        ]);
        
        DB::table('systems')->insert([
            'name' => "JAR",
            'XCoordinate' => 180,
            'YCoordinate' => 400,
        ]);
        
        DB::table('systems')->insert([
            'name' => "Bumber",
            'XCoordinate' => 90,
            'YCoordinate' => 40,

        ]);
        DB::table('systems')->insert([
            'name' => "Bumber",
            'XCoordinate' => 180,
            'YCoordinate' => 400,
        ]);
        DB::table('systems')->insert([
            'name' => "Bumber",
            'XCoordinate' => 270,
            'YCoordinate' => 430,
        ]);
        DB::table('systems')->insert([
            'name' => "Bumber",
            'XCoordinate' => 90,
            'YCoordinate' => 700,
        ]);
        DB::table('systems')->insert([
            'name' => "Bumber",
            'XCoordinate' => 40,
            'YCoordinate' => 105,
        ]);
        DB::table('systems')->insert([
            'name' => "Bumber",
            'XCoordinate' => 49,
            'YCoordinate' => 290,
        ]);
        DB::table('systems')->insert([
            'name' => "Bumber",
            'XCoordinate' => 37,
            'YCoordinate' => 550,
        ]);
    }
}
