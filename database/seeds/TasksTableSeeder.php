<?php

use Illuminate\Database\Seeder;
use App\Task;
class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Task::create([
            'name'=>"Build Sidebar ",
            'user_id'=> 3,
            'module_id'=> 1
        ]);
        Task::create([
            'name'=>"Build Navbar ",
            'user_id'=> 2,
            'module_id'=> 1
        ]);
        Task::create([
            'name'=>"Build layout content ",
            'user_id'=> 1,
            'module_id'=> 2
        ]);
        Task::create([
            'name'=>"Build Header ",
            'user_id'=> 2,
            'module_id'=> 3
        ]);
    }
}
