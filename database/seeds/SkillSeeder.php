<?php

use Illuminate\Database\Seeder;
use App\Skill;

class SkillSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        foreach(Skill::all() as $skill){
            $lecturer = \App\Lecturer::inRandomOrder()->take(rand(1,3))->pluck('id');
            $skill->lecturer()->attach($lecturer);
        }
    }
}
