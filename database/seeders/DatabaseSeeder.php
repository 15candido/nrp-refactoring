<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Person;
use App\Models\Project;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Person::truncate();
        // Project::truncate();
        $users = User::factory(15)->create();
        $people = Person::factory(15)->create();
        $projects = Project::factory(15)->create();



        foreach($users as $user){
            Person::create([
                'user_id' => $user->id,
                'name' => $name = $user->name,
                'slug' => Str::slug($name),
                'email' => $user->email,
            ]);
        }        
        foreach($people as $person){
            $person->projects()->attach(
                Project::inRandomOrder()->take(rand(1,9))->pluck('id'), [
                    'project_start_date' => fake()->date(),
                    'project_end_date' => fake()->date(),
                ]
            );
        }

        // DB::table('users')->insert([
        //     'id' => 1,            
        //     'name' => 'David Freitas',
        //     'email' => 'david.freitas@aeg1.pt',
        //     'email_verified_at' => now(),
        //     'password' => Hash::make('gapa'),
        // ]);

        // $this->call([
        //     PersonSeeder::class,
        // ]);

        // \App\Models\User::factory(10)->create();
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
