<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    

    public function run()
    {
        DB::table('users')->insert([
            'name' => Str::random(10),
            'email' => Str::random(10).'@gmail.com',
            'password' => bcrypt('secret'),
        ]);

        $this->call(SystemsSeeder::class);
        $this->call(PlanetsSeeder::class);
    }

//     public function run()
// {
//     factory(App\User::class, 50)->create()->each(function ($user) {
//         $user->posts()->save(factory(App\Post::class)->make());
//     });
// }
}
