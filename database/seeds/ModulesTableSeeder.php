<?php

use App\Module;
use Illuminate\Database\Seeder;

class ModulesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Module::create([
            'name' => 'build Homepage Tourist',
            'start_date'=> '2017-09-15',
            'end_date'=> '2017-09-25',
            'priority' => 1,
            'project_id' => 1
        ]);
        Module::create([
            'name' => 'Build Content Page',
            'start_date'=> '2017-09-20',
            'end_date'=> '2017-10-10',
            'priority' => 2,
            'project_id' => 1
        ]);
        Module::create([
            'name' => 'Build Login User',
            'start_date'=> '2017-10-15',
            'end_date'=> '2017-11-09',
            'priority' => 1,
            'project_id' => 2
        ]);
    }
}
