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
            'Satelites' => '[
                {
                    "name" : "PlanetA",
                    "amp":50,
                    "degree":180,
                    "trackX": 0 ,
                    "trackY": 0 ,
                    "moons": 
                                        [
                                            {"name": "moonA", "amp":50, "degree":180, "trackX": 0 , "trackY": 0 }
                                        ] 
                            },
                {   
                    "name" : "PlanetB",
                    "amp":110,
                    "degree":180,
                    "trackX": 0 ,
                    "trackY": 0
                }
            ]',
        ]);

        
        DB::table('systems')->insert([
            'name' => "JAR",
            'XCoordinate' => 180,
            'YCoordinate' => 400,
            'Satelites' => '[{"name" : "PlanetA", "amp":50, "degree":180, "trackX": 0 , "trackY": 0,"moons": 
                                        [
                                            {"name": "moonA", "amp":50, "degree":180, "trackX": 0 , "trackY": 0 }
                                        ]  },{"name" : "PlanetB", "amp":110, "degree":180, "trackX": 0 , "trackY": 0}]',
        ]);
        
        DB::table('systems')->insert([
            'name' => "Bumber",
            'XCoordinate' => 90,
            'YCoordinate' => 40,
            'Satelites' => '[{"name" : "PlanetA", "amp":50, "degree":180, "trackX": 0 , "trackY": 0,"moons": 
                                        [
                                            {"name": "moonA", "amp":50, "degree":180, "trackX": 0 , "trackY": 0 }
                                        ]  },{"name" : "PlanetB", "amp":110, "degree":180, "trackX": 0 , "trackY": 0}]',

        ]);
        DB::table('systems')->insert([
            'name' => "Bumber",
            'XCoordinate' => 180,
            'YCoordinate' => 400,
            'Satelites' => '[{"name" : "PlanetA", "amp":50, "degree":180, "trackX": 0 , "trackY": 0 ,"moons": 
                                        [
                                            {"name": "moonA", "amp":50, "degree":180, "trackX": 0 , "trackY": 0 }
                                        ] },{"name" : "PlanetB", "amp":110, "degree":180, "trackX": 0 , "trackY": 0}]',
        ]);
        DB::table('systems')->insert([
            'name' => "Bumber",
            'XCoordinate' => 270,
            'YCoordinate' => 430,
            'Satelites' => '[{"name" : "PlanetA", "amp":50, "degree":180, "trackX": 0 , "trackY": 0,"moons": 
                                        [
                                            {"name": "moonA", "amp":50, "degree":180, "trackX": 0 , "trackY": 0 }
                                        ]  },{"name" : "PlanetB", "amp":110, "degree":180, "trackX": 0 , "trackY": 0}]',
        ]);
        DB::table('systems')->insert([
            'name' => "Bumber",
            'XCoordinate' => 90,
            'YCoordinate' => 700,
            'Satelites' => '[{"name" : "PlanetA", "amp":50, "degree":180, "trackX": 0 , "trackY": 0 ,"moons": 
                                        [
                                            {"name": "moonA", "amp":50, "degree":180, "trackX": 0 , "trackY": 0 }
                                        ] },{"name" : "PlanetB", "amp":110, "degree":180, "trackX": 0 , "trackY": 0}]',
        ]);
        DB::table('systems')->insert([
            'name' => "Bumber",
            'XCoordinate' => 40,
            'YCoordinate' => 105,
            'Satelites' => '[{"name" : "PlanetA", "amp":50, "degree":180, "trackX": 0 , "trackY": 0,"moons": 
                                        [
                                            {"name": "moonA", "amp":50, "degree":180, "trackX": 0 , "trackY": 0 }
                                        ]  },{"name" : "PlanetB", "amp":110, "degree":180, "trackX": 0 , "trackY": 0}]',
        ]);
        DB::table('systems')->insert([
            'name' => "Bumber",
            'XCoordinate' => 49,
            'YCoordinate' => 290,
            'Satelites' => '[{"name" : "PlanetA", "amp":50, "degree":180, "trackX": 0 , "trackY": 0 ,"moons": 
                                        [
                                            {"name": "moonA", "amp":50, "degree":180, "trackX": 0 , "trackY": 0 }
                                        ] },{"name" : "PlanetB", "amp":110, "degree":180, "trackX": 0 , "trackY": 0}]',
        ]);
        DB::table('systems')->insert([
            'name' => "Bumber",
            'XCoordinate' => 37,
            'YCoordinate' => 550,
            'Satelites' => '[{"name" : "PlanetA", "amp":50, "degree":180, "trackX": 0 , "trackY": 0 ,"moons": 
                                        [
                                            {"name": "moonA", "amp":50, "degree":180, "trackX": 0 , "trackY": 0 }
                                        ] },{"name" : "PlanetB", "amp":110, "degree":180, "trackX": 0 , "trackY": 0}]',
        ]);
    }
}
