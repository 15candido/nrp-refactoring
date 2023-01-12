<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;


use App\Models\User;
use App\Models\Person;
use App\Models\Project;
use App\Models\Demand;
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

        $users      = User::factory(15)->create();
        $people     = Person::factory(10)->create();
        $demands    = Demand::factory(10)->create();
        $projects   = Project::factory(10)->create();
      
    
        foreach($people as $person){
            $person->projects()->attach(
                Project::inRandomOrder()->take(rand(1,9))->pluck('id'), [
                    'project_start_date'    => fake()->date(),
                    'project_end_date'      => fake()->date(),
                ]
            );
        }

        foreach($users as $user){
            Person::create([
                'user_id' => $user->id,
                'name' => $name = $user->name,
                'username' => Str::slug($name),
                'email' => $user->email,
            ]);
        }    

        foreach($projects as $project){
            $project->demands()->attach(
                Demand::inRandomOrder()->take(rand(1,9))->pluck('id'), [
                
                    'quantity' => fake()->numberBetween(85, 25),
                    'note' => fake()->text(150)
                ]
            );

            
        //     demands = Demand::all()->random();
        //     project->demands()->attach($demands, [
        //         'quantity' => fake()->numberBetween(85, 25),
        //         'description' => fake()->paragraph(3, true)
        //     ]);

        }
    }
}
