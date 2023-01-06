<?php

namespace Database\Seeders;

use App\Models\Person;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PersonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Person::create([
            'name' => 'David Freitas',
            'email' => 'david.freitas@aeg1.pt',
            'user_id' => 1
        ]);

        $users = Person::factory()->count(10)->create();


    }
}
