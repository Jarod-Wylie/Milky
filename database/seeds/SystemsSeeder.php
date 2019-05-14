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
            'name' => "The Sun",
            'XCoordinate' => 180,
            'YCoordinate' => 500, 
            'Description' => "It's nice and keeps you warm.",
            'Satelites' => '[{
                "name": "Mercury",
                "amp": 30,
                "degree": 92,
                "trackX": 0,
                "trackY": 0,
                "moons": [{}]
            }, {
                "name": "Venus",
                "amp": 50,
                "degree": 80,
                "trackX": 0,
                "trackY": 0,
                "moons": [
            
                ]
            }, {
                "name": "Earth",
                "amp": 75,
                "degree": 326,
                "trackX": 0,
                "trackY": 0,
                "moons": [{
                    "name": "Luna",
                    "amp": 10,
                    "degree": 180,
                    "trackX": 0,
                    "trackY": 0
                }]
            }, {
                "name": "Mars",
                "amp": 90,
                "degree": 200,
                "trackX": 0,
                "trackY": 0,
                "moons": [{
                    "name": "Phobos",
                    "amp": 10,
                    "degree": 180,
                    "trackX": 0,
                    "trackY": 0
                }, {
                    "name": "Deimos",
                    "amp": 10,
                    "degree": 180,
                    "trackX": 0,
                    "trackY": 0
                }]
            }]',
        ]);

        
        // DB::table('systems')->insert([
        //     'name' => "JAR",
        //     'XCoordinate' => 180,
        //     'YCoordinate' => 400,
        //     'Description' => "A star that does not exist",
        //     'Satelites' => '[{"name" : "PlanetA", "amp":50, "degree":180, "trackX": 0 , "trackY": 0,"moons": 
        //                                 [
        //                                     {"name": "moonA", "amp":50, "degree":180, "trackX": 0 , "trackY": 0 }
        //                                 ]  },{"name" : "PlanetB", "amp":110, "degree":180, "trackX": 0 , "trackY": 0}]',
        // ]);
        
        // DB::table('systems')->insert([
        //     'name' => "Bumber",
        //     'XCoordinate' => 90,
        //     'YCoordinate' => 40,
        //     'Description' => "A star that does not exist",
        //     'Satelites' => '[{"name" : "PlanetA", "amp":50, "degree":180, "trackX": 0 , "trackY": 0,"moons": 
        //                                 [
        //                                     {"name": "moonA", "amp":50, "degree":180, "trackX": 0 , "trackY": 0 }
        //                                 ]  },{"name" : "PlanetB", "amp":110, "degree":180, "trackX": 0 , "trackY": 0}]',

        // ]);
        // DB::table('systems')->insert([
        //     'name' => "Bumber",
        //     'XCoordinate' => 180,
        //     'YCoordinate' => 400,
        //     'Description' => "A star that does not exist",
        //     'Satelites' => '[{"name" : "PlanetA", "amp":50, "degree":180, "trackX": 0 , "trackY": 0 ,"moons": 
        //                                 [
        //                                     {"name": "moonA", "amp":50, "degree":180, "trackX": 0 , "trackY": 0 }
        //                                 ] },{"name" : "PlanetB", "amp":110, "degree":180, "trackX": 0 , "trackY": 0}]',
        // ]);
        // DB::table('systems')->insert([
        //     'name' => "Bumber",
        //     'XCoordinate' => 270,
        //     'YCoordinate' => 430,
        //     'Description' => "A star that does not exist",
        //     'Satelites' => '[{"name" : "PlanetA", "amp":50, "degree":180, "trackX": 0 , "trackY": 0,"moons": 
        //                                 [
        //                                     {"name": "moonA", "amp":50, "degree":180, "trackX": 0 , "trackY": 0 }
        //                                 ]  },{"name" : "PlanetB", "amp":110, "degree":180, "trackX": 0 , "trackY": 0}]',
        // ]);
        // DB::table('systems')->insert([
        //     'name' => "Bumber",
        //     'XCoordinate' => 90,
        //     'YCoordinate' => 700,
        //     'Description' => "A star that does not exist",
        //     'Satelites' => '[{"name" : "PlanetA", "amp":50, "degree":180, "trackX": 0 , "trackY": 0 ,"moons": 
        //                                 [
        //                                     {"name": "moonA", "amp":50, "degree":180, "trackX": 0 , "trackY": 0 }
        //                                 ] },{"name" : "PlanetB", "amp":110, "degree":180, "trackX": 0 , "trackY": 0}]',
        // ]);
        // DB::table('systems')->insert([
        //     'name' => "Bumber",
        //     'XCoordinate' => 40,
        //     'YCoordinate' => 105,
        //     'Description' => "A star that does not exist",
        //     'Satelites' => '[{"name" : "PlanetA", "amp":50, "degree":180, "trackX": 0 , "trackY": 0,"moons": 
        //                                 [
        //                                     {"name": "moonA", "amp":50, "degree":180, "trackX": 0 , "trackY": 0 }
        //                                 ]  },{"name" : "PlanetB", "amp":110, "degree":180, "trackX": 0 , "trackY": 0}]',
        // ]);
        // DB::table('systems')->insert([
        //     'name' => "Bumber",
        //     'XCoordinate' => 49,
        //     'YCoordinate' => 290,
        //     'Description' => "A star that does not exist",
        //     'Satelites' => '[{"name" : "PlanetA", "amp":50, "degree":180, "trackX": 0 , "trackY": 0 ,"moons": 
        //                                 [
        //                                     {"name": "moonA", "amp":50, "degree":180, "trackX": 0 , "trackY": 0 }
        //                                 ] },{"name" : "PlanetB", "amp":110, "degree":180, "trackX": 0 , "trackY": 0}]',
        // ]);
        // DB::table('systems')->insert([
        //     'name' => "Bumber",
        //     'XCoordinate' => 37,
        //     'YCoordinate' => 550,
        //     'Description' => "A star that does not exist",
        //     'Satelites' => '[{"name" : "PlanetA", "amp":50, "degree":180, "trackX": 0 , "trackY": 0 ,"moons": 
        //                                 [
        //                                     {"name": "moonA", "amp":50, "degree":180, "trackX": 0 , "trackY": 0 }
        //                                 ] },{"name" : "PlanetB", "amp":110, "degree":180, "trackX": 0 , "trackY": 0}]',
        // ]);
    }
}
