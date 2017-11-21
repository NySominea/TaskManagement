<?php

use Illuminate\Database\Seeder;
use App\Project;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Project::create([
            'name' => 'Tour Website',
            'description' => 'Control Tourists',
            'start_date'=> '2017-09-09',
            'end_date'=> '2017-11-09',
            'user_id' => 2
        ]);

        Project::create([
            'name' => 'Movie Website',
            'description' => 'Free watch',
            'start_date'=> '2017-09-09',
            'end_date'=> '2017-11-09',
            'user_id' => 1
        ]);
    }
}
